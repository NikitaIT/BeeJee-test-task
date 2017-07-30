<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 0:04
 */

namespace testtask\core\controller;


use testtask\core\components\Pagination;
use testtask\core\domain\Task;
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
    public function actionIndex($ord = "", $page = 1)
    {
        echo "ord = ";
        print_r($ord);
        echo  "; page = ";
        print_r($page);
        if ($ord == ""){
            $ord = Task::getIdDBName();
        }

        // Список в категории
        $tasks = $this
            ->taskService
            ->findLatestTasksByPageAndLimitOrderByOrd($ord,$page);
        // Общее количетсво (необходимо для постраничной навигации)
        $total = $this->taskService->count();
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, TaskServiceImpl::SHOW_BY_DEFAULT, 'page-');


        //$tasks = $this->taskService->findAll();
        require_once(ROOT . '/view/site/index.php');
        return true;
    }
    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {

        // Получаем список категорий для выпадающего списка
//        $categoriesList = Category::getCategoriesListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options[Task::getUsernameDBName()] = $_POST[Task::getUsernameDBName()];
            $options[Task::getEmailDBName()] = $_POST[Task::getEmailDBName()];
            $options[Task::getTextDBName()] = $_POST[Task::getTextDBName()];

            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            function validate($options, $str, &$errors){
                if (!isset($options[$str]) ||
                    empty($options[$str])) {
                    $errors[] =  "Заполните поле".$str;
                }
            }
            validate($options, Task::getUsernameDBName(),$errors);
            validate($options, Task::getEmailDBName(),$errors);
            validate($options, Task::getTextDBName(),$errors);
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $task = new Task();

                $id = $this->taskService->create($task
                    ->setUsername($options[Task::getUsernameDBName()])
                    ->setEmail($options[Task::getEmailDBName()])
                    ->setText($options[Task::getTextDBName()])
                    ->setImage("jpg"));
                // Если запись добавлена
                if ($id) {
                    echo "ok";
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES[Task::getImageDBName()]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
//                        $_SERVER['DOCUMENT_ROOT']
                        move_uploaded_file($_FILES[Task::getImageDBName()]["tmp_name"], ROOT.'\\..' . "/upload/images/task/{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: ". MY_SERVER);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/view/site/create.php');
        return true;
    }
}