<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DarsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fan_id') ?>

    <?= $form->field($model, 'kun') ?>

    <?= $form->field($model, 'vaqt') ?>

    <?= $form->field($model, 'guruh_id') ?>

    <?php // echo $form->field($model, 'xona_id') ?>

    <?php // echo $form->field($model, 'dars_turi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
