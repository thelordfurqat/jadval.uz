<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KafedraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kafedralar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kafedra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kafedra qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'id',
                'headerOptions'=>['style'=>'width:15%']
            ],
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#89229b;width:18%'],
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
