<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class IncidentID extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'name'          => '',
            'instance'      => '',
            'restriction'   => 'public',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'name'          => 'required|string',
            'instance'      => 'sometimes|string',
            'restriction'   => 'sometimes|in:default,public,need-to-know,private',
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
