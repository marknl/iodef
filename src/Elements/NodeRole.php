<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class NodeRole extends IodefElement
{
    public $value = '';

    public function __construct()
    {
        $this->attributes = [
            'category'      => '',
            'ext-category'  => '',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'category'      => 'required|in:client,server-internal,server-public,www,mail,messaging,streaming,voice,file,ftp,p2p,name,directory,credential,print,application,ext-value',
            'ext-category'  => 'required_if:category,ext-value|string',
        ];
    }

    /**
     * Value validation rule
     * @return array
     */
    public function getValueRule()
    {
        return [
            'value' => 'required|string',
        ];
    }
}
