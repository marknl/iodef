<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class RecordData extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction' => '',
        ];

        $this->elements = [
            'DateTime'          => parent::OPTIONAL,
            'Description'       => parent::OPTIONAL_MULTI,
            'Application'       => parent::OPTIONAL,
            'RecordPattern'     => parent::OPTIONAL_MULTI,
            'RecordItem'        => parent::REQUIRED_MULTI,
            'AdditionalData'    => parent::OPTIONAL_MULTI,
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'in' => [
                ['restriction',
                    [
                        'default',
                        'public',
                        'need-to-know',
                        'private',
                    ]
                ],
            ],
        ];
    }
}
