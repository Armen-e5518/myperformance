<h2>Dear <?= $user->first_name . ' ' . $user->last_name ?>,</h2>

<p>You are invited to attend a conversation session with your coach. Please mark accordingly in your calendar.

    Please click on the link below to add the coaching session to your Outlook calendar.</p>

<a href="<?= \Yii::$app->params['domain'] ?>/conversations/<?= $year ?>">LINK</a>

<p>If you have any technical issues with the system please contact <?= \Yii::$app->params['supportEmail'] ?>.</p>

<p>Kind regards,</p>

<p>myPerformance</p>
