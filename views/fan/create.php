<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fan */

$this->title = 'Fan qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
