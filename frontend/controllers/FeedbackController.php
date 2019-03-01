<?php

namespace frontend\controllers;

use backend\components\Helper;
use backend\models\User;
use common\models\Feedbacks;
use common\models\GoalsFeedback;
use common\models\ImpactFeedback;
use frontend\components\Mail;
use frontend\models\External;
use frontend\models\Internal;
use Yii;
use common\models\BehavioralFeedback;
use common\models\search\BehavioralFeedbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BehavioralFeedbackController implements the CRUD actions for BehavioralFeedback model.
 */
class FeedbackController extends Controller
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
//        Helper::DDD(User::GetUsersWhichManagerMyByDepartment());
//        die;
        $internal_model = new Internal();
        $model = new Feedbacks();
        if ($internal_model->load(Yii::$app->request->post()) && $internal_model->validate()) {
            if ($model->load(Yii::$app->request->post(), 'Internal')) {
                $model->saveNewInternal($year);
                Mail::SandFeedbackEmailInternal($model, Yii::$app->user->getId(), $year);
                return $this->redirect(['/feedback', 'year' => $year]);
            }
        }
        $External_model = new External();
        if ($External_model->load(Yii::$app->request->post()) && $External_model->validate()) {
            if ($model->load(Yii::$app->request->post(), 'External')) {
                if ($model->saveNewExternal($year)) {
                    Mail::SandFeedbackEmailExternal($model, Yii::$app->user->getId(), $year);
                    return $this->redirect(['/feedback', 'year' => $year]);
                };
            }
        }

        return $this->render('index', [
            'year' => $year,
            'internal_model' => $internal_model,
            'External_model' => $External_model,
            'users' => User::GetAllUsersNotMe(),
            'feedback_provided' => Feedbacks::GetProvided(Yii::$app->user->getId(), $year),
            'feedback_received' => Feedbacks::GetReceived(Yii::$app->user->getId(), $year),
            'team' => User::GetUsersWhichManagerMyByDepartment($year)
        ]);
    }

    public function actionProvideFeedback($year)
    {
        $model = new Feedbacks();
        if ($model->load(Yii::$app->request->post()) && $model->saveProvide($year)) {
            return $this->redirect(['/feedback', 'year' => $year]);
        }
        return $this->render('provide-feedback', [
            'year' => $year,
            'model' => $model,
            'users' => User::GetAllUsersNotMe(),
        ]);
    }

    public function actionGiveFeedback($year, $id)
    {
        $model = Feedbacks::findOne($id);
        if ($model->user_id != Yii::$app->user->getId()) {
            return $this->redirect(['/feedback', 'year' => $year]);
        }
        if ($model->load(Yii::$app->request->post()) && $model->GaveFeedback()) {
            return $this->redirect(['/feedback', 'year' => $year]);
        }
        return $this->render('give-feedback', [
            'year' => $year,
            'model' => $model,
            'users' => User::GetAllUsersIndex(),
        ]);
    }

    public function actionViewFeedback($year, $id)
    {
        $model = Feedbacks::findOne($id);
        return $this->render('view-feedback', [
            'year' => $year,
            'model' => $model,
            'users' => User::GetAllUsersIndex(),
        ]);
    }
}
