<h2>Dear <?= $user->first_name . ' ' . $user->last_name ?>,</h2>

<p>You are invited to attend a conversation session with your coach. Please mark accordingly in your calendar.</p>

<p> Please click on the attachment to to add the coaching session to your Outlook calendar.</p>

<a href="<?= \Yii::$app->params['domain'] ?>/conversations/<?= $year ?>">Coaching sessions</a>

<p>If you have any technical issues with the system please contact <?= \Yii::$app->params['supportEmail'] ?>.</p>

<p>Kind regards,</p>

<p>myPerformance</p>
