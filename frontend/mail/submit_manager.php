<h3> Dear <?= $user->first_name . ' ' . $user->last_name ?>,</h3>
<p><?= $manager->first_name . ' ' . $manager->last_name ?> has completed input of the information for your annual
   appraisal. Please login with your account
   to view your manager’s feedback.</p>
<p>
   <a href="<?= \Yii::$app->params['domain'] ?>/annual/<?= $year ?>"> MyPerformance account</a>
</p>
<p>If you have any technical issues with the system please contact </p>
<p><?= \Yii::$app->params['supportEmail'] ?>.</p>
<br>
<br>
<br>
<br>
<p>Thank you for your time!</p>
<p>Kind regards,</p>
<p>myPerformance</p>
