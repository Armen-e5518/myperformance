<?php

namespace frontend\controllers;

use backend\components\Helper;
use backend\models\User;
use common\models\Development;
use common\models\ManagerDevelopment;
use common\models\UserBehavioral;
use common\models\UserDevelopment;
use common\models\UserDevelopmentState;
use common\models\Years;
use frontend\components\Check;
use frontend\components\Mail;
use Yii;
use common\models\Behavioral;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * BehavioralController implements the CRUD actions for Behavioral model.
 */
class DevelopmentController extends Controller
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
        $user_id = Yii::$app->user->getId();
        $comments = Yii::$app->request->post('comments');
        if ($comments) {
            foreach ($comments as $comment) {
                if (!empty($comment['id'])) {
                    $model = UserDevelopment::findOne($comment['id']);
                    $model->user_comment = $comment['user_comment'];
                    $model->save();
                } else {
                    $model = new UserDevelopment();
                    $model->user_id = $user_id;
                    $model->development_id = $comment['development_id'];
                    $model->user_comment = $comment['user_comment'];
                    $model->year = Years::GetYearIdByYear($year);
                    $model->save();
                }
            }
            return $this->redirect(['annual/' . $year]);
        }
        return $this->render('index', [
            'year' => $year,
            'development_state' => UserDevelopmentState::findOne(['user_id' => $user_id, 'year' => $year]),
            'developments' => Development::GetAllByUserIdByYear($year, $user_id),
            'manager' => ManagerDevelopment::GetOneByUserIdByManagerId($user_id, Yii::$app->user->identity->manager_id, $year)
        ]);
    }

    public function actionUser($year, $id)
    {
        $comment = Yii::$app->request->post('comment');
        if ($comment) {
            if (!empty($comment['id'])) {
                $model = ManagerDevelopment::findOne($comment['id']);
                $model->manager_comment = $comment['manager_comment'];
                if($model->save()){
                    Helper::DDD($model->getErrors());
                };
            } else {
                $model = new ManagerDevelopment();
                $model->user_id = $id;
                $model->year = Years::GetYearIdByYear($year);
                $model->manager_id = Yii::$app->user->getId();
                $model->manager_comment = $comment['manager_comment'];
                $model->save();
            }
            return $this->redirect(['annual/' . $year]);
        }
        return $this->render('user-index', [
            'year' => $year,
            'user' => User::findOne($id),
            'developments' => Development::GetAllByUserIdByYear($year, $id),
            'development_state' => UserDevelopmentState::findOne(['user_id' => $id, 'year' => $year, 'manager_id' => Yii::$app->user->getId()]),
            'manager' => ManagerDevelopment::GetOneByUserIdByManagerId($id, Yii::$app->user->getId(), $year)
        ]);
    }

    public function actionSubmit($year)
    {
        if (Check::IsNotEmpty($year) && UserDevelopmentState::Submit(Yii::$app->user->getId(), $year)) {
            Yii::$app->session->setFlash('success', 'Submitted!');
            Mail::SubmitUser();
            return $this->redirect(['/development/' . $year]);
        } else {
            Yii::$app->session->setFlash('error', 'Please complete all previous steps to submit your final annual report.');
            return $this->redirect(['/development/' . $year]);
        }
    }

    public function actionSubmitManager($year, $id)
    {
        if (Check::IsNotEmptyManager($year, $id) && UserDevelopmentState::SubmitManager($id, $year)) {
            Yii::$app->session->setFlash('success', 'Submitted!');
            Mail::SubmitManager($id);
            return $this->redirect(['/user-development/' . $year . '/' . $id]);
        } else {
            Yii::$app->session->setFlash('error', 'Please complete all previous steps to submit your final annual report.');
            return $this->redirect(['/user-development/' . $year . '/' . $id]);
        }
    }
}
