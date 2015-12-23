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
            'Description'       => 'OPTIONAL_MULTI',
            'DetectTime'        => 'OPTIONAL',
            'StartTime'         => 'OPTIONAL',
            'Contact'           => 'OPTIONAL_MULTI',
            'Assessment'        => 'OPTIONAL',
            'Method'            => 'OPTIONAL_MULTI',
            'Flow'              => 'OPTIONAL_MULTI',
            'Expectation'       => 'OPTIONAL_MULTI',
            'Record'            => 'OPTIONAL',
            'EventData'         => 'OPTIONAL_MULTI',
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
