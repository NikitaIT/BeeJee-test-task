<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 18:58
 */

use testtask\core\domain\Task;

?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>
            <h4>Добавить новый товар</h4>
            <br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="pwd">Username:</label>
                            <input type="password" name="<?=Task::getUsernameDBName()?>" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name="<?=Task::getEmailDBName()?>" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Text:</label>
                            <textarea name="<?=Task::getTextDBName()?>" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Image:</label>
                            <input type="file" class="btn btn-default" name="<?=Task::getImageDBName()?>" placeholder="" value="">
                        </div>
                        <input type="submit" name="submit" class="btn btn-default" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

