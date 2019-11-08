<?php

use conquer\select2\Select2Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dars-form">
    <?php
    if(Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
            <?=Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif;?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uqtuvchi_id')->dropDownList(ArrayHelper::map(\app\models\Uqtuvchi::find()->all(),'id','fio')) ?>

    <?= $form->field($model, 'fan_id')->dropDownList( ArrayHelper::map(\app\models\Fan::find()->all(),'id','name'))?>

    <?= $form->field($model, 'guruh_id')->dropDownList(ArrayHelper::map(\app\models\Guruh::find()->all(),'id','name')) ?>
    <?= $form->field($model, 'xona_id')->dropDownList(ArrayHelper::map(\app\models\Xona::find()->all(),'id','name')) ?>
    <?= $form->field($model, 'dars_turi')->dropDownList(['1'=>'Ma\'ruza','2'=>'Seminar','3'=>'Amaliyot','4'=>'Tajriba']) ?>

    <?= $form->field($model, 'vaqt')->dropDownList(['1'=>'08:30','2'=>'10:00','3'=>'11:30','4'=>'13:30','5'=>'15:00','6'=>'15:30']) ?>

    <?= $form->field($model, 'kun')->dropDownList(['1'=>'Dushanba','2'=>'Seshanba','3'=>'Chorshanba','4'=>'Payshanba','5'=>'Juma','6'=>'Shanba']) ?>



    <?= $form->field($model, 'xafta_turi')->dropDownList(['1'=>'Umumiy','2'=>'Juft','3'=>'Toq']) ?>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
