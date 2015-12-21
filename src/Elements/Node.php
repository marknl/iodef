<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Node extends IodefElement
{
    public function __construct()
    {
        $this->elements = [
            'NodeName'  => 'OPTIONAL_MULTI',
            'Address'   => 'OPTIONAL_MULTI',
            'Location'  => 'OPTIONAL',
            'DateTime'  => 'OPTIONAL',
            'NodeRole'  => 'OPTIONAL_MULTI',
            'Counter'   => 'OPTIONAL_MULTI',
        ];
    }
}
