<?php

return array(
    // Админпанель:
    'admin' => 'admin/index',
    // Главная страница
    'create' => 'site/create',
    // Категория товаров:
    'page-([0-9]+)' => 'site/index/id/$1', // actionIndex в SiteController
    '([0-9]+)/page-([0-9]+)' => 'site/index/$1/$2', // actionIndex в SiteController
//    '(^[a-zA-Z_]{1,}$)/' => 'site/index/$1', // actionIndex в SiteController
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index' // actionIndex в SiteController
);
