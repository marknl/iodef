<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Confidence extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'rating' => '',
        ];
    }

    /**
     * Override IodefElement::xmlSerialize with some exceptions
     * for this Element and then call the parent serialize after.
     * @param  SabreWriter $writer
     * @return void
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer) {

        if ($this->attributes['rating'] != 'numeric') {
            $this->value = '';
        }

        parent::xmlSerialize($writer);
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public static function getAttributeRules()
    {
        return [
            'rating' => 'required|in:low,medium,high,numeric',
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => ['required', 'regex:/^-?(?:\d+|\d*\.\d+)$/'],
        ];
    }
}
