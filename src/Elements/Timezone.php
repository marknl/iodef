<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Timezone extends IodefElement
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
            'required' => 'value',
            'regex' => [
                ['value', '/Z|[\+\-](0[0-9]|1[0-4]):[0-5][0-9]/'],
            ],
        ];
    }
}
