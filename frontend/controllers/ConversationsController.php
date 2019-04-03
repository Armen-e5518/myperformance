<?php

namespace frontend\controllers;

use backend\models\User;
use common\models\Conversations;
use common\models\Years;
use frontend\components\Calendar;
use frontend\components\Mail;
use kartik\mpdf\Pdf;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
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
            } else {
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

    public function actionPdf($year)
    {
        $this->layout = false;
        $content = $this->renderPartial('pdf-content', [
            'received' => Conversations::GetReceivedConversations($year),
            'provided' => Conversations::GetProvidedConversations($year),
            'year' => $year
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
