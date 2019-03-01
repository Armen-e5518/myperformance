<?php

namespace frontend\controllers;

use backend\models\User;
use common\models\UserDevelopmentState;
use common\models\UserImpact;
use Yii;
use common\models\Impact;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ImpactController implements the CRUD actions for Impact model.
 */
class ImpactController extends Controller
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


    public function actionIndex($year)
    {
        $comments = Yii::$app->request->post('comments');
        if ($comments) {
            foreach ($comments as $comment) {
                if (!empty($comment['id'])) {
                    $model = UserImpact::findOne($comment['id']);
                    $model->user_comment = $comment['user_comment'];
                    $model->save();
                } else {
                    $model = new UserImpact();
                    $model->user_id = Yii::$app->user->getId();
                    $model->impact_id = $comment['impact_id'];
                    $model->user_comment = $comment['user_comment'];
                    $model->save();
                }
            }
            return $this->redirect(['annual/' . $year]);
        }
        return $this->render('index', [
            'year' => $year,
            'development_state' => UserDevelopmentState::findOne(['user_id' => Yii::$app->user->getId(), 'year' => $year]),
            'impacts' => Impact::GetAllCurrentUserByYear($year)
        ]);
    }

    public function actionUser($year, $id)
    {
        $comments = Yii::$app->request->post('comments');
        if ($comments) {
            foreach ($comments as $comment) {
                if (!empty($comment['id'])) {
                    $model = UserImpact::findOne($comment['id']);
                    $model->manager_comment = $comment['manager_comment'];
                    $model->save();
                }
            }
            return $this->redirect(['annual/' . $year]);
        }
        return $this->render('user-index', [
            'year' => $year,
            'development_state' => UserDevelopmentState::findOne(['user_id' => $id, 'year' => $year, 'manager_id' => Yii::$app->user->getId()]),
            'impacts' => Impact::GetAllByUserIdByYear($year, $id),
            'user' => User::findOne($id),
        ]);
    }

}
