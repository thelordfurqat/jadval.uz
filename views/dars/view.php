<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dars */

$this->title = $model->fan->name;
$this->params['breadcrumbs'][] = ['label' => 'Dars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'uqtuvchi_id',
                'value'=>function($x){return $x->uqtuvchi->fio;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Uqtuvchi::find()->all(),'id','fio'),
            ],
            [
                'attribute'=>'guruh_id',
                'value'=>function($x){return $x->guruh->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Guruh::find()->all(),'id','name'),
            ],
            [
                'attribute'=>'xona_id',
                'value'=>function($x){return $x->xona->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Xona::find()->all(),'id','name'),
            ],
            [
                'attribute'=>'fan_id',
                'value'=>function($x){return $x->fan->name;},
                'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Fan::find()->all(),'id','name'),
            ],
            [
                'attribute'=>'dars_turi',
                'value'=>function($x){
                    switch ($x->dars_turi){
                        case '1':return 'Ma\'ruza';break;
                        case '2':return 'Seminar';break;
                        case '3':return 'Amaliyot';break;
                        case '4':return 'Tajriba';break;
                        default:return 'Umumiy';break;
                    }
                },
            ],
            [
                'attribute'=>'kun',
                'value'=>function($x){
                    switch ($x->kun){
                        case 1:return 'Dushanba';break;
                        case 2:return 'Seshanba';break;
                        case 3:return 'Chorshanba';break;
                        case 4:return 'Payshanba';break;
                        case 5:return 'Juma';break;
                        case 6:return 'Shanba';break;
                        default: return 'XX:XX';
                    }
                },
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
                },
            ],
        ],
    ]) ?>

</div>
