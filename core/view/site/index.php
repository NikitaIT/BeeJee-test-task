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
            <div class='col-sm-4 col-md-2\'>
                <div class='thumbnail'>
              <img src='{$task->getImagePath()}' alt='...'>
              <div class='caption'>
                <p>Статус: <mark>{$done}<mark></p>
                <blockquote class='blockquote-reverse small'>
                {$text}
                <footer>{$task->getUsername()} : {$task->getEmail()}</footer>
                <blockquote>
                {$btns}
              </div>
            </div>
          </div>
        ";
    }
 ?>
    <section>
        <div class="container">

            <div class="row">
                <div class="col-sm-2">
                    <div class="list-group">
                        <br><br>
                        <a href="<?=MY_SERVER?>/id/page-1" class="list-group-item">По дате добавления</a>
                        <a href="<?=MY_SERVER?>/username/page-1" class="list-group-item">По имени пользователя</a>
                        <a href="<?=MY_SERVER?>/email/page-1" class="list-group-item">По почте</a>
                    </div>
                </div>

                <div class="col-sm-10 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">TODO List</h2>
                        <div class="row">
                        <?php foreach ($tasks as $task)
                        {
                            renderTask($task);
                        }?>
                            <!-- Постраничная навигация -->
                            <?php echo $pagination->get(); ?>
                        </div>
                    </div>
                </div><!--features_items-->
    </section>

<?php include ROOT . '/view/layouts/footer.php'; ?>