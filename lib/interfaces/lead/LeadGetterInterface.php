<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 18:28
 */

namespace Zvinger\AmoCRMTools\lib\interfaces\lead;

use Zvinger\AmoCRMTools\lib\models\lead\LeadInformation;

interface LeadGetterInterface
{
    public function getLeadInformation(int $leadId): LeadInformation;
}