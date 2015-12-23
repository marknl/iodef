<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Location extends IodefElement
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
        ];
    }
}
