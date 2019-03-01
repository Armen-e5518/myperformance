<?php
$this->registerJsFile('/js/common.js');
$this->registerJsFile('/js/goals/content.js');
$this->params['goals'] = true;
$year = Yii::$app->request->get('year');
$this->title = "Goals | " . $year;
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
            <div class="table-title flex"><img src="/html/assets/images/icons/user-icon.png">
                Goals | <?= $user['first_name'] . ' ' . $user['last_name'] . ' | ' . $year ?>
            </div>
            <?php if (!empty($goals)): ?>
                <?php foreach ($goals as $k => $goal): ++$k ?>
                    <div class="common-list">
                        <div class="common-title"> Goal <?= $k ?></div>
                        <div class="flex">
                            <div class="common-item">
                                <label>Goal description</label>
                                <textarea readonly><?= $goal['description'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Timeframe</label>
                                <textarea readonly><?= $goal['timeframe'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Measure of success</label>
                                <textarea readonly><?= $goal['measure_success'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Support needed</label>
                                <textarea readonly><?= $goal['support_needed'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Employee comments</label>
                                <textarea readonly><?= $goal['my_comment'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Manager’s comments</label>
                                <input type="hidden" name="comments[<?= $k ?>][id]" value="<?= $goal['id'] ?>">
                                <textarea placeholder="Comments"
                                          name="comments[<?= $k ?>][manager_comment]"><?= $goal['manager_comments'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="common-list">
                    <div class="common-title"> Goal 1</div>
                    <div class="flex">
                        <div class="common-item">
                            <label>Goal description</label>
                            <textarea readonly
                                      name="description"></textarea>
                        </div>
                        <div class="common-item">
                            <label>Timeframe</label>
                            <textarea readonly
                                      name="timeframe"></textarea>
                        </div>
                        <div class="common-item">
                            <label>Measure of success</label>
                            <textarea readonly
                                      name="measure_success"></textarea>
                        </div>
                        <div class="common-item">
                            <label>Support needed</label>
                            <textarea readonly
                                      name="support_needed"></textarea>
                        </div>
                        <div class="common-item">
                            <label>My comments</label>
                            <textarea readonly
                                      name="my_comment"></textarea>
                        </div>
                        <div class="common-item">
                            <label>Manager’s comments</label>
                            <textarea readonly
                                      name="manager_comments"></textarea>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (!empty($development_state['status'])): ?>
            <?php if (!empty($goals)): ?>
                <div align="center" class="save-submit">
                    <button title="submit" form="form" class="long-btn"> Save changes</button>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </section>
    <section class="main-bottom gray-bg">
        <div class="container flex">
            <a class="purple-bg" target="_blank" href="/Smart_handout.pdf">
                <span><img src="/html/assets/images/icons/smart-goals.png"></span>
                <h2>SMART objectives</h2>
                <p>Read the guideline to help you shape up objectives for this year.</p>
            </a>
            <a class="green-bg " href="#">
                <span><img src="/html/assets/images/icons/user-guidelines.png"></span>
                <h2>User guidelines</h2>
                <p>Learn how to use all features of MyPerformance system. </p>
            </a>
        </div>
    </section>
</div>

<script>
    var _Year = '<?=$year?>'
</script>


