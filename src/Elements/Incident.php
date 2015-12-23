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
            'IncidentID'        => 'REQUIRED',
            'AlternativeID'     => 'OPTIONAL',
            'RelatedActivity'   => 'OPTIONAL',
            'DetectTime'        => 'OPTIONAL',
            'StartTime'         => 'OPTIONAL',
            'EndTime'           => 'OPTIONAL',
            'ReportTime'        => 'REQUIRED',
            'Description'       => 'OPTIONAL_MULTI',
            'Assessment'        => 'REQUIRED_MULTI',
            'Method'            => 'REQUIRED_MULTI',
            'Contact'           => 'REQUIRED_MULTI',
            'EventData'         => 'OPTIONAL_MULTI',
            'History'           => 'OPTIONAL',
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
