<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 0:10
 */
    include ROOT . '/view/layouts/header.php';
    function renderTask(\testtask\core\domain\Task $task)
    {
        echo "<div class=\"col-sm-4\">
                  <div class=\"product-image-wrapper\">
                       <div class=\"single-products\">
                            <div class=\"productinfo text-center\">
                               {$task->getId()}
                            </div>
                            <h1>{$task->getUsername()}</h1>
                            <p>{$task->getText()}</p>
                       </div>
                  </div>
              </div>";
    }
 ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>

                        <?php foreach ($tasks as $task)
                        {
                            renderTask($task);
                        }?>
                    </div>
                </div><!--features_items-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Рекомендуемые товары</h2>

                        <div class="cycle-slideshow"
                             data-cycle-fx=carousel
                             data-cycle-timeout=5000
                             data-cycle-carousel-visible=3
                             data-cycle-carousel-fluid=true
                             data-cycle-slides="div.item"
                             data-cycle-prev="#prev"
                             data-cycle-next="#next"
                        >
<!--                            --><?php //foreach ($sliderProducts as $sliderItem): ?>
<!--                                <div class="item">-->
<!--                                    <div class="product-image-wrapper">-->
<!--                                        <div class="single-products">-->
<!--                                            <div class="productinfo text-center">-->
<!--                                                <img src="--><?php //echo Product::getImage($sliderItem['id']); ?><!--" alt="" />-->
<!--                                                <h2>$--><?php //echo $sliderItem['price']; ?><!--</h2>-->
<!--                                                <a href="/product/--><?php //echo $sliderItem['id']; ?><!--">-->
<!--                                                    --><?php //echo $product['name']; ?>
<!--                                                </a>-->
<!--                                                <br/><br/>-->
<!--                                                <a href="#" class="btn btn-default add-to-cart" data-id="--><?php //echo $sliderItem['id']; ?><!--"><i class="fa fa-shopping-cart"></i>В корзину</a>-->
<!--                                            </div>-->
<!--                                            --><?php //if ($sliderItem['is_new']): ?>
<!--                                                <img src="/template/images/home/new.png" class="new" alt="" />-->
<!--                                            --><?php //endif; ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            --><?php //endforeach; ?>
                        </div>

                        <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>

                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>

    </section>

<?php //include ROOT . '/view/layouts/footer.php'; ?>