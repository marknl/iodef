<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class RecordPattern extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'type'              => 'regex',
            'ext-type'          => '',
            'offset'            => '',
            'offsetunit'        => '',
            'ext-offsetunit'    => '',
            'instance'          => '',
        ];
    }

    /**
     * Override IodefElement::xmlSerialize with some exceptions
     * for this Element and then call the parent serialize after.
     * @param  SabreWriter $writer
     * @return void
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer) {

        // offsetunit attribute is 'line' if not specified and offset attribute is set
        if ($this->attributes['offsetunit'] == '' && $this->attributes['offset'] != '') {
            $this->attributes['offsetunit'] = 'line';
        }

        parent::xmlSerialize($writer);
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'type'              => 'required|in:regex,binary,xpath,ext-value',
            'ext-type'          => 'required_if:type,ext-value',
            'offset'            => 'sometimes|integer',
            'offsetunit'        => 'sometimes|in:line,binary,ext-value',
            'ext-offsetunit'    => 'required_if:offsetunit,ext-value',
            'instance'          => 'sometimes|integer',
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => 'required|string',
        ];
    }
}
