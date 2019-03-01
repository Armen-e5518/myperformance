<?php

namespace frontend\controllers;

use backend\components\Helper;
use backend\models\User;
use common\models\GoalsFeedback;
use common\models\UserDevelopmentState;
use common\models\Years;
use Yii;
use common\models\Goals;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * GoalsController implements the CRUD actions for Goals model.
 */
class GoalsController extends Controller
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
//                    'delete' => ['POST'],
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


    public function actionIndex($year)
    {
        if (Yii::$app->request->post() && Yii::$app->request->post('description')) {
            $model = new Goals();
            $model->load(Yii::$app->request->post(), '');
            $model->year = Years::GetYearIdByYear($year);
            $model->save();
        }
        $goals = Yii::$app->request->post('goals');
        if ($goals) {
            foreach ($goals as $goal) {
                if (!empty($goal['id'])) {
                    $model = Goals::findOne($goal['id']);
                    $model->load($goal, '');
                    $model->save();
                }
            }
            return $this->redirect(['annual/' . $year]);
        }
        return $this->render('index', [
            'goals' => Goals::GetAllByUserByYear($year),
            'development_state' => UserDevelopmentState::findOne(['user_id' => Yii::$app->user->getId(), 'year' => $year]),
            'year' => $year
        ]);
    }

    public function actionUser($year, $id)
    {
        $comments = Yii::$app->request->post('comments');
        if ($comments) {
            foreach ($comments as $comment) {
                if (!empty($comment['id'])) {
                    $model = Goals::findOne($comment['id']);
                    $model->manager_comments = $comment['manager_comment'];
                    $model->save();
                }
            }
            return $this->redirect(['annual/' . $year]);
        }
        return $this->render('user-index', [
            'goals' => Goals::GetAllByUserIdByYear($year, $id),
            'user' => User::findOne($id),
            'development_state' => UserDevelopmentState::findOne(['user_id' => $id, 'year' => $year, 'manager_id' => Yii::$app->user->getId()]),
            'year' => $year
        ]);
    }

    public function actionSubmit($year)
    {
        Goals::updateAll([
            'status' => Goals::STATUS_SUBMIT_USER,
        ], [
            'status' => Goals::STATUS_NEW,
            'user_id' => Yii::$app->user->getId(),
            'year' => Years::GetYearIdByYear($year)
        ]);
        return $this->redirect(['/goals/' . $year]);
    }


    public function actionDelete($id, $year)
    {
        Goals::findOne($id)->delete();
//        Yii::$app->session->setFlash('success', "Deleted...", true);
        return $this->redirect(['annual/' . $year]);
    }
}
