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
            'required' => 'value',
            'regex' => [
                ['value', '/^\d+(\-\d+)?(,\d+(\-\d+)?)*/']
            ],
        ];
    }
}
