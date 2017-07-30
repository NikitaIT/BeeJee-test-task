<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 29.07.2017
 * Time: 16:56
 */

namespace testtask\core\repository;



use testtask\core\components\MyPDO;
use testtask\core\domain\Task;

class TaskRepository extends CRUDRepository
{
//    public function findAll();
//    public function findById($id);
//    public function deleteAll();
    /**
     * Возвращает массив последних тaсков
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public function findLatestTasks($count)
    {
        // Используется подготовленный запрос
        $st = static::$db->prepare(
            'SELECT (*) FROM '. Task::getTaskDBName().
            ' ORDER BY '.Task::getIdDBName().' DESC '.
            'LIMIT :count');
        $st->bindParam(':count', $count, MyPDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $st->setFetchMode(MyPDO::FETCH_ASSOC);
        $st->execute();
        // Получение и возврат результатов
        $i = 0;
        $tasks = array();
        while ($TaskArray = $st->fetch()){
            $tasks[$i] = new Task($TaskArray[Task::getIdDBName()],
                $TaskArray[Task::getUsernameDBName()],
                $TaskArray[Task::getEmailDBName()],
                $TaskArray[Task::getTextDBName()],
                $TaskArray[Task::getImageDBName()],
                $TaskArray[Task::getIsDoneDBName()]);
            $i++;
        }
        return $tasks;
    }
    public function findAll()
    {
        $listOfTaskArrays = parent::findAll();
        $i = 0;
        $tasks = array();
        while ($TaskArray = $listOfTaskArrays[$i]){
            $tasks[$i] = new Task($TaskArray[Task::getIdDBName()],
                $TaskArray[Task::getUsernameDBName()],
                $TaskArray[Task::getEmailDBName()],
                $TaskArray[Task::getTextDBName()],
                $TaskArray[Task::getImageDBName()],
                $TaskArray[Task::getIsDoneDBName()]);
            $i++;
        }
        return $tasks;
    }
    public function update(Task $task)
    {
        $st = static::$db->prepare(
            'UPDATE '.Task::getTaskDBName() .
            ' SET '.Task::getUsernameDBName().' = :'.Task::getUsernameDBName().
            ', '.Task::getEmailDBName().' = :'.Task::getEmailDBName().
            ', '.Task::getTextDBName().' = :'.Task::getTextDBName().
            ', '.Task::getIsDoneDBName().' = :'.Task::getIsDoneDBName().
            ', '.Task::getImageDBName().' = :'.Task::getImageDBName().
            ' WHERE '.Task::getIdDBName().' = :'.Task::getIdDBName()
        );
        return $st->execute(array(
            ':'.Task::getIdDBName() => $task->getId(),
            ':'.Task::getUsernameDBName() => $task->getUsername(),
            ':'.Task::getEmailDBName() => $task->getEmail(),
            ':'.Task::getTextDBName() => $task->getText(),
            ':'.Task::getIsDoneDBName() => $task->getIsDone(),
            ':'.Task::getImageDBName() => $task->getImage()
        ));
    }
    /**
     * @param Task $task
     */
    public function create(Task $task)
    {
        $st = static::$db->prepare(
            'insert into '.$task::getTaskDBName() .
            ' set '.$task::getIdDBName().' = :'.$task::getIdDBName().
            ', '.$task::getUsernameDBName().' = :'.$task::getUsernameDBName().
            ', '.$task::getEmailDBName().' = :'.$task::getEmailDBName().
            ', '.$task::getTextDBName().' = :'.$task::getTextDBName().
            ', '.$task::getIsDoneDBName().' = :'.$task::getIsDoneDBName().
            ', '.$task::getImageDBName().' = :'.$task::getImageDBName()
        );
        if ($st->execute(array(
            ':'.Task::getIdDBName() => $task->getId(),
            ':'.Task::getUsernameDBName() => $task->getUsername(),
            ':'.Task::getEmailDBName() => $task->getEmail(),
            ':'.Task::getTextDBName() => $task->getText(),
            ':'.Task::getIsDoneDBName() => $task->getIsDone(),
            ':'.Task::getImageDBName() => $task->getImage()
        ))) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return static::$db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
}