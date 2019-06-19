<?php

namespace frontend\controllers;


use backend\models\User;
use common\models\Feedbacks;
use frontend\components\Mail;
use frontend\models\External;
use frontend\models\Internal;
use frontend\models\MailTo;
use kartik\mpdf\Pdf;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
//                'only' => ['user-pdf'],
            'rules' => [
               [
                  'actions' => ['user-pdf', 'pdf'],
                  'allow' => true,
               ],
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
      $MailTo = new MailTo();
      if ($MailTo->load(Yii::$app->request->post()) && $MailTo->validate()) {
         if ($MailTo->load(Yii::$app->request->post(), 'MailTo')) {
            if (Mail::SandMailTo($MailTo)) {
               return $this->redirect(['/feedback', 'year' => $year]);
            };
         }
      }
      return $this->render('index', [
         'year' => $year,
         'internal_model' => $internal_model,
         'External_model' => $External_model,
         'MailTo' => $MailTo,
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

   public function actionPdf($year)
   {
      $this->layout = false;
      $feedbacks = Feedbacks::GetReceivedForReport(Yii::$app->user->getId(), $year);
      $content = $this->renderPartial('pdf-content', [
         'year' => $year,
         'feedbacks' => $feedbacks,
         'users' => User::GetAllUsersIndex(),
      ]);
      $pdf = new Pdf([
         'mode' => Pdf::MODE_CORE,
         'format' => Pdf::FORMAT_A4,
         'orientation' => Pdf::ORIENT_PORTRAIT,
         'destination' => Pdf::DEST_BROWSER,
         'content' => $content,
         'cssFile' => [
            '@frontend/web/css/pdf.css',
            '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
         ],
         'options' => ['title' => 'MyPerformance ' . date('YY-MM-DD')],
         'methods' => [
            'SetHeader' => [\frontend\models\User::getCurrentUserName() . ' ' . date('Y-m-d')],
            'SetFooter' => ['MyPerformance | {PAGENO} |'],
         ]
      ]);
      return $pdf->render();
   }

   public function actionUserPdf($year, $id)
   {
      $this->layout = false;
      $user_name = User::GetUserNameById($id);
      $feedbacks = Feedbacks::GetReceivedForReport($id, $year);
      $content = $this->renderPartial('pdf-content', [
         'year' => $year,
         'feedbacks' => $feedbacks,
         'users' => User::GetAllUsersIndex(),
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
         'cssFile' => [
            '@frontend/web/css/pdf.css',
            '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
         ],
         // any css to be embedded if required
//            'cssInline' => '.kv-heading-1{font-size:18px}',
// set mPDF properties on the fly
         'options' => ['title' => 'MyPerformance ' . date('YY-MM-DD')],
// call mPDF methods on the fly
         'methods' => [
            'SetTitle' => $user_name . ' | ' . $year,
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
