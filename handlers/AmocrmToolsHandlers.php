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
use Zvinger\AmoCRMTools\handlers\real\lead\LeadGetterHandler;
use Zvinger\AmoCRMTools\lib\helpers\AmocrmArrayHelper;
use Zvinger\AmoCRMTools\lib\interfaces\contact\ContactGetterInterface;
use Zvinger\AmoCRMTools\lib\interfaces\lead\LeadGetterInterface;
use Zvinger\AmoCRMTools\lib\interfaces\misc\ArrayHelperInterface;

class AmocrmToolsHandlers extends Component
{
    public $debug = FALSE;

    public $clientConfig = FALSE;

    public function init()
    {
        \Yii::$container->setDefinitions([

        ]);
        \Yii::$container->setSingletons([
            LeadGetterInterface::class    => LeadGetterHandler::class,
            ContactGetterInterface::class => ContactGetterHandler::class,
            Client::class                 => function () {
                return \Yii::createObject($this->clientConfig)->getClient();
            },
            ArrayHelperInterface::class   => AmocrmArrayHelper::class,
        ]);
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
     * @return ContactGetterInterface
     * @throws \yii\base\InvalidConfigException
     */
    public function getContactGetter(): ContactGetterInterface
    {
        return \Yii::createObject(ContactGetterInterface::class);
    }
}