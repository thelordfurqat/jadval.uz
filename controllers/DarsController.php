<?php

namespace app\controllers;

use app\models\Fan;
use app\models\Guruh;
use app\models\Uqtuvchi;
use Yii;
use app\models\Dars;
use app\models\DarsSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DarsController implements the CRUD actions for Dars model.
 */
class DarsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Lists all Dars models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dars model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        return $this->render('view',['model'=>$model]);
    }

    /**
     * Creates a new Dars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($uqtuvchi_id=null,$kun=null,$vaqt=null,$xafta_turi=null)
    {
        $model = new Dars();
        $fan=new Fan();
        $uqtuvchi=new Uqtuvchi();
        if($uqtuvchi_id){
            $uqtuvchi=Uqtuvchi::find()->where(['id'=>$uqtuvchi_id])->one();
            $model->uqtuvchi_id=$uqtuvchi_id;
        }
        if($kun)
            $model->kun=$kun;
        if($vaqt)
            $model->vaqt=$vaqt;
        if($xafta_turi)
            $model->xafta_turi=$xafta_turi;
        $guruh=new Guruh();

        if ($model->load(Yii::$app->request->post())){
//            print_r($model->xafta_turi);
            if(Dars::find()->where(['xona_id'=>$model->xona_id,'vaqt'=>$model->vaqt,'kun'=>$model->kun, 'xafta_turi'=>$model->xafta_turi])->all()){
                Yii::$app->session->setFlash('error', 'Bu paytda bu xonada dars bor');
                return $this->render('create', [
                    'model' => $model,
                    'fan'=>$fan,
                    'uqtuvchi'=>$uqtuvchi,
                    'guruh'=>$guruh
                ]);
            }
            else if(Dars::find()->where(['uqtuvchi_id'=>$model->uqtuvchi_id,'vaqt'=>$model->vaqt,'kun'=>$model->kun, 'xafta_turi'=>$model->xafta_turi])->all()){
                Yii::$app->session->setFlash('error', 'Bu paytda bu O\'qituvchining darsi bor');
                return $this->render('create', [
                    'model' => $model,
                    'fan'=>$fan,
                    'uqtuvchi'=>$uqtuvchi,
                    'guruh'=>$guruh
                ]);
            }
            else{
                $model->save();
                return $this->redirect(['uqtuvchi/view', 'id' => $model->uqtuvchi_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'fan'=>$fan,
            'uqtuvchi'=>$uqtuvchi,
            'guruh'=>$guruh
        ]);
    }

    /**
     * Updates an existing Dars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old=$model;
        if ($model->load(Yii::$app->request->post())){
            $dars2=Dars::find()->where(['uqtuvchi_id'=>$model->uqtuvchi_id,'vaqt'=>$model->vaqt,'kun'=>$model->kun])->one();
            $dars=Dars::find()->where(['xona_id'=>$model->xona_id,'vaqt'=>$model->vaqt,'kun'=>$model->kun])->one();
            if(sizeof(Dars::find()->where(['xona_id'=>$model->xona_id,'vaqt'=>$model->vaqt,'kun'=>$model->kun])->all()) && $dars->id!=$model->id){
                Yii::$app->session->setFlash('error', 'Bu paytda bu xonada dars bor');
                return $this->render('update', [
                    'model' => $model,
//                    'fan'=>$fan,
//                    'uqtuvchi'=>$uqtuvchi,
//                    'guruh'=>$guruh
                ]);
            }
            else if(sizeof(Dars::find()->where(['uqtuvchi_id'=>$model->uqtuvchi_id,'vaqt'=>$model->vaqt,'kun'=>$model->kun])->all()) && $dars2->id!=$model->id){
                Yii::$app->session->setFlash('error', 'Bu paytda bu O\'qituvchining darsi bor');
                return $this->render('update', [
                    'model' => $model,
//                    'fan'=>$fan,
//                    'uqtuvchi'=>$uqtuvchi,
//                    'guruh'=>$guruh
                ]);
            }
            else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dars::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
