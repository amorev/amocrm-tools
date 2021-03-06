<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 18:30
 */

namespace Zvinger\AmoCRMTools\handlers\real\lead;

use Zvinger\AmoCRMTools\handlers\real\BaseRealGetter;
use Zvinger\AmoCRMTools\lib\interfaces\lead\LeadGetterInterface;
use Zvinger\AmoCRMTools\lib\models\lead\LeadInformation;

class LeadGetterHandler extends BaseRealGetter implements LeadGetterInterface
{
    /**
     * @param int $leadId
     * @return LeadInformation
     */
    public function getLeadInformation(int $leadId): LeadInformation
    {
        $leadData = $this->client->lead->apiList([
            'id' => $leadId,
        ]);
        $leadInfo = isset($leadData[0]) ? $leadData[0] : NULL;
        $leadInformation = new LeadInformation;
        if (empty($leadInfo['main_contact_id'])) {
            \Yii::warning("Empty contact info. Start getting links" . print_r($leadInfo, 1));
            $links = $this->client->links->apiList([
                'from'    => 'leads',
                'from_id' => $leadId,
                'to'      => 'contacts',
            ]);
            foreach ($links as $link) {
                $leadInfo['main_contact_id'] = $link['to_id'];
                break;
            }
        }
        $leadInformation->setFullData($leadInfo);
        if ($leadInfo) {
            $leadInformation->pipelineId = $leadInfo['pipeline_id'];
            $leadInformation->leadId = $leadInfo['id'];
            $leadInformation->mainContactId = $leadInfo['main_contact_id'];
            $leadInformation->name = $leadInfo['name'];
        }


        return $leadInformation;
    }
}
