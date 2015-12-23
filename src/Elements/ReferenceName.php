<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class ReferenceName extends IodefElement
{
    public $value = '';

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'required' => 'value',
        ];
    }
}
