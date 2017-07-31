<?php

namespace testtask\core\components;
use testtask\core\controller;

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{

    /**
     * Свойство для хранения массива роутов
     * @var array 
     */
    private $routes;

    /**
     * Конструктор
     */
    public function __construct()
    {
        // Путь к файлу с роутами
        $routesPath = ROOT . '\config\routes.php';

        // Получаем роуты из файла
        $this->routes = include($routesPath);
    }

    /**
     * Возвращает строку запроса
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return "";
    }

    /**
     * Метод для обработки запроса
     */
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();
        $uri = preg_replace("~testtask/app~", "", $uri);
//        echo "__";
//        print_r($uri);
//        echo "__";
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
                // Получаем внутренний путь из внешнего согласно правилу.
                $uri = preg_replace("~//~", "/",$uri);
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
//                echo "<br>";
//                print_r($path);
//                echo "<br>";
//                echo "<br>";
//                print_r($internalRoute);
//                echo "<br>";
                // Определить контроллер, action, параметры
                $segments = explode('/', $internalRoute);
                if ($uri != ""){
                    array_shift($segments);
                }
                $controllerName = array_shift($segments) . "Controller";

                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;
                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controller/' .
                        $controllerName . '.php';

//                if (file_exists($controllerFile)) {
//                    include_once($controllerFile);
//                }
                // Создать объект, вызвать метод (т.е. action)
                $controllerName = "testtask\\core\\controller\\".$controllerName;
                $controllerObject = new $controllerName;
//                echo "_controllerObject_";
//                print_r($controllerObject);
//                echo "_actionName_";
//                print_r($actionName);
//                echo "_parameters_";
//                print_r($parameters);
//                echo "__";
                /* Вызываем необходимый метод ($actionName) у определенного
                 * класса ($controllerObject) с заданными ($parameters) параметрами
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }

    }

}
