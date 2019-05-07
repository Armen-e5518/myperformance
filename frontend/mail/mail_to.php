<?php
/* @var $model frontend\models\MailTo */
?>

<p>
   <?=$model->body?>
</p>
<p>
    <a target="_blank" href="<?= \Yii::$app->params['domain'] . $model->href ?>">View report</a>
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