<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class RelatedActivity extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction' => '',
        ];

        $this->elements = [
            'IncidentID'    => parent::OPTIONAL_MULTI,
            'URL'           => parent::OPTIONAL_MULTI,
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
