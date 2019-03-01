<?php

//$this->registerJsFile('/js/jq.js');
$this->registerJsFile('/js/common.js');
//$this->registerJsFile('/js/impact/content.js');
//$this->registerJsFile('/js/custom.js');
//$this->params['goals'] = true;
$year = Yii::$app->request->get('year');
$this->title = "Impact | " . $year;
?>


<div class="main-content">
    <section class="nav-tab">
        <div class="container">
            <?= $this->render('/common/header', [
                'year' => $year,
                'active' => [
                    'annual' => true
                ]
            ]) ?>
        </div>
    </section>
    <section class="gray-bg common-block">
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'form']); ?>
        <div class="container">
            <div class="table-title flex"><img src="/html/assets/images/icons/team-members-feedback.png">Impact
                | <?= $user['first_name'] . ' ' . $user['last_name'] ?> | <?= $year ?></div>
            <?php if (!empty($impacts)): ?>
                <?php foreach ($impacts as $k => $impact): ++$k ?>
                    <div class="common-list">
                        <div class="common-title"><?= $impact['title'] ?></div>
                        <div class="flex">
                            <div class="common-item">
                                <label>Employee comments</label>
                                <input type="hidden"
                                       name="comments[<?= $k ?>][id]"
                                       value="<?= $impact['user_imp_id'] ?>">
                                <textarea readonly><?= $impact['user_comment'] ?></textarea>
                            </div>
                            <div class=" common-item">
                                <label>Manager’s comments</label>
                                <textarea placeholder="Comment"
                                          name="comments[<?= $k ?>][manager_comment]"><?= $impact['manager_comment'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($development_state['status'])): ?>
            <div align="center" class="save-submit">
                <button type="submit" class="long-btn"> Save changes</button>
            </div>
        <?php endif; ?>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </section>
</div>
<script>
    var _Year = '<?=$year?>'
</script>