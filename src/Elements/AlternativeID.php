<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class AlternativeID extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction' => '',
        ];

        $this->elements = [
            'IncidentID' => 'REQUIRED_MULTI',
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'restriction' => 'sometimes|in:default,public,need-to-know,private',
        ];
    }
}
