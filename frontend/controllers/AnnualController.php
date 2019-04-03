<?php

namespace frontend\controllers;

use common\models\Behavioral;
use common\models\Development;
use common\models\Goals;
use common\models\Impact;
use frontend\models\User;
use kartik\mpdf\Pdf;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
            'year' => $year,
            'my_users' => User::GetMyUsers($year)
        ]);
    }

    public function actionPdf($year)
    {
        $this->layout = false;
        $content = $this->renderPartial('pdf-content', [
            'year' => $year,
            'goals' => Goals::GetAllByUserByYear($year),
            'behavioral' => Behavioral::GetAllCurrentUserByYear($year),
            'impacts' => Impact::GetAllCurrentUserByYear($year),
            'developments' => Development::GetAllByUserIdByYear($year, Yii::$app->user->getId()),
        ]);
        $pdf = new Pdf([
// set to use core fonts only
            'mode' => Pdf::MODE_CORE,
// A4 paper format
            'format' => Pdf::FORMAT_A4,
// portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
// stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
// your html content input
            'content' => $content,
// format content from your own css file if needed or use the
//             enhanced bootstrap css built by Krajee for mPDF formatting
//            'cssFile' => '@web/css/pdf-css.css',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
//            'cssInline' => '.kv-heading-1{font-size:18px}',
// set mPDF properties on the fly
            'options' => ['title' => 'MyPerformance ' . date('YY-MM-DD')],
// call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['MyPerformance ' . date('Y-m-d')],
                'SetFooter' => ['MyPerformance | {PAGENO} |'],
            ]
        ]);
//        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'application/pdf');
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionUserPdf($year,$id)
    {
        $this->layout = false;
        $content = $this->renderPartial('pdf-user-content', [
            'year' => $year,
            'goals' => Goals::GetAllByUserIdByYear($year, $id),
            'behavioral' => Behavioral::GetAllbyUserByYear($year, $id),
            'impacts' => Impact::GetAllByUserIdByYear($year, $id),
            'developments' => Development::GetAllByUserIdByYear($year, $id),
        ]);
        $pdf = new Pdf([
// set to use core fonts only
            'mode' => Pdf::MODE_CORE,
// A4 paper format
            'format' => Pdf::FORMAT_A4,
// portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
// stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
// your html content input
            'content' => $content,
// format content from your own css file if needed or use the
//             enhanced bootstrap css built by Krajee for mPDF formatting
//            'cssFile' => '@web/css/pdf-css.css',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
//            'cssInline' => '.kv-heading-1{font-size:18px}',
// set mPDF properties on the fly
            'options' => ['title' => 'MyPerformance ' . date('YY-MM-DD')],
// call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['MyPerformance ' . date('Y-m-d')],
                'SetFooter' => ['MyPerformance | {PAGENO} |'],
            ]
        ]);
//        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'application/pdf');
        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
