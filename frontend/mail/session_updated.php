<h3>Dear <?= $user->first_name . ' ' . $user->last_name ?>, </h3>
<p>Your manager has added notes following your recent conversation session. Please login with your account to view the
    notes.</p>
<p><a href="<?= \Yii::$app->params['domain'] ?>/conversations/<?= $year ?>">Coaching sessions</a></p>
<p>If you have any technical issues with the system please contact <?= \Yii::$app->params['supportEmail'] ?>.</p>
<p>Kind regards,</p>
<p>myPerformance </p>