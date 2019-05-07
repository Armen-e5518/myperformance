<h3>Dear <?= $user->first_name . ' ' . $user->last_name ?>, </h3>
<p>Your manager has added notes following your recent conversation session. Please login with your account to view the
    notes.</p>
<p><a href="<?= \Yii::$app->params['domain'] ?>/conversations/<?= $year ?>">Coaching sessions</a></p>
<p>If you have any technical issues with the system please contact </p>
<p><?= \Yii::$app->params['supportEmail'] ?>.</p>
<br>
<br>
<br>
<br>
<p>Thank you for your time!</p>
<p>Kind regards,</p>
<p>myPerformance</p>