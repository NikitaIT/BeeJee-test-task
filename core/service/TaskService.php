<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 29.07.2017
 * Time: 18:45
 */

namespace testtask\core\service;


use testtask\core\domain\Task;

interface TaskService
{
    public function findAll();
    public function findById($id);
    public function findLatestTasksByPageAndLimitOrderByOrd($ord,$page,$limit);
    public function deleteAll();
    public function update(Task $task);
    public function create(Task $task);
    public function count();
}