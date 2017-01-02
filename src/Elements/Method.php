<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Method extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction' => '',
        ];

        $this->elements = [
            'Reference'         => parent::OPTIONAL_MULTI,
            'Description'       => parent::OPTIONAL_MULTI,
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
