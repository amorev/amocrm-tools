<?php
/**
 * Created by PhpStorm.
 * User: amorev
 * Date: 05.02.2020
 * Time: 23:38
 */

namespace Zvinger\AmoCRMTools\handlers\real\user;


use Zvinger\AmoCRMTools\handlers\real\BaseRealGetter;
use Zvinger\AmoCRMTools\lib\models\user\AmoUserInformation;

class AmoUsersGetter extends BaseRealGetter
{
    /**
     * @return AmoUserInformation[]
     */
    public function getAccountUsers(): array
    {
        $currentAccountInfo = $this->client->account->apiCurrent();

        return array_map(
            function ($user) {
                return [
                    'id' => $user['id'],
                    'title' => $user['name'],
                ];
            },
            $currentAccountInfo['users']
        );
    }
}
