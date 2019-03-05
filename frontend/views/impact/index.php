<?php

//$this->registerJsFile('/js/jq.js');
$this->registerJsFile('/js/common.js');
//$this->registerJsFile('/js/impact/content.js');
//$this->registerJsFile('/js/custom.js');
//$this->params['goals'] = true;
$year = Yii::$app->request->get('year');
$this->title = "Impact | " . $year;
$readonly = empty($development_state['status']) ? '' : 'readonly';
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
                | <?= \backend\models\User::GetCurrentUserName() ?>| <?= $year ?></div>
            <?php if (!empty($impacts)): ?>
                <?php foreach ($impacts as $k => $impact): ++$k ?>
                    <div class="common-list">
                        <div class="common-title"><?= $impact['title'] ?></div>
                        <div class="flex">
                            <?php if (!empty($impact['description'])): ?>
                                <div class="common-item common-item-text">
                                    <?= $impact['description'] ?>
                                </div>
                            <?php endif; ?>
                            <div class="common-item">
                                <label>My comments</label>
                                <input type="hidden"
                                       name="comments[<?= $k ?>][impact_id]"
                                       value="<?= $impact['id'] ?>">
                                <input type="hidden"
                                       name="comments[<?= $k ?>][id]"
                                       value="<?= $impact['user_imp_id'] ?>">
                                <textarea placeholder="Comment" <?= $readonly ?>
                                          name="comments[<?= $k ?>][user_comment]"><?= $impact['user_comment'] ?></textarea>
                            </div>
                            <div class=" common-item">
                                <label>Manager’s comments</label>
                                <textarea readonly><?= $impact['manager_comment'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (empty($development_state['status'])): ?>
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