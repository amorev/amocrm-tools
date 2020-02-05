<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 18:39
 */

namespace Zvinger\AmoCRMTools\handlers;


use AmoCRM\Client;
use yii\base\Component;
use Zvinger\AmoCRMTools\handlers\real\contact\ContactGetterHandler;
use Zvinger\AmoCRMTools\handlers\real\lead\AssignedHandler;
use Zvinger\AmoCRMTools\handlers\real\lead\LeadGetterHandler;
use Zvinger\AmoCRMTools\handlers\real\user\AmoUsersGetter;
use Zvinger\AmoCRMTools\lib\helpers\AmocrmArrayHelper;
use Zvinger\AmoCRMTools\lib\interfaces\contact\ContactGetterInterface;
use Zvinger\AmoCRMTools\lib\interfaces\lead\AssignedInterface;
use Zvinger\AmoCRMTools\lib\interfaces\lead\LeadGetterInterface;
use Zvinger\AmoCRMTools\lib\interfaces\misc\ArrayHelperInterface;

class AmocrmToolsHandlers extends Component
{
    public $debug = false;

    public $clientConfig = false;

    public function init()
    {
        \Yii::$container->setDefinitions([]);
        \Yii::$container->setSingletons(
            [
                LeadGetterInterface::class => LeadGetterHandler::class,
                AssignedInterface::class => AssignedHandler::class,
                ContactGetterInterface::class => ContactGetterHandler::class,
                Client::class => function () {
                    return \Yii::createObject($this->clientConfig)->getClient();
                },
                ArrayHelperInterface::class => AmocrmArrayHelper::class,
            ]
        );
        parent::init();
    }


    /**
     * @return LeadGetterInterface
     * @throws \yii\base\InvalidConfigException
     */
    public function getLeadGetter(): LeadGetterInterface
    {
        return \Yii::createObject(LeadGetterInterface::class);
    }

    /**
     * @return LeadGetterInterface
     * @throws \yii\base\InvalidConfigException
     */
    public function getLeadAssigner(): AssignedInterface
    {
        return \Yii::createObject(AssignedInterface::class);
    }

    /**
     * @return ContactGetterInterface
     * @throws \yii\base\InvalidConfigException
     */
    public function getContactGetter(): ContactGetterInterface
    {
        return \Yii::createObject(ContactGetterInterface::class);
    }

    /**
     * @return AmoUsersGetter
     * @throws \yii\base\InvalidConfigException
     */
    public function getUserGetter(): AmoUsersGetter
    {
        return \Yii::createObject(AmoUsersGetter::class);
    }
}
