<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class System extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction'   => '',
            'category'      => '',
            'ext-category'  => '',
            'interface'     => '',
            'spoofed'       => 'unknown',
        ];
        $this->elements = [
            'Node'              => 'REQUIRED',
            'Service'           => 'OPTIONAL_MULTI',
            'OperatingSystem'   => 'OPTIONAL_MULTI',
            'Counter'           => 'OPTIONAL_MULTI',
            'Description'       => 'OPTIONAL_MULTI',
            'AdditionalData'    => 'OPTIONAL_MULTI',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'restriction'   => 'sometimes|in:public,need-to-know,private,default',
            'category'      => 'required|in:source,target,intermediate,sensor,infrastructure,ext-value',
            'ext-category'  => 'required_if:category,ext-value|string',
            'interface'     => 'sometimes|string',
            'spoofed'       => 'sometimes|in:unknown,yes,no',
        ];
    }
}
