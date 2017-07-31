<?php

namespace testtask\core\controller;
use testtask\core\components\AdminBase;

/**
 * Контроллер AdminController
 * Главная страница в админпанели
 */
class AdminController extends AdminBase
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    public function actionIndex()
    {
        // Обработка формы
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Вход"){
                // Если форма отправлена
                // Получаем данные из формы
                $username = $_POST['username'];
                $password = $_POST['password'];
                if ($password == 123 & $username == "admin"){
                    parent::setAdmin();
                    // Перенаправляем пользователя в закрытую часть - кабинет
                    header("Location: ". MY_SERVER);
                }
            }else{
                parent::unsetAdmin();
                header("Location: ". MY_SERVER);
            }
        }
        // Подключаем вид
        require_once(ROOT . '/view/admin/index.php');
        return true;
    }

}
