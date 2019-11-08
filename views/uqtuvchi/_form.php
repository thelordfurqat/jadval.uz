<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uqtuvchi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uqtuvchi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kafedra_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Kafedra::find()->all(),'id','name'))->label('Kafedrani tanlang') ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true,'required'=>true]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true,'required'=>true]) ?>

    <?= $form->field($model, 'lavozim')->textInput(['maxlength' => true,'required'=>true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
