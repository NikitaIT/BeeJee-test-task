<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 0:04
 */

namespace testtask\core\controller;


use testtask\core\service\impl\TaskServiceImpl;

class SiteController
{
    private $taskService;

    /**
     * SiteController constructor.
     */
    public function __construct()
    {
        $this->taskService = new TaskServiceImpl();
    }

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
//        // Список категорий для левого меню
//        $categories = Category::getCategoriesList();
//
//        // Список последних товаров
//        $latestProducts = Product::getLatestProducts(6);
//
//        // Список товаров для слайдера
//        $sliderProducts = Product::getRecommendedProducts();
        $tasks = $this->taskService->findAll();
        // Подключаем вид
        require_once(ROOT . '/view/site/index.php');
        return true;
    }
}