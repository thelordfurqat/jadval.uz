<?php
$yuklama=0;
foreach ($model->dars as $item){
    $yuklama+=$item->fan->yuklama;
}

?>

<main class="main">
           <section class="teacher-info">
               <div class="avatar-box">
                   <img src="<?=Yii::$app->homeUrl?>image/<?=$model->image?>" class="avatar">
               </div>
               <p class="full-name"><b>To'liq ism: </b><?=$model->fio?></p>
               <p class="chair"><b>Kafedra: </b><?=$model->kafedra->name?></p>
               <p class="duty"><b>Lavozimi: </b><?=$model->lavozim?></p>
               <p class="duty"><b>Yuklama: </b><?=$yuklama?> soat</p>

               <!-- <div class="row">
                   <a href="<?=Yii::$app->urlManager->createUrl(['uqtuvchi/update','id'=>$model->id])?>" class="col-sm-6"><div class="btn-add">Tahrirlash</div> </a>
                   <a href="<?=Yii::$app->urlManager->createUrl(['uqtuvchi/delete','id'=>$model->id])?>" data-confirm="Are you sure you want to delete this item?" data-method="post" class="col-sm-6"><div class="btn-remove">O'chirish</div> </a>
               </div> -->
           </section>

           <section class="schedule">
            <h3>DARS JADVALI</h3>
            <h6 class="semester">Sentabr 2,2018 - Fevral 30,2019</h6>

            <table>
                <thead>
                    <tr>
                        <th>Kun / Vaqt</th>
                        <th>Dush</th>
                        <th>Sesh</th>
                        <th>Chor</th>
                        <th>Pay</th>
                        <th>Jum</th>
                        <th>Shan</th>
                    </tr>
                        <?for ($j=1;$j<=6;$j++){?>

                            <tr>
                                <td><?php
                                    switch ($j){
                                        case '1':echo '08 : 30';break;
                                        case '2':echo '10 : 00';break;
                                        case '3':echo '11 : 30';break;
                                        case '4':echo '13 : 30';break;
                                        case '5':echo '15 : 00';break;
                                        case '6':echo '16 : 30';break;
                                    }
                                    ?></td>
                                <?php for ($i=1;$i<=6;$i++){?>
                                        <td>
                                            <a href="<?=Yii::$app->urlManager->createUrl(['dars/create','uqtuvchi_id'=>$model->id,'vaqt'=>$j,'kun'=>$i])?>">
                                                <div style="width: 100%;height: 100%">
                                                    <?if(!$model->darsqu($model->id,$i,$j,1) && !$model->darsqu($model->id,$i,$j,2) && !$model->darsqu($model->id,$i,$j,3)){?>
                                                        <i class="fa fa-edit" style="font-size: 20px"></i>
                                                    <?}?>
                                                    <?php $dars=$model->darsqu($model->id,$i,$j,1);
                                                    if($dars){?>
                                                        <a href="<?=Yii::$app->urlManager->createUrl(['dars/view','id'=>$dars->id])?>">
                                                            <div class="generally" id="myBtn<?=$i.$j.'1'?>" >
                                                                <span class="t-subject"><?=$dars->fan->name?><span class="t-type"> (<?=$dars->dars_turiqu($dars->dars_turi)?>)</span></span>
                                                                <span class="t-room"><?=$dars->xona->name?>-xona</span>
                                                                <span class="t-group"><?=$dars->guruh->name?>-guruh</span>
                                                            </div>
                                                        </a>

                                                    <?}
                                                    $dars=$model->darsqu($model->id,$i,$j,3);

                                                    if($dars){?>
                                                        <a href="<?=Yii::$app->urlManager->createUrl(['dars/view','id'=>$dars->id])?>">
                                                            <div class="odd" id="myBtn<?=$i.$j.'3'?>">
                                                                <span class="t-subject"><?=$dars->fan->name?><span class="t-type"> (<?=$dars->dars_turiqu($dars->dars_turi)?>)</span></span>
                                                                <span class="t-room"><?=$dars->xona->name?>-xona</span>
                                                                <span class="t-group"><?=$dars->guruh->name?>-guruh</span>
                                                            </div>
                                                        </a>
                                                        <?if(!$model->darsqu($model->id,$i,$j,2)){
                                                            echo '<a href="'.Yii::$app->urlManager->createUrl(['dars/create','uqtuvchi_id'=>$dars->uqtuvchi_id,'vaqt'=>$j,'kun'=>$i,'xafta_turi'=>2]).'"><div class="even"></div></a>';
                                                        }?>
                                                    <?}
                                                    $dars=$model->darsqu($model->id,$i,$j,2);

                                                    if($dars){?>
                                                        <?if(!$model->darsqu($model->id,$i,$j,3)){
                                                            echo '<a href="'.Yii::$app->urlManager->createUrl(['dars/create','uqtuvchi_id'=>$dars->uqtuvchi_id,'vaqt'=>$j,'kun'=>$i,'xafta_turi'=>3]).'"><div class="odd"></div></a>';
                                                        }?>
                                                        <a href="<?=Yii::$app->urlManager->createUrl(['dars/view','id'=>$dars->id])?>">
                                                            <div class="even" id="myBtn<?=$i.$j.'2'?>" >
                                                                <span class="t-subject"><?=$dars->fan->name?><span class="t-type"> (<?=$dars->dars_turiqu($dars->dars_turi)?>)</span></span>
                                                                <span class="t-room"><?=$dars->xona->name?>-xona</span>
                                                                <span class="t-group"><?=$dars->guruh->name?>-guruh</span>
                                                            </div>
                                                        </a>
                                                    <?}?>
                                                </div>
                                            </a>
                                        </td>
                                <?}?>
                            </tr>

                        <?}?>
                </thead>
            </table>
           </section>

        </main>




<script>
    function DarsClicked(id, kun, vaqt, xafta_turi) {

        alert(id+ " "+ kun+ " " + vaqt+" "+xafta_turi)
    }

</script>
