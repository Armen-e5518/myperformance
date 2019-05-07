<h3> Dear <?= $manager->first_name . ' ' . $manager->last_name ?>,</h3>
<p><?= $user->first_name . ' ' . $user->last_name ?> has completed input of the information for the annual
   appraisal. </p>
<p>You can now proceed with your comments. Your feedback will help recognize strengths and develop further.</p>
<p>Please login into your account and be reminded to click “Submit”, when you have fully completed your inputs.</p>
<p>
   <a href="<?= \Yii::$app->params['domain'] ?>/annual/<?= $year ?>"> MyPerformance account</a>
</p>
<p>If you have any technical issues with the system please contact </p>
<p> <?= \Yii::$app->params['supportEmail'] ?></p>
<br>
<br>
<br>
<br>
<p>Thank you for your time!</p>
<p>Kind regards,</p>
<p>myPerformance </p>
