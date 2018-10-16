<?php

namespace Zvinger\AmoCRMTools\lib\interfaces\lead;

interface AssignedInterface
{
    /**
     * @param int $leadId
     * @param int $userId
     * @return bool
     */
    public function assignByUserId(int $leadId, int $userId): bool;
}