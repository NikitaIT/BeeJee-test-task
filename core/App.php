<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 29.07.2017
 * Time: 16:00
 */

namespace testtask\core;



use testtask\core\components\DataMapper;
use testtask\core\components\MyPDO;
use testtask\core\components\Router;

class App
{
    public function __construct()
    {
        static::main();
    }
    public static function main(){

        // FRONT CONTROLLER
        // Общие настройки

        //require_once(ROOT.'/components/Autoload.php');
        // Вызов Router
        DataMapper::init(new MyPDO());
        $router = new Router();
        $router->run();
    }
}