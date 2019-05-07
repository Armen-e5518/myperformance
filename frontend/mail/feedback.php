<h2> Dear <?= $model->user_name ?>, </h2>

<p><en> <?= $user->first_name . ' ' . $user->last_name ?> </en> would appreciate if you would provide feedback on your
    collaboration. Your feedback will help recognize strengths and develop further.

    Please click on the link below to provide feedback, which should take no longer than 10 minutes to complete. It
    would be great to have your feedback within one week of this request.</p>

<a href="<?= \Yii::$app->params['domain'] ?>/open-feedback/<?= $year . '/' . $model->id ?>">LINK</a>

<p>If you have any technical issues with the system please contact </p>
<p><?= \Yii::$app->params['supportEmail'] ?>.</p>
<br>
<br>
<br>
<br>
<p>Thank you for your time!</p>
<p>Kind regards,</p>
<p>myPerformance</p>