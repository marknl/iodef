<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Portlist extends IodefElement
{
    public $value = '';

    /**
     * Value validation rule
     * @return array
     */
    public static function getValueRule()
    {
        return [
            'value' => ['required', 'regex:/^\d+(\-\d+)?(,\d+(\-\d+)?)*/'],
        ];
    }
}
