<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Reference extends IodefElement
{
    public function __construct()
    {
        $this->elements = [
            'ReferenceName' => parent::REQUIRED,
            'URL'           => parent::OPTIONAL_MULTI,
            'Description'   => parent::OPTIONAL_MULTI,
        ];
    }
}
