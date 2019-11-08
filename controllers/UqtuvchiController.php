<?php

namespace app\controllers;

use Yii;
use app\models\Uqtuvchi;
use app\models\UqtuvchiSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UqtuvchiController implements the CRUD actions for Uqtuvchi model.
 */
class UqtuvchiController extends Controller
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
     * Lists all Uqtuvchi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UqtuvchiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model=Uqtuvchi::find()->all();
        return $this->redirect(Yii::$app->homeUrl);

    }

    /**
     * Displays a single Uqtuvchi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);

        return $this->render(Yii::$app->homeUrl.'site/jadval', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Uqtuvchi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Uqtuvchi();

        if ($model->load(Yii::$app->request->post()) ) {
            $date = date('Y-m-d-h i s');
            if($model->image = UploadedFile::getInstance($model,'image')){
                $model->image->saveAs(Yii::$app->basePath.'/web/image/'.$date.'.'.$model->image->extension);
                $model->image = $date.'.'.$model->image->extension;
            }
            else{
                $model->image='definationDefault.jpg';
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Uqtuvchi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $date = date('Y-m-d-h-i-s');
            if($model->image = UploadedFile::getInstance($model,'image')){
                $model->image->saveAs(Yii::$app->basePath.'/web/image/'.$date.'.'.$model->image->extension);
                $model->image = $date.'.'.$model->image->extension;
            }else{
                $model->image = $old;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Uqtuvchi model.
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
     * Finds the Uqtuvchi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uqtuvchi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Uqtuvchi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
