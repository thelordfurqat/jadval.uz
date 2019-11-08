<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Foydalanuvchi qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'image',
                'value'=>function($d){
//                    return "<img src='/web/image/{$d->image}' onerror='this.src=;' style='width:100px;' >";
                    return "<object data='/web/image/{$d->image}' type='image/png' style='width: 100px'><img src='/web/image/avatar.jpg' style='width:100px;'></object>";

                },
                'filter'=>false,
                'format'=>'raw'
            ],

            'fio',
            'username',
//            'password',
//            'image',
            //'auth_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
