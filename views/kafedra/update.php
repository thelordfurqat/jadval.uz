<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kafedra */

$this->title = 'Taxrirlash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kafedralar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Taxrirlash';
?>
<div class="kafedra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
