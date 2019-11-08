<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?=Yii::$app->homeUrl?>theme/assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    jADVAL
                </a>
            </div>

            <ul class="nav">
                <li class="<?= Yii::$app->request->url==Yii::$app->homeUrl ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->homeUrl?>">
                        <i class="pe-7s-id"></i>
                        <p>O'qituvchilar</p>
                    </a>
                </li>
                <li class="<?=Yii::$app->request->url==Yii::$app->urlManager->createUrl(['kafedra']) ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->urlManager->createUrl(['kafedra'])?>">
                        <i class="pe-7s-culture"></i>
                        <p>Kafedra</p>
                    </a>
                </li>
                <li class="<?=Yii::$app->request->url==Yii::$app->urlManager->createUrl(['dars']) ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->urlManager->createUrl(['dars'])?>">
                        <i class="pe-7s-study"></i>
                        <p>Darslar</p>
                    </a>
                </li>
                <li class="<?=Yii::$app->request->url==Yii::$app->urlManager->createUrl(['guruh']) ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->urlManager->createUrl(['guruh'])?>">
                        <i class="pe-7s-users"></i>
                        <p>Guruhlar</p>
                    </a>
                </li>
                <li class="<?=Yii::$app->request->url==Yii::$app->urlManager->createUrl(['xona']) ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->urlManager->createUrl(['xona'])?>">
                        <i class="pe-7s-map-marker"></i>
                        <p>Xonalar</p>
                    </a>
                </li>
                <li class="<?=Yii::$app->request->url==Yii::$app->urlManager->createUrl(['fan']) ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->urlManager->createUrl(['fan'])?>">
                        <i class="pe-7s-notebook"></i>
                        <p>Fanlar</p>
                    </a>
                </li>
                <li class="<?=Yii::$app->request->url==Yii::$app->urlManager->createUrl(['user']) ? 'active'  : '' ?>">
                    <a href="<?=Yii::$app->urlManager->createUrl(['user'])?>">
                        <i class="pe-7s-user"></i>
                        <p>Foydalanuvchilar</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">O'qituvchilar</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a>
                                <input type="text" class="input-search">
                            </a>
                        </li>
                        
                        <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form action="<?=Yii::$app->urlManager->createUrl(['/site/logout'])?>" method="post" style="padding: 15px">
                                <?=Html::beginForm()?>

                                <a href="">
                                <p><button style="border: none; background-color: transparent" type="submit">Log out</button> </p>
                            </a>
                                <?=Html::endForm()?>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <?=$content?>

                </div>
            </div>
        </div>
      <footer class="footer">
            <div class="container-fluid">
               
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Jumaniyozov Xushnud</a> tomonidan yaratildi!
                </p>
            </div>
        </footer>
    </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
