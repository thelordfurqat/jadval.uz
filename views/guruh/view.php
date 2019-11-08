<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Guruh */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Guruhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="guruh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>

<?php $dars=\app\models\Dars::find()->all()?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Darslar ro'yxati</h4>
                <?if(!sizeof($dars)){?>
                    <p class="category">Bugun dars yo'q</p>
                <?}?>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>№</th>
                    <th>Professor-o'qituvchi</th>
                    <th>Fan</th>
                    <th>Xona</th>
                    <th>Kun</th>
                    <th>Vaqt</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?foreach ($dars as $i=>$item){?>
                        <?if($item->guruh_id==$model->id){?>
                            <tr>
                                <td><?=$i+1?></td>
                                <td><?=$item->uqtuvchi->fio?></td>
                                <td><?=$item->fan->name?></td>
                                <td><?=$item->xona->name?></td>
                                <td><?php switch ($item->kun){
                                        case '1':echo 'Dushanba';break;
                                        case '2':echo 'Seshanba';break;
                                        case '3':echo 'Chorshanba';break;
                                        case '4':echo 'Payshanba';break;
                                        case '5':echo 'Juma';break;
                                        case '6':echo 'Shanba';break;
                                        default: echo 'XX:XX';
                                    }?></td>
                                <td><?php switch ($item->vaqt){
                                        case '1':echo '08:30';break;
                                        case '2':echo '10:00';break;
                                        case '3':echo '11:30';break;
                                        case '4':echo '13:30';break;
                                        case '5':echo '15:00';break;
                                        case '6':echo '16:30';break;
                                        default: echo 'XX:XX';
                                    }?></td>
                                <td>
                                    <a class="btn btn-success" href="<?=Yii::$app->urlManager->createUrl(['uqtuvchi/view','id'=>$item->uqtuvchi->id])?>">
                                        <span class="fa fa-eye" style="width: 18px"></span>
                                    </a><br>
                                    <a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl(['dars/update','id'=>$item->id])?>">
                                        <span class="fa fa-edit" style="width: 18px"></span>
                                    </a><br>
                                    <a class="btn btn-danger" href="<?=Yii::$app->urlManager->createUrl(['dars/delete','id'=>$item->id])?>" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                        <span class="fa fa-trash" style="width: 18px"></span>
                                    </a>

                                </td>
                            </tr>
                        <?}?>
                    <?}?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>