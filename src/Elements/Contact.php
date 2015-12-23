<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class Contact extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'role'          => '',
            'ext-role'      => '',
            'type'          => '',
            'ext-type'      => '',
            'restriction'   => '',
        ];

        $this->elements = [
            'ContactName'       => 'OPTIONAL',
            'Description'       => 'OPTIONAL_MULTI',
            'RegistryHandle'    => 'OPTIONAL_MULTI',
            'PostalAddress'     => 'OPTIONAL',
            'Email'             => 'OPTIONAL_MULTI',
            'Telephone'         => 'OPTIONAL_MULTI',
            'Fax'               => 'OPTIONAL',
            'Timezone'          => 'OPTIONAL',
            'Contact'           => 'OPTIONAL_MULTI',
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
            'required' => [
                ['role'],
                ['type']
            ],
            'in' => [
                ['role',
                    [
                        'creator',
                        'admin',
                        'tech',
                        'irt',
                        'cc',
                        'ext-value',
                    ]
                ],
                ['type',
                    [
                        'person',
                        'organization',
                        'ext-value',
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
