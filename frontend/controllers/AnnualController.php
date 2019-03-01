<?php

namespace frontend\controllers;

use common\models\GoalsFeedback;
use common\models\ImpactFeedback;
use frontend\components\Calendar;
use frontend\models\User;
use Yii;
use common\models\BehavioralFeedback;
use common\models\search\BehavioralFeedbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BehavioralFeedbackController implements the CRUD actions for BehavioralFeedback model.
 */
class AnnualController extends Controller
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
//        Calendar::CreateFile('');
//        die;

        return $this->render('index', [
            'year'=> $year,
            'my_users'=> User::GetMyUsers($year)
        ]);
    }

}
