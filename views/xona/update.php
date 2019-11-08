<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Xona */

$this->title = 'Taxrirlash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Xonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="xona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
