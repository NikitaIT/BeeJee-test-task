<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 1:22
 */

namespace testtask\core\components;


/**
 * Class DataMapper
 * @package testtask\core\components
 */
class DataMapper
{
    /**
     * @var MyPDO
     */
    public static $db;

    /**
     * @param MyPDO $db
     */
    public static function init(MyPDO $db)
    {
        static::$db = $db;
    }
}