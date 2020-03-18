<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 18:28
 */

namespace Zvinger\AmoCRMTools\lib\models\lead;

class LeadInformation
{
    public $leadId;

    public $pipelineId;

    public $name;

    public $mainContactId;

    private $fullData;

    /**
     * @return mixed
     */
    public function getFullData()
    {
        return $this->fullData;
    }

    /**
     * @param mixed $fullData
     */
    public function setFullData($fullData): void
    {
        $this->fullData = $fullData;
    }

    public function getCustomFieldById($fieldId)
    {
        $fields = $this->fullData['custom_fields'] ?: [];
        foreach ($fields as $field) {
            if ($field['id'] == $fieldId) {
                return $field;
            }
        }
    }

    public function getCustomFieldValueById($fieldId)
    {
        $fields = $this->getCustomFieldById($fieldId);
        if (isset($fields['values'][0]['value'])) {
            return $fields['values'][0]['value'];
        }
    }

    public function getCustomFieldFirstValueObjectById($fieldId)
    {
        $fields = $this->getCustomFieldById($fieldId);
        if (isset($fields['values'][0])) {
            return $fields['values'][0];
        }
    }
}
