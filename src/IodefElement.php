<?php

namespace Marknl\Iodef;

use Sabre\Xml\Reader as SabreReader;
use Sabre\Xml\Writer as SabreWriter;
use Sabre\Xml\Element as SabreElement;
use Validator;
use Error;

/**
 * IODEF Element class.
 * Provides a blueprint for all IODEF Element Types.
 *
 * @copyright Copyright (C) 2015-2016 Marknl (www.e-rave.nl)
 * @author Mark Stunnenberg <mark@e-rave.nl>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
abstract class IodefElement implements SabreElement
{
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
     * Get the ShortName of the given IodefObject
     * @param  iodefElement $class
     * @return string
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
     * @param string $name
     * @param string $value
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Get the attributes
     * @return array
     */
    public function getAttributes()
    {
        return array_filter($this->attributes);
    }

    /**
     * Set the value of the element
     * @param  mixed $value
     * @return void
     */
    public function value($value) {
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
        if (array_key_exists($class, $this->elements)) {
            if (substr($this->elements[$class], -6) == '_MULTI') {
                $this->{$class}[] = $child;
            } else {
                $this->{$class} = $child;
            }
        } else {
            throw new Error($this->getShortName(get_called_class()) .": {$class} is not allowed as child a element.");
        }
    }

    /**
     * [getChildren description]
     * @return void
     */
    protected function getChildren()
    {
        $retArray = [];

        foreach($this->elements as $element => $occurrence) {
            switch($occurrence) {
                case 'REQUIRED':
                    if (property_exists($this, $element)) {
                        $retArray[] = [
                            'name'          => $element,
                            'attributes'    => array_filter($this->$element->attributes),
                            'value'         => $this->$element
                        ];
                    } else {
                        throw new Error($this->getShortName(get_called_class()) .": Required element '{$element}' missing.");
                    }
                    break;
                case 'OPTIONAL':
                    if (property_exists($this, $element)) {
                        $retArray[] = [
                            'name'          => $element,
                            'attributes'    => array_filter($this->$element->attributes),
                            'value'         => $this->$element
                        ];
                    }
                    break;
                case 'REQUIRED_MULTI':
                    if (property_exists($this, $element)) {
                        foreach($this->$element as $child) {
                            $retArray[] = [
                                'name'          => $element,
                                'attributes'    => array_filter($child->attributes),
                                'value'         => $child
                            ];
                        }
                    } else {
                        throw new Error($this->getShortName(get_called_class()) .": Required element '{$element}' missing.");
                    }
                    break;
                case 'OPTIONAL_MULTI':
                    if (property_exists($this, $element)) {
                        foreach($this->$element as $child) {
                            $retArray[] = [
                                'name'          => $element,
                                'attributes'    => array_filter($child->attributes),
                                'value'         => $child
                            ];
                        }
                    }
                    break;
                default:
                    throw new Error($this->getShortName(get_called_class()) .": Unknown occurence type for element {$element}.");
            }
        }

        return $retArray;
    }


    /**
     * Convert XML Elements to IodefElement Objects
     * @param  SabreReader $reader [description]
     * @return IodefElement
     */
    static function xmlDeserialize(SabreReader $reader) {

        $IodefElement = new static();
        $IodefElement->setAttributes($reader->parseAttributes());

        $innerData = $reader->parseInnerTree();

        // parseInnerTree will return an array or string.
        if (is_array($innerData)) {

            foreach($innerData as $child) {

                // This should always and only by of type 'object'.
                if (gettype($child['value']) == 'object') {
                    $className = $child['value']->getShortName();

                    if (substr($IodefElement->elements[$className], -6) == '_MULTI') {
                        $IodefElement->{$className}[] = $child['value'];
                    } else {
                        $IodefElement->{$className} = $child['value'];
                    }
                }
            }
        } else {
            $IodefElement->value = $innerData;
        }

        return $IodefElement;
    }

    /**
     * Create IodefElement Objects to XML Elements
     * @param  SabreWriter $writer
     * @return void
     */
    public function xmlSerialize(SabreWriter $writer) {

        // Validate the attributes and value.
        if ($this->validate() === true) {

            // Start serializing all allowed child elements
            if (empty($this->elements)) {
                $writer->write($this->value);
            } else {
                $writer->write($this->getChildren());
            }
        } else {
            throw new Error($this->getShortName(). ": Validation failed, see details above.");
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
            $validate_attributes = Validator::make($this->attributes, $this->getAttributeRules());

            if ($validate_attributes->fails()) {
                echo 'Some attributes failed to pass the validator:';
                foreach ($validate_attributes->messages()->all() as $message) {
                    echo ' '. $message;
                }
                return false;
            }
        }

        // If a value is set, validate it.
        if (array_key_exists('value', $this)) {
            $validate_value = Validator::make(['value' => $this->value], $this->getValueRule());

            if ($validate_value->fails()) {
                echo 'The value failed to pass the validator:';
                foreach ($validate_value->messages()->all() as $message) {
                    echo ' '. $message;
                }
                return false;
            }
        }

        return true;
    }
}
