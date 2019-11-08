<?php
?>

<div class="row filter-group">
    <!-- <div class="btn-filter btn-active">Barcha</div>
    <div class="btn-filter">Kompyuter injinering</div>
    <div class="btn-filter">Dasturiy injeniring</div>
    <div class="btn-filter">AT</div> -->
    <a href="<?=Yii::$app->urlManager->createUrl(['uqtuvchi/create'])?>"><div class="btn-filter btn-active pull-right">O'qituvchi qo'shish</div></a>
</div>
<? foreach ($model as $item) {?>

    <?php
    $yuklama=0;
    foreach ($item->dars as $item1){
        $yuklama+=$item1->fan->yuklama;
    }
    ?>
<a href="<?=Yii::$app->urlManager->createUrl(['uqtuvchi/view','id'=>$item->id])?>">
    <div class="col-sm-4">
        <div class="card card-user">
            <div class="image">
                <!-- <img src="<?=Yii::$app->homeUrl?>theme/assets/img/full-screen-image-3.jpg" alt="..."/> -->
            </div>
            <div class="content">
                <div class="author">
                        <img class="avatar border-gray" src="<?=Yii::$app->homeUrl?>image/<?=$item->image?>" alt="..."/>

                        <h4 class="title"><?=$item->fio?><br />
                            <small><?=$item->lavozim?><br>
                            <small>Yuklama <?=$yuklama?></small>
                            </small>
                        </h4>
                    <br>
                </div>
                <p class="description text-center"><?=$item->kafedra->name?></p>
            </div>
        </div>
    </div>
    </a>
<?}?>

