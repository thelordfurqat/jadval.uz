<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'maruza') ?>
    <?= $form->field($model, 'amaliyot') ?>
    <?= $form->field($model, 'labaratoriya') ?>
    <?= $form->field($model, 'seminar') ?>
    <?= $form->field($model, 'mustaqil') ?>
    <?= $form->field($model, 'yuklama') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
