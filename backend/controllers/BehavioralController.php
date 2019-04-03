<?php

namespace backend\controllers;

use common\models\Behavioral;
use common\models\search\BehavioralSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * BehavioralController implements the CRUD actions for Behavioral model.
 */
class BehavioralController extends Controller
{
   public function behaviors()
   {
      return [
         'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
               'delete' => ['POST'],
            ],
         ],
         'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => [],
            'rules' => [
               // allow authenticated users
               [
                  'allow' => true,
                  'roles' => ['@'],
               ],
               // everything else is denied
            ],
         ],
      ];
   }

    /**
     * Lists all Behavioral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BehavioralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
         'searchModel' => $searchModel,
         'dataProvider' => $dataProvider,
      ]);
   }

   /**
    * Displays a single Behavioral model.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionView($id)
   {
      return $this->render('view', [
         'model' => $this->findModel($id),
      ]);
   }

   /**
    * Creates a new Behavioral model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
   public function actionCreate()
   {
      $model = new Behavioral();
      if (Yii::$app->request->isPost) {
         $model->icon_f = UploadedFile::getInstance($model, 'icon_f');
         $u = $model->uploadIcon();
         if (!empty($u)) {
            $model->icon = $u;
         }
      }
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         return $this->redirect(['index']);
      }
      return $this->render('create', [
         'model' => $model,
      ]);
   }

   /**
    * Updates an existing Behavioral model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionUpdate($id)
   {
      $model = $this->findModel($id);
      if (Yii::$app->request->isPost) {
         $model->icon_f = UploadedFile::getInstance($model, 'icon_f');
         $u = $model->uploadIcon();
         if (!empty($u)) {
            $model->icon = $u;
         }
      }
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         return $this->redirect(['index']);
      }

      return $this->render('update', [
         'model' => $model,
      ]);
   }

   /**
    * Deletes an existing Behavioral model.
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
    * Finds the Behavioral model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Behavioral the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
   protected function findModel($id)
   {
      if (($model = Behavioral::findOne($id)) !== null) {
         return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
   }
}
