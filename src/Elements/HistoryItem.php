<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class HistoryItem extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction'   => '',
            'action'        => '',
            'ext-action'    => '',
        ];

        $this->elements = [
            'DateTime'          => 'REQUIRED',
            'IncidentId'        => 'OPTIONAL',
            'Contact'           => 'OPTIONAL',
            'Description'       => 'OPTIONAL_MULTI',
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
            'restriction'   => 'sometimes|in:default,public,need-to-know,private',
            'action'        => 'required|in:nothing,contact-source-site,contact-target-site,contact-sender,investigate,block-host,block-network,block-port,rate-limit-host,rate-limit-network,rate-limit-port,remediate-other,status-triage,status-new-info,other,ext-value',
            'ext-action'    => 'required_if:action,ext-value',
        ];
    }
}
