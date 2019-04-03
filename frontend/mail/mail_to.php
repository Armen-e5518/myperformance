<?php
/* @var $model frontend\models\MailTo */
?>

<p>
   <?=$model->body?>
</p>
<p>
    <a target="_blank" href="<?= \Yii::$app->params['domain'] . $model->href ?>">View report</a>
</p>
<p>Kind regards,</p>
<p>myPerformance </p>