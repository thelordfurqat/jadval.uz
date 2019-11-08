<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dars qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'uqtuvchi_id',
                'value'=>function($x){return $x->uqtuvchi->fio;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Uqtuvchi::find()->all(),'id','fio'),
            ],
//            'id',
            [
                'attribute'=>'fan_id',
                'value'=>function($x){return $x->fan->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Fan::find()->all(),'id','name'),
//            'fan_id',
            ],
//            'kun',
            [
                'attribute'=>'kun',
                'value'=>function($x){
                    switch ($x->kun){
                        case '1':return 'Dushanba';break;
                        case '2':return 'Seshanba';break;
                        case '3':return 'Chorshanba';break;
                        case '4':return 'Payshanba';break;
                        case '5':return 'Juma';break;
                        case '6':return 'Shanba';break;
                        default: return 'XX:XX';
                    }
                }
            ],
            [
                'attribute'=>'vaqt',
                'value'=>function($x){
                    switch ($x->vaqt){
                        case '1':return '08:30';break;
                        case '2':return '10:00';break;
                        case '3':return '11:30';break;
                        case '4':return '13:30';break;
                        case '5':return '15:00';break;
                        case '6':return '16:30';break;
                        default: return 'XX:XX';
                    }
                }
            ],
            [
                'attribute'=>'xafta_turi',
                'value'=>function($x){
                    switch ($x->xafta_turi){
                        case '1':return 'Umumiy';break;
                        case '2':return 'Juft';break;
                        case '3':return 'Toq';break;
                        default: return 'Umumiy';
                    }
                }
            ],

//            'vaqt',
          [
              'attribute'=>'guruh_id',
              'value'=>function($x){return $x->guruh->name;},
              'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Guruh::find()->all(),'id','name'),
          ],
//            'guruh_id',
            //'xona_id',
            //'dars_turi',

            array(
                'class' => 'yii\grid\ActionColumn',
                'header' => '<a>Actions</a>',

                'template' => '{view}{update}{delete}',
                'buttons' => array(
                    'view' => function ($url, $model) {
                        return Html::a(Yii::t('app', '<span class="fa fa-eye" style="width: 18px"></span>'), array(
                                'uqtuvchi/view', 'id' => $model->uqtuvchi->id), array(
                                'class' => 'btn btn-success',
                            )).'<br>';
                    },

                    'update' => function ($url, $model) {
                        return Html::a(Yii::t('app', '<span class="fa fa-edit" style="width: 18px"></span>'), array('update', 'id' => $model->id), array(
                                'class' => 'btn btn-primary'
                            )).'<br>';
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Yii::t('app', '<span class="fa fa-trash" style="width: 18px"></span>'), array('delete', 'id' => $model->id), array(
                            'class' => 'btn btn-danger',
                            'data' => array(
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ),
                        ));
                    }

                ),
            ),
        ],
    ]); ?>
</div>
