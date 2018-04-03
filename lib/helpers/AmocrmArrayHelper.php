<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 19:15
 */

namespace Zvinger\AmoCRMTools\lib\helpers;


use yii\helpers\ArrayHelper;
use Zvinger\AmoCRMTools\lib\interfaces\misc\ArrayHelperInterface;

class AmocrmArrayHelper implements ArrayHelperInterface
{
    public function getValue($array, $key, $default = NULL)
    {
        return ArrayHelper::getValue($array, $key, $default);
    }
}