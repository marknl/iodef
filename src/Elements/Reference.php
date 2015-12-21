<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Reference extends IodefElement
{
    public function __construct()
    {
        $this->elements = [
            'ReferenceName' => 'REQUIRED',
            'URL'           => 'OPTIONAL_MULTI',
            'Description'   => 'OPTIONAL_MULTI',
        ];
    }
}
