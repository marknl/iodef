<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class EventData extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction' => '',
        ];

        $this->elements = [
            'Description'       => parent::OPTIONAL_MULTI,
            'DetectTime'        => parent::OPTIONAL,
            'StartTime'         => parent::OPTIONAL,
            'Contact'           => parent::OPTIONAL_MULTI,
            'Assessment'        => parent::OPTIONAL,
            'Method'            => parent::OPTIONAL_MULTI,
            'Flow'              => parent::OPTIONAL_MULTI,
            'Expectation'       => parent::OPTIONAL_MULTI,
            'Record'            => parent::OPTIONAL,
            'EventData'         => parent::OPTIONAL_MULTI,
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
