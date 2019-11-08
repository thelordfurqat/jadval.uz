<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guruh */

$this->title = 'Guruh qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Guruhlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guruh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
