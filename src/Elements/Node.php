<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Node extends IodefElement
{
    public function __construct()
    {
        $this->elements = [
            'NodeName'  => parent::OPTIONAL_MULTI,
            'Address'   => parent::OPTIONAL_MULTI,
            'Location'  => parent::OPTIONAL,
            'DateTime'  => parent::OPTIONAL,
            'NodeRole'  => parent::OPTIONAL_MULTI,
            'Counter'   => parent::OPTIONAL_MULTI,
        ];
    }
}
