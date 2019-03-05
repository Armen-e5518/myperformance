<?php

//$this->registerJsFile('/js/jq.js');
$this->registerJsFile('/js/common.js');
//$this->registerJsFile('/js/behavioral/content.js');
//$this->registerJsFile('/js/custom.js');

$this->params['goals'] = true;

$this->title = "Behavioral | " . $year;

$readonly = !empty($development_state['status']) && $development_state['status'] == \common\models\UserDevelopmentState::STATUS_SUBMIT ? '' : 'readonly';
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
            <div class="table-title flex"><img src="/html/assets/images/icons/team-members-feedback.png">Behavioral
                competencies | <?= $user['first_name'] . ' ' . $user['last_name'] ?> | <?= $year ?></div>
            <?php if (!empty($behavioral)): ?>
                <?php foreach ($behavioral as $k => $beh): ++$k ?>
                    <div class="common-list">
                        <div class="common-title"> <?= $beh['title'] ?> - <span> <?= $beh['sub_title'] ?>  </span></div>
                        <div class="flex">
                            <div class="common-item common-item-text">
                                <label>Behaviours:</label>
                                <p> <?= $beh['description'] ?></p>
                            </div>
                            <div class="common-item">
                                <label>Employee comments</label>
                                <input type="hidden" name="comments[<?= $k ?>][id]" value="<?= $beh['user_beh_id'] ?>">
                                <textarea readonly><?= $beh['user_comment'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Manager’s comments</label>
                                <textarea placeholder="Comment" <?= $readonly ?>
                                          name="comments[<?= $k ?>][manager_comment]"><?= $beh['manager_comment'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($development_state['status']) && $readonly == ''): ?>
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