<?php

namespace testtask\core\components;

/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
abstract class AdminBase
{

    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    public static function checkAdmin()
    {
        if (isset($_SESSION['X-Auth-Token'])) {
            if($_SESSION['X-Auth-Token'] == "admin123"){
                return true;
            }
        }
        return false;
    }
    /**
     * Метод, который делает пользователя администратором
     * @return boolean
     */
    protected static function setAdmin()
    {
        $_SESSION['X-Auth-Token'] = "admin123";
    }
    /**
     * Метод, который делает пользователя администратором
     * @return boolean
     */
    protected static function unsetAdmin()
    {
        if (isset($_SESSION['X-Auth-Token'])) {
            unset($_SESSION['X-Auth-Token']);
        }
    }
}
