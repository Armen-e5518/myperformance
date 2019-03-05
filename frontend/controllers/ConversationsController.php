<?php

namespace frontend\controllers;

use backend\components\Helper;
use backend\models\User;
use common\models\Conversations;
use common\models\GoalsFeedback;
use common\models\ImpactFeedback;
use common\models\Years;
use frontend\components\Calendar;
use frontend\components\Mail;
use Yii;
use common\models\BehavioralFeedback;
use common\models\search\BehavioralFeedbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BehavioralFeedbackController implements the CRUD actions for BehavioralFeedback model.
 */
class ConversationsController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
     * Lists all BehavioralFeedback models.
     * @return mixed
     */
    public function actionIndex($year)
    {
        $id = Yii::$app->request->get('id');
        $model = $id ? Conversations::findOne(Yii::$app->request->get('id')) : new Conversations();
        if (Yii::$app->request->isPost) {
            $model->attachment_f = UploadedFile::getInstance($model, 'attachment_f');
            $u = $model->updateAttach();
            if (!empty($u)) {
                $model->attachment = $u;
            }
            $model->year = Years::GetYearIdByYear($year);
        }

        if (Yii::$app->request->post() && $model->load(Yii::$app->request->post()) && $model->save()) {
            if ($id) {
                Mail::SessionUpdated($model, $year);
            }else{
                Calendar::CreateFile($model->date);
                Mail::NewSession($model, $year);
            }
            return $this->redirect(['conversations/' . $year]);
        }
        return $this->render('index', [
            'year' => $year,
            'id' => $id,
            'model' => $model,
            'users' => User::GetUsersWhichManagerI(),
            'received' => Conversations::GetReceivedConversations($year),
            'provided' => Conversations::GetProvidedConversations($year),
        ]);

    }

    public function actionDelete($id)
    {
        $model = Conversations::findOne($id);
        if ($model->manager_id == Yii::$app->user->getId()) {
            if ($model->status > 1) {
                $model->status = Conversations::STATUS_ALL_DELETED;
            } else {
                $model->status = Conversations::STATUS_DELETED_MANAGER;
            }
        } else {
            if ($model->status > 1) {
                $model->status = Conversations::STATUS_ALL_DELETED;
            } else {
                $model->status = Conversations::STATUS_DELETED_USER;
            }
        }
//        Helper::DDD($model);
//        die;
        $model->save();
        Yii::$app->session->setFlash('success', "Deleted...", true);
        return $this->redirect(['index']);
    }

}
