<?php

namespace frontend\controllers;

use backend\components\Helper;
use backend\models\User;
use common\models\Feedbacks;
use common\models\GoalsFeedback;
use common\models\ImpactFeedback;
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
class OpenFeedbackController extends Controller
{

    public function actionIndex($year, $id)
    {
        $this->layout = 'open_main';
        $model = Feedbacks::findOne($id);
        if (!empty($model->status == Feedbacks::STATUS_RECEIVED)) {
            return $this->redirect(['/']);
        }
        if ($model->load(Yii::$app->request->post()) && $model->GaveFeedback()) {
            return $this->redirect(['/']);
        }
        return $this->render('give-feedback', [
            'year' => $year,
            'model' => $model,
            'users' => User::GetAllUsersIndex(),
        ]);
    }

}
