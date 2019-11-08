<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UqtuvchiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uqtuvchis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uqtuvchi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Uqtuvchi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fio',
            'image',
            'lavozim',
            'kafedra_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
