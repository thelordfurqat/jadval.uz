<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dars */

$this->title = 'Dars qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Dars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
