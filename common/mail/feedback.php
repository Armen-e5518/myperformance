<p>
    <?php
    echo $user->first_name . ' ' . $user->last_name . ' wants feedback from you'
    ?>
</p>


<a href="<?= \Yii::$app->params['domain'] ?>/feedback">Check here</a>