<?php
/**
 * Created by PhpStorm.
 * User: zvinger
 * Date: 02.04.18
 * Time: 19:15
 */

namespace Zvinger\AmoCRMTools\lib\interfaces\misc;


interface ArrayHelperInterface
{
    public function getValue($array, $key, $default = NULL);
}