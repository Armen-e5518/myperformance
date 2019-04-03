<?php
/**
 * Created by PhpStorm.
 * User: Armen
 * Date: 11/20/17
 * Time: 12:00 PM
 */

namespace frontend\components;


use backend\models\User;
use yii\base\Component;

/**
 * Class CheckRules
 * @package frontend\components
 */
class Mail extends Component
{

    public static function SandFeedbackEmail($model, $user_id, $year)
    {
        if (!empty($user_id)) {
            $user = User::GetUserById($user_id);
            \Yii::$app->mailer
                ->compose([
                    'html' => 'feedback',
                    'text' => 'feedback'
                ], [
                    'user' => $user,
                    'model' => $model,
                    'year' => $year
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
                ->setTo($model->user_email)
                ->setSubject($user->first_name . ' ' . $user->last_name . ' wants feedback from you')
                ->send();

        }
        return true;
    }

    public static function SandFeedbackEmailExternal($model, $user_id, $year)
    {
        if (!empty($user_id)) {
            $user = User::GetUserById($user_id);
            \Yii::$app->mailer
                ->compose([
                    'html' => 'feedback',
                    'text' => 'feedback'
                ], [
                    'user' => $user,
                    'model' => $model,
                    'year' => $year
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
                ->setTo($model->user_email)
                ->setSubject($user->first_name . ' ' . $user->last_name . ' wants feedback from you')
                ->send();

        }
        return true;
    }

    public static function SandFeedbackEmailInternal($model, $user_id, $year)
    {
        if (!empty($user_id)) {
            $user = User::GetUserById($user_id);
            $user_how = User::GetUserById($model->user_id);
            return \Yii::$app->mailer
                ->compose([
                    'html' => 'feedback_internal',
                    'text' => 'feedback_internal'
                ], [
                    'user' => $user,
                    'user_how' => $user_how,
                    'model' => $model,
                    'year' => $year
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
                ->setTo($user_how->email)
                ->setSubject($user->first_name . ' ' . $user->last_name . ' wants feedback from you')
                ->send();

        }
        return true;
    }

    public static function NewSession($model, $year)
    {
        $user = User::GetUserById($model->user_id);
        return \Yii::$app->mailer
            ->compose([
                'html' => 'session',
                'text' => 'session'
            ], [
                'user' => $user,
                'year' => $year,
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
            ->setTo($user->email)
            ->attach(\Yii::getAlias('@frontend') . '/web/attach/session.ics')
            ->setSubject('New Session')
            ->send();
    }

    public static function SessionUpdated($model, $year)
    {
        $user = User::GetUserById($model->user_id);
        $manager = User::GetUserById(\Yii::$app->user->getId());
        return \Yii::$app->mailer
            ->compose([
                'html' => 'session_updated',
                'text' => 'session_updated'
            ], [
                'user' => $user,
                'year' => $year,
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
            ->setTo($user->email)
            ->setSubject($manager->first_name . ' ' . $manager->last_name . ' has added notes to the Coaching session ')
            ->send();
    }

    public static function SandFeedbackAcceptEmail($user_id)
    {
        if (!empty($user_id)) {
            $user = User::GetUserById($user_id);
            $manager = User::GetUserById(\Yii::$app->user->getId());
            \Yii::$app->mailer
                ->compose([
                    'html' => 'feedback_accept',
                    'text' => 'feedback_accept'
                ], [
                    'user' => $manager,
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
                ->setTo($user->email)
                ->setSubject($manager->first_name . ' ' . $manager->last_name . '  gave you a feedback')
                ->send();

        }
        return true;
    }

    public static function SandNewGoal($goal)
    {
        $user = User::GetUserById(\Yii::$app->user->getId());
        $manager = User::GetUserById(\Yii::$app->user->identity->manager_id);
        return \Yii::$app->mailer
            ->compose([
                'html' => 'new_goal',
                'text' => 'new_goal'
            ], [
                'user' => $user,
                'goal' => $goal,
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
            ->setTo($manager->email)
            ->setSubject($user->first_name . ' ' . $user->last_name . '  gave you a feedback')
            ->send();


    }

    public static function SandMail($email = null, $title = '', $text = '')
    {
        return \Yii::$app
            ->mailer
            ->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT Pipeline'])
            ->setTo($email)
            ->setSubject($title)
            ->setTextBody($text)
            ->send();
    }

    public static function SubmitUser()
    {
        $user = User::GetUserById(\Yii::$app->user->getId());
        $manager = User::GetUserById(\Yii::$app->user->identity->manager_id);

        return \Yii::$app->mailer
            ->compose([
                'html' => 'submit_user',
                'text' => 'submit_user'
            ], [
                'manager' => $manager,
                'user' => $user,
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
            ->setTo($manager->email)
            ->setSubject($user->first_name . ' ' . $user->last_name . '  has completed the annual appraisal')
            ->send();
    }

    public static function SubmitManager($id)
    {
        $manager = User::GetUserById(\Yii::$app->user->getId());
        $user = User::GetUserById($id);

        return \Yii::$app->mailer
            ->compose([
                'html' => 'submit_manager',
                'text' => 'submit_manager'
            ], [
                'manager' => $manager,
                'user' => $user,
            ])
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
            ->setTo($user->email)
            ->setSubject($manager->first_name . ' ' . $manager->last_name . '  has completed the annual appraisal')
            ->send();
    }

    public static function SandMailTo($model)
    {
        return \Yii::$app->mailer
            ->compose(
                [
                    'html' => 'mail_to',
                    'text' => 'submit_manager'
                ],
                [
                    'model' => $model,
                ])
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT myPerformance'])
            ->setTo($model->email)
            ->setSubject($model->subject)
            ->send();
    }
}