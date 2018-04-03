<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 18:54
 */

namespace Zvinger\AmoCRMTools\lib\interfaces\contact;


use Zvinger\AmoCRMTools\lib\models\contact\ContactInformation;

interface ContactGetterInterface
{
    /**
     * @param $leadId
     * @return ContactInformation[]
     */
    public function getLeadContacts($leadId): array;

    public function getContactInformation($contactId): ContactInformation;
}
