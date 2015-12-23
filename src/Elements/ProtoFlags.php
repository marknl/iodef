<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class ProtoFlags extends IodefElement
{
    public $value = '';

    /**
     * Value validation rule
     * @return array
     */
    public static function getValueRule()
    {
        return [
            'required' => 'value',
            'integer' => 'value',
        ];
    }
}
