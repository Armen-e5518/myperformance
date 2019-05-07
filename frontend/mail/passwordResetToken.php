<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

<h3>Dear <?= $user->first_name . ' ' . $user->last_name ?>,</h3>
<p>You have requested a password reset to access your account with the MyPerformance system, the platform.</p>
<p>Please click on the link below to reset your password (please be reminded that your username is in the format of
    name.lastname).</p>
<p><a href="<?= $resetLink ?>">LINK</a></p>
<p>If you have any technical issues with the system please contact </p>
<p><?= \Yii::$app->params['supportEmail'] ?>.</p>
<br>
<br>
<br>
<br>
<p>Thank you for your time!</p>
<p>Kind regards,</p>
<p>myPerformance</p>

