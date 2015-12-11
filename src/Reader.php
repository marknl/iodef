<?php

namespace Marknl\Iodef;

use Sabre\Xml\Reader as SabreReader;

class Reader extends SabreReader
{
    public function __construct()
    {
        echo "Reader";
    }
}
