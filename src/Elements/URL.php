<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class URL extends IodefElement
{
    public $value = '';

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => 'required|URL',
        ];
    }
}
