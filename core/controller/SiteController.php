<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 0:04
 */

namespace testtask\core\controller;


use Imagick;
use testtask\core\components\ImgResizer;
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
//        echo "ord = ";
//        print_r($ord);
//        echo  "; page = ";
//        print_r($page);
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
     * Action для страницы "Добавить task"
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
                if (is_uploaded_file($_FILES[Task::getImageDBName()]["tmp_name"])){
                        $type = strtolower(strrchr($_FILES[Task::getImageDBName()]['name'],"."));
                        $type = str_replace(".","",$type);
                        print_r($type);
                        $task->setImage($type);
                }else{
                    $task->setImage("");
                }
                $id = $this->taskService->create($task
                    ->setUsername($options[Task::getUsernameDBName()])
                    ->setEmail($options[Task::getEmailDBName()])
                    ->setText($options[Task::getTextDBName()]));
                // Если запись добавлена
                if ($id) {
                    echo "ok";
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES[Task::getImageDBName()]["tmp_name"])
                        &&$task->getImage()!="") {
                        $picture = $_FILES[Task::getImageDBName()];

                        $pic_type = strtolower(strrchr($picture['name'],"."));
                        $pic_name = ROOT.'/..' . "/upload/images/task/{$id}"."$pic_type";
                        
                        move_uploaded_file($picture['tmp_name'], $pic_name);
                        if (true !== ($pic_error = ImgResizer::image_resize($pic_name, $pic_name, 320, 240, 1))) {
                            echo $pic_error;
                            unlink($pic_name);
                        }
                        else echo "OK!";
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
//                        $_SERVER['DOCUMENT_ROOT']
//                        $_FILES[Task::getImageDBName()]["tmp_name"]->adaptiveResizeImage(1024,768);
                        //move_uploaded_file($_FILES[Task::getImageDBName()]["tmp_name"], ROOT.'\\..' . "/upload/images/task/{$id}.{$task->getImage()}");

                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                //header("Location: ". MY_SERVER);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/view/site/create.php');
        return true;
    }
    /**
     * Action для (ajax)
     * @param integer $id <p>id </p>
     */
    public function actionIsDone($id)
    {
        $task = $this->taskService->findById($id);
        $task->setIsDone(!$task->getIsDone());
        echo $this->taskService->update($task);
        return true;
    }
    /**
     * Action для изменения текста(ajax)
     * @param integer $id <p>id </p>
     */
    public function actionEditText($id)
    {
        if (isset($_POST["text"])){
            $task = $this->taskService->findById($id);
//            print_r($task);
            $task->setText($_POST["text"]);
            echo $this->taskService->update($task);
        }
        echo false;
        return true;
    }
}