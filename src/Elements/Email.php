<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Email extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'meaning' => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'meaning' => 'sometimes|string',
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => 'required|email',
        ];
    }
}
