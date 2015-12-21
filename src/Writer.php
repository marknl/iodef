<?php

namespace Marknl\Iodef;

use Sabre\Xml\Writer as SabreWriter;

/**
 * IODEF Writing
 *
 * @copyright Copyright (C) 2015-2016 Marknl (www.e-rave.nl)
 * @author Mark Stunnenberg <mark@e-rave.nl>
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
class Writer extends SabreWriter
{
    public function __construct()
    {
        $this->openMemory();
        $this->startDocument();
        $this->namespaceMap = [
            'urn:ietf:params:xml:ns:iodef-1.0' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];
    }
}
