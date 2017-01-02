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
    /**
     * Should we format the XML output via a DOMDocument.
     * @var boolval
     */
    public $formatOutput = false;

    /**
     * Contructor
     */
    public function __construct()
    {
        $this->openMemory();
        $this->startDocument();
        $this->namespaceMap = [
            'urn:ietf:params:xml:ns:iodef-1.0' => '',
            'urn:ietf:params:xml:ns:iodef-sci-1.0' => 'sci',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];
    }

    /**
     * Overwrite the original method, so we can add some output formatting for the XML.
     * @param  boolval $flush Flush memory after
     * @return string
     */
    public function outputMemory($flush = false)
    {
        // Beautify the XML output
        if ($this->formatOutput === true) {
            $dom = new \DOMDocument;
            $dom->formatOutput = true;
            $dom->loadXML(parent::outputMemory($flush));
            return $dom->saveXML();
        } else {
            return parent::outputMemory($flush);
        }
    }
}
