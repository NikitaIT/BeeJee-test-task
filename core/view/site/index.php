<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 0:10
 */

use testtask\core\components\AdminBase;


    include ROOT . '/view/layouts/header.php';
    function renderTask(\testtask\core\domain\Task $task)
    {
        $btns = $done = $text = "";
        $done = ($task->getIsDone())?"Done":"Not Done";
        if(AdminBase::checkAdmin()){
            $btns = "<p>
                        <a data-id='{$task->getId()}' class='btn btn-default done' role='button'>{$done}</a>
                        <a data-id='{$task->getId()}'class='btn btn-default edit' role='button'>Save Text</a>
                     </p>";
            $text = "<textarea class='form-control text-{$task->getId()}' rows='5'>{$task->getText()}</textarea>";
        }else{
            $text = "<p>{$task->getText()}</p>";
        }
        echo "
            <div class='col-sm-6 col-md-4\'>
                <div class='thumbnail'>
              <img src='{$task->getImagePath()}' alt='...'>
              <div class='caption'>
                <h3>{$task->getUsername()}{$task->getEmail()}</h3>
                <p>{$done}</p>
                <p>{$text}<p>
                {$btns}
              </div>
            </div>
          </div>
        ";
    }
 ?>


    <section>
        <div class="container">
            <p>Стартовая страница - список задач с возможностью сортировки по имени пользователя, email и статусу. Вывод задач нужно сделать страницами по 3 штуки (с пагинацией). Видеть список задач и создавать новые может любой посетитель без регистрации.</p>

            <div class="row">
                <div class="col-sm-3">
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>
                        <div class="row">
                        <?php foreach ($tasks as $task)
                        {
                            renderTask($task);
                        }?>
                        </div>
                    </div>
                </div><!--features_items-->
                <!-- Постраничная навигация -->
                <?php echo $pagination->get(); ?>
    </section>

<?php include ROOT . '/view/layouts/footer.php'; ?>