<?php

namespace Marknl\Iodef;

use Sabre\Xml\Reader as SabreReader;
use Sabre\Xml\Writer as SabreWriter;
use Sabre\Xml\Element as SabreElement;
use Valitron\Validator as Validator;

/**
 * IODEF Element Class.
 * Provides a blueprint for all IODEF Element Types.
 *
 * @copyright Copyright (C) 2015-2017 Marknl (www.e-rave.nl)
 * @author Mark Stunnenberg <mark@e-rave.nl>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
abstract class IodefElement implements SabreElement
{
    /**
     * The IODEF namespace as described in rfc-5070.
     * For more info: https://www.ietf.org/rfc/rfc5070.txt
     * @var string
     */
    protected $ns = '{urn:ietf:params:xml:ns:iodef-1.0}';

    /**
     * All atributes allowed for the element extending this class according
     * to rfc-5070.
     * @var array
     */
    protected $attributes = [];

    /**
     * Contains allowed IodefElement names and it's occurence for the current
     * element extending this class according to rfc-5070.
     * @var array
     */
    protected $elements = [];

    /**
     * Constant for required element
     * @var integer
     */
    const REQUIRED           = 0b00;

    /**
     * Constant for required array element
     * @var integer
     */
    const REQUIRED_MULTI     = 0b01;

    /**
     * Constant for optional element
     * @var integer
     */
    const OPTIONAL           = 0b10;

    /**
     * Constant for optional array element
     * @var integer
     */
    const OPTIONAL_MULTI     = 0b11;

    /**
     * Get the short name of the given IodefObject.
     * @param  iodefElement $class An instance of IodefElement.
     * @return string Class name
     */
    public function getShortName($class = null)
    {
        if ($class == null) {
            $class = get_called_class();
        } else {
            $class = is_object($class) ? get_class($class) : $class;
        }

        return basename(str_replace('\\', '/', $class));
    }

    /**
     * Add an attribute.
     * @param array $attributes Array contists of standard name/value pair.
     * @return void
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Get the attributes.
     * @return array List of attributes.
     */
    public function getAttributes()
    {
        return array_filter($this->attributes);
    }

    /**
     * Set the value of the element
     * @param  mixed $value Value to be set.
     * @return void
     */
    public function value($value)
    {
        $this->value = $value;
    }

    /**
     * Add an IodefElement Object to itself
     * You can only add IodefElements that are defined in $this->elements
     * @param iodefElement $child
     */
    public function addChild($child)
    {
        $class = $this->getShortName($child);

        // Only add child if it's an known element.
        if (array_key_exists($class, $this->elements)) {
            // If we can expect more, add it to an array.
            //if (substr($this->elements[$class], -6) == '_MULTI') {
            if (in_array($this->elements[$class], [self::REQUIRED_MULTI, self::OPTIONAL_MULTI])) {
                $this->{$class}[] = $child;
            } else {
                $this->{$class} = $child;
            }
        } else {
            die($this->getShortName(get_called_class()) .": {$class} is not allowed as a child element.");
        }
    }

    /**
     * Get all chilren of the current IodefElement.
     * @return array List of child elements.
     */
    protected function getChildren()
    {
        $retArray = [];

        foreach ($this->elements as $element => $occurrence) {
            switch ($occurrence) {
                case 'REQUIRED':
                case self::REQUIRED:
                    if (property_exists($this, $element)) {
                        $retArray[] = [
                            'name'          => $this->ns.$element,
                            'attributes'    => array_filter($this->$element->attributes),
                            'value'         => $this->$element
                        ];
                    } else {
                        die(
                            $this->getShortName(get_called_class()) .": Required element '{$element}' missing."
                        );
                    }
                    break;
                case 'OPTIONAL':
                case self::OPTIONAL:
                    if (property_exists($this, $element)) {
                        $retArray[] = [
                            'name'          => $this->ns.$element,
                            'attributes'    => array_filter($this->$element->attributes),
                            'value'         => $this->$element
                        ];
                    }
                    break;
                case 'REQUIRED_MULTI':
                case self::REQUIRED_MULTI:
                    if (property_exists($this, $element)) {
                        foreach ($this->$element as $child) {
                            $retArray[] = [
                                'name'          => $this->ns.$element,
                                'attributes'    => array_filter($child->attributes),
                                'value'         => $child
                            ];
                        }
                    } else {
                        die(
                            $this->getShortName(get_called_class()) .": Required element '{$element}' missing."
                        );
                    }
                    break;
                case 'OPTIONAL_MULTI':
                case self::OPTIONAL_MULTI:
                    if (property_exists($this, $element)) {
                        foreach ($this->$element as $child) {
                            $retArray[] = [
                                'name'          => $this->ns.$element,
                                'attributes'    => array_filter($child->attributes),
                                'value'         => $child
                            ];
                        }
                    }
                    break;
                default:
                    die(
                        $this->getShortName(get_called_class()) .": Unknown occurence type for element {$element}."
                    );
            }
        }

        return $retArray;
    }


    /**
     * Convert XML Elements to IodefElement Objects
     * @param  SabreReader $reader
     * @return IodefElement
     */
    public static function xmlDeserialize(SabreReader $reader)
    {
        $IodefElement = new static();
        $IodefElement->setAttributes($reader->parseAttributes());

        $innerData = $reader->parseInnerTree();

        // parseInnerTree will return an array or string.
        if (is_array($innerData)) {
            foreach ($innerData as $child) {
                // This should always and only by of type 'object'.
                if (gettype($child['value']) == 'object') {
                    $className = $child['value']->getShortName();
                    // We can expect multiple entries here, so add it to an array.
                    //if (substr($IodefElement->elements[$className], -6) == '_MULTI') {
                    if (in_array($IodefElement->elements[$className], [self::REQUIRED_MULTI, self::OPTIONAL_MULTI])) {
                        $IodefElement->{$className}[] = $child['value'];
                    } else {
                        $IodefElement->{$className} = $child['value'];
                    }
                }
            }
        } else {
            if (!empty($innerData)) {
                $IodefElement->value = $innerData;
            }
        }

        return $IodefElement;
    }

    /**
     * Create IodefElement Objects to XML Elements
     * @param  SabreWriter $writer
     * @return void
     */
    public function xmlSerialize(SabreWriter $writer)
    {
        // Validate the attributes and value.
        if ($this->validate() === true) {
            // Start serializing all allowed child elements
            if (empty($this->elements)) {
                if (property_exists($this, 'value')) {
                    $writer->write($this->value);
                }
            } else {
                $writer->write($this->getChildren());
            }
        } else {
            die("\nValidation on element <".$this->getShortName()."> failed, see details above.\n");
        }
    }

    /**
     * Validate the IodefElement's attributes and value.
     * @return boolval
     */
    protected function validate()
    {
        // If attributes are set, validate them.
        if (!empty($this->attributes)) {
            // It's possible that there are no rules for the attributes available.
            // If so, skip attribute validation.
            if (sizeof($this->getAttributeRules()) > 0) {
                $validate_attributes = new Validator($this->attributes);
                $validate_attributes->rules($this->getAttributeRules());

                // Validation failed to succeeed, show errors
                if (!$validate_attributes->validate()) {
                    echo 'Some attributes failed to pass the validator:';
                    foreach ($validate_attributes->errors() as $failed_attr) {
                        echo ' '. $failed_attr[0];
                    }
                    return false;
                }
            }
        }

        // If a value is set, validate it.
        if (array_key_exists('value', json_decode(json_encode($this), true))) {
            // It's possible that there is no value rule set.
            // If so, skip value validation.
            if (sizeof($this->getValueRule()) > 0) {
                $validate_value = new Validator(['value' => $this->value]);
                $validate_value->rules($this->getValueRule());

                // Validation failed to succeeed, show errors
                if (!$validate_value->validate()) {
                    echo "The 'value' failed to pass the validator:";
                    foreach ($validate_value->errors() as $message) {
                        if (is_array($message)) {
                            $message = implode(',', $message);
                        }
                        echo ' '. strtolower($message);
                    }
                    return false;
                }
            }
        }

        return true;
    }
}
