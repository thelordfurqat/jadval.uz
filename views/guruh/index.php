<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GuruhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guruhlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guruh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Guruh qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','headerOptions' => ['style' => 'width:5%'],],

            [
                'attribute'=>'id',
                'headerOptions'=>['style'=>'width:5%']
            ],
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '<a>Actions</a>',
                'headerOptions' => ['style' => 'width:17%'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(Yii::t('app', '<span class="fa fa-eye" style="width: 18px"></span>'), ['view', 'id' => $model->id], [
                                'class' => 'btn btn-success',
                            ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a(Yii::t('app', '<span class="fa fa-edit" style="width: 18px"></span>'), ['update', 'id' => $model->id], [
                                'class' => 'btn btn-primary'
                            ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Yii::t('app', '<span class="fa fa-trash" style="width: 18px"></span>'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);
                    }

                ],
            ],
        ],
    ]); ?>
</div>
