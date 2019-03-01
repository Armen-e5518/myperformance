<?php

namespace frontend\controllers;


use common\models\Behavioral;
use common\models\BehavioralFeedback;
use common\models\Goals;
use common\models\GoalsFeedback;
use common\models\ImpactFeedback;
use common\models\User;
use common\models\UserBehavioral;
use common\models\UserImpact;
use common\models\Years;
use frontend\components\Mail;
use Yii;
use yii\web\Controller;
use \yii\web\Response;


/**
 * UserController implements the CRUD actions for User model.
 */
class AjaxController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    public function actionGetAllBehs()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_HTML;
            $post = Yii::$app->request->post();
            if (!empty($post['year'])) {
                $this->layout = false;
                return $this->render('behavioral', [
                    'year' => $post['year']
                ]);
            }

        }
    }

    public function actionGetAllImpacts()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_HTML;
            $post = Yii::$app->request->post();
            if (!empty($post['year'])) {
                $this->layout = false;
                return $this->render('impact', [
                    'year' => $post['year']
                ]);
            }
        }
    }

    public function actionSaveUserCommentByBehId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return UserBehavioral::SaveUserComment($post['id'], $post['comment']);
            }
        }
    }

    public function actionSaveUserCommentByImpactId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return UserImpact::SaveUserComment($post['id'], $post['comment']);
            }
        }
    }

    public function actionBehRequestFeedback()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return BehavioralFeedback::BehRequestFeedback($post['manager_id'], $post['beh_id']);
            }
        }
    }

    public function actionImpactRequestFeedback()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ImpactFeedback::BehRequestFeedback($post['manager_id'], $post['beh_id']);
            }
        }
    }

    public function actionGetObjectDataByTypeById()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {

                if ($post['type'] == 'goal') {
                    return Goals::getGoalByIdUserId($post['id'], $post['user_id']);
                } elseif ($post['type'] == 'behavioral') {
                    return UserBehavioral::GetBehavioralByUserId($post['id'], $post['user_id']);
                } elseif ($post['type'] == 'impact') {
                    return UserImpact::GetImpactByUserId($post['id'], $post['user_id']);
                }
            }
        }
    }

    public function actionSaveFeedback()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                Mail::SandFeedbackAcceptEmail($post['user_id']);
                if ($post['type'] == 'goal') {
                    return GoalsFeedback::SaveFeedback(
                        $post['user_id'],
                        $post['id'],
                        $post['comment'],
                        $post['status']
                    );
                } elseif ($post['type'] == 'behavioral') {
                    return BehavioralFeedback::SaveFeedback(
                        $post['user_id'],
                        $post['id'],
                        $post['comment'],
                        $post['status']
                    );
                } elseif ($post['type'] == 'impact') {
                    return ImpactFeedback::SaveFeedback(
                        $post['user_id'],
                        $post['id'],
                        $post['comment'],
                        $post['status']
                    );
                };
            }
        }
    }

    public function actionGetGoalsInputContent()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_HTML;
            $contentLength = Yii::$app->request->post('contentLength');
            $this->layout = false;
            if (!empty($contentLength)) {
                return $this->render('goals', [
                    'contentLength' => $contentLength
                ]);
            }
            return false;
        }
    }

    public function actionCreateGoal()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            $description = $post['description'];
            $userComment = $post['userComment'];
            if (!empty($description) || !empty($userComment)) {
                $model = new Goals();
                $model->user_id = Yii::$app->user->identity->getId();
                $model->description = $description;
                $model->user_comment = $userComment;
                $model->year = Years::GetYearIdByYear($post['year']);
                if ($model->save()) {
                    Mail::SandNewGoal($model);
                    return $model->id;
                };
            }
            return false;
        }
    }

    public function actionEditGoal()
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $goalsId = $post['goalsId'];
            $description = $post['description'];
            $userComment = $post['userComment'];
            $model = Goals::findOne($goalsId);
            $model->description = $description;
            $model->user_comment = $userComment;
            if ($model->save()) {
                return true;
            };
            return false;
        }
    }

    public function actionGoalRequestFeedback()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_HTML;
            $post = Yii::$app->request->post();
            $this->layout = false;
            if (!empty($post)) {
                $goalsFeedback = GoalsFeedback::goalRequestFeedback($post['manager_id'], $post['goal_id']);
                $manager = User::findOne($goalsFeedback->manager_id);
                if (!empty($goalsFeedback) && !empty($manager)) {
                    return $this->render('goal-comment', [
                        'goalsFeedback' => $goalsFeedback,
                        'manager' => $manager,
                    ]);
                }
            }
            return false;
        }
    }

}
