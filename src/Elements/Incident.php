<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Incident extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'purpose'     => '',
            'extpurpose'  => '',
            'lang'        => '',
            'restriction' => 'private',
        ];

        $this->elements = [
            'IncidentID'        => parent::REQUIRED,
            'AlternativeID'     => parent::OPTIONAL,
            'RelatedActivity'   => parent::OPTIONAL,
            'DetectTime'        => parent::OPTIONAL,
            'StartTime'         => parent::OPTIONAL,
            'EndTime'           => parent::OPTIONAL,
            'ReportTime'        => parent::REQUIRED,
            'Description'       => parent::OPTIONAL_MULTI,
            'Assessment'        => parent::REQUIRED_MULTI,
            'Method'            => parent::OPTIONAL_MULTI,
            'Contact'           => parent::REQUIRED_MULTI,
            'EventData'         => parent::OPTIONAL_MULTI,
            'History'           => parent::OPTIONAL,
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
            'required' => 'purpose',
            'in' => [
                ['purpose',
                    [
                        'traceback',
                        'mitigation',
                        'reporting',
                        'other',
                        'ext-value'
                    ]
                ],
                ['restriction',
                    [
                        'default',
                        'public',
                        'need-to-know',
                        'private'
                    ]
                ],
            ],
            'regex' => [
                ['lang', '/^([a-zA-Z]{2}|[iI]-[a-zA-Z]+|[xX]-[a-zA-Z]{1,8})(-[a-zA-Z]{1,8})*/i']
            ],
        ];
    }
}
