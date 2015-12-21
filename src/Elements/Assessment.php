<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Assessment extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'occurrence'    => 'actual',
            'restriction'   => '',
        ];

        $this->elements = [
            'Impact'            => 'OPTIONAL_MULTI',
            'TimeImpact'        => 'OPTIONAL_MULTI',
            'MonetaryImpact'    => 'OPTIONAL_MULTI',
            'Counter'           => 'OPTIONAL_MULTI',
            'Confidence'        => 'OPTIONAL',
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
            'occurrence'    => 'sometimes|in:actual,potential',
            'restriction'   => 'sometimes|in:default,public,need-to-know,private',
        ];
    }
}
