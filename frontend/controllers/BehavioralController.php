<?php

namespace frontend\controllers;

use backend\models\User;
use common\models\Behavioral;
use common\models\UserBehavioral;
use common\models\UserDevelopmentState;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * BehavioralController implements the CRUD actions for Behavioral model.
 */
class BehavioralController extends Controller
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
   * @param $year
   * @return string
   */
  public function actionIndex($year)
  {
    $comments = Yii::$app->request->post('comments');
    if ($comments) {
      foreach ($comments as $comment) {
        if (!empty($comment['id'])) {
          $model = UserBehavioral::findOne($comment['id']);
          $model->user_comment = $comment['user_comment'];
          $model->save();
        } else {
          $model = new UserBehavioral();
          $model->user_id = Yii::$app->user->getId();
          $model->behavioral_id = $comment['behavioral_id'];
          $model->user_comment = $comment['user_comment'];
          $model->save();
        }
      }
      return $this->redirect(['annual/' . $year]);
    }
    return $this->render('index', [
      'year' => $year,
      'development_state' => UserDevelopmentState::findOne(['user_id' => Yii::$app->user->getId(), 'year' => $year]),
      'behavioral' => Behavioral::GetAllCurrentUserByYear($year)
    ]);
  }

  public function actionUser($year, $id)
  {
    $comments = Yii::$app->request->post('comments');
    if ($comments) {
      foreach ($comments as $comment) {
        if (!empty($comment['id'])) {
          $model = UserBehavioral::findOne($comment['id']);
          $model->manager_comment = $comment['manager_comment'];
          $model->manager_id = Yii::$app->user->getId();
          $model->save();
        }
      }
      return $this->redirect(['annual/' . $year]);
    }
    return $this->render('user-index', [
      'year' => $year,
      'user' => User::findOne($id),
      'development_state' => UserDevelopmentState::findOne(['user_id' => $id, 'year' => $year, 'manager_id' => Yii::$app->user->getId()]),
      'behavioral' => Behavioral::GetAllbyUserByYear($year, $id)
    ]);
  }
}
