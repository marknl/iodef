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
            'Impact'            => parent::OPTIONAL_MULTI,
            'TimeImpact'        => parent::OPTIONAL_MULTI,
            'MonetaryImpact'    => parent::OPTIONAL_MULTI,
            'Counter'           => parent::OPTIONAL_MULTI,
            'Confidence'        => parent::OPTIONAL,
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
                ['occurrence',
                    [
                        'actual',
                        'potential',
                    ]
                ],
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
