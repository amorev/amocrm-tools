<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 19:10
 */

namespace Zvinger\AmoCRMTools\handlers\real;

use AmoCRM\Client;
use Zvinger\AmoCRMTools\lib\interfaces\misc\ArrayHelperInterface;

class BaseRealGetter
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var ArrayHelperInterface
     */
    protected $arrayHelper;

    public function __construct(Client $client, ArrayHelperInterface $arrayHelper)
    {
        $this->client = $client;
        $this->arrayHelper = $arrayHelper;
    }
}