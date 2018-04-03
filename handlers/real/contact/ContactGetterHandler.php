<?php

namespace Zvinger\AmoCRMTools\handlers\real\contact;

use Zvinger\AmoCRMTools\handlers\real\BaseRealGetter;
use Zvinger\AmoCRMTools\lib\interfaces\contact\ContactGetterInterface;
use Zvinger\AmoCRMTools\lib\models\contact\ContactInformation;

class ContactGetterHandler extends BaseRealGetter implements ContactGetterInterface
{
    /**
     * @param $leadId
     * @return ContactInformation[]
     */
    public function getLeadContacts($leadId): array
    {
        d($leadId);
        die;
        // TODO: Implement getLeadContacts() method.
    }

    public function getContactInformation($contactId): ContactInformation
    {
        $contactInfos = $this->client->contact->apiList([
            'id' => $contactId,
        ]);
        $contactInfo = isset($contactInfos[0]) ? $contactInfos[0] : NULL;
        $result = new ContactInformation();
        if ($contactInfo) {
            $result->contactId = $contactId;
            $result->name = $contactInfo['name'];
            foreach ($contactInfo['custom_fields'] as $custom_field) {
                if ($custom_field['code'] === 'PHONE') {
                    $result->phone = $this->arrayHelper->getValue($custom_field, 'values.0.value');
                }
                if ($custom_field['code'] === 'EMAIL') {
                    $result->email = $this->arrayHelper->getValue($custom_field, 'values.0.value');
                }
            }
        }

        return $result;
    }
}