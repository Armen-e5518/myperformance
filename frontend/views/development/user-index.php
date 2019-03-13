<?php

//$this->registerJsFile('/js/jq.js');
$this->registerJsFile('/js/common.js');
//$this->registerJsFile('/js/behavioral/content.js');
//$this->registerJsFile('/js/custom.js');

$this->params['goals'] = true;

$this->title = "Development | " . $year;

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
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Saved!</h4>
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Error!</h4>
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
            <div class="table-title flex"><img src="/html/assets/images/icons/team-members-feedback.png">Personal
                development plan | assessment | <?= $user['first_name'] . ' ' . $user['last_name'] ?> | <?= $year ?>
            </div>
            <div class="short-desc">
                Review your past performance to identify your strengths and areas for development. Think about feedback
                you have received regarding
                your performance and abilities. Consider what knowledge, skills, behaviours, and abilities you have
                excelled or struggled with in your career.
                Identifying your strengths and areas for development will help you prioritise your development interests
                and determine your career goals and
                development plan.
            </div>
            <?php if (!empty($developments)): ?>
                <?php foreach ($developments as $k => $development): ++$k ?>
                    <div class="common-list">
                        <div class="common-title"><?= $development['title'] ?></div>
                        <div class="flex">
                            <div class="common-item">
                                <ul><?= $development['description'] ?></ul>
                            </div>
                            <div class="common-item">
                                <textarea
                                        readonly><?= $development['user_comment'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="common-list">
                <div class="common-title">Manager’s comments</div>
                <div class="flex">
                    <div class="common-item">
                        <input type="hidden" name="comment[id]" value="<?= $manager['id'] ?>">
                        <textarea placeholder="Comment" <?= $readonly ?>
                                  name="comment[manager_comment]"><?= $manager['manager_comment'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($development_state['status']) && $readonly == ''): ?>
            <div align="center" class="save-submit">
                <button type="submit" class="long-btn"> Save changes</button>
                <a href="/development/submit-manager?year=<?= $year ?>&id=<?= $user['id'] ?>"
                   class="long-btn">Submit</a>
            </div>
        <?php endif; ?>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </section>
</div>

<script>
    var _Year = '<?=$year?>'
</script>
