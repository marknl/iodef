<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Flow extends IodefElement
{
    public function __construct()
    {
        $this->elements = [
            'System'    => parent::REQUIRED_MULTI,
        ];
    }
}
