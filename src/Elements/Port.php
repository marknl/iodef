<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Port extends IodefElement
{
    public $value = '';

    /**
     * Value validation rule
     * @return array
     */
    public static function getValueRule()
    {
        return [
            'required'  => 'value',
            'integer'   => 'value',
            'min' => [
                ['value' => 1]
            ],
            'max' => [
                ['value' => 65535]
            ],
        ];
    }
}
