<?php

namespace Marknl\Iodef;

use Sabre\Xml\Writer as SabreWriter;

class Writer extends SabreWriter
{
    public function __construct($data)
    {
        parent::openMemory();
        Elements\IODEFDocument::create($this, $data);
    }
}
