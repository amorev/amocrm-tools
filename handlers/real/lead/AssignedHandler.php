<?php

namespace Zvinger\AmoCRMTools\handlers\real\lead;

use AmoCRM\Client;
use Zvinger\AmoCRMTools\lib\interfaces\lead\AssignedInterface;

class AssignedHandler implements AssignedInterface
{
    /**
     * @var Client
     */
    protected $client;


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $leadId
     * @param int $userId
     * @return bool
     * @throws \AmoCRM\Exception
     */
    public function assignByUserId(int $leadId, int $userId): bool
    {
        $lead = $this->client->lead;
        $lead['responsible_user_id'] = $userId;

        return $lead->apiUpdate($leadId);
    }
}