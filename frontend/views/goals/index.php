<?php
$this->registerJsFile('/js/common.js');
$this->registerJsFile('/js/goals/content.js');
$this->params['goals'] = true;
$year = Yii::$app->request->get('year');
$this->title = "Goals | " . $year;
$k = 0;
$class = 'hide';
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
            <div class="table-title flex"><img src="/html/assets/images/icons/user-icon.png"> My goals for <?= $year ?>
            </div>
            <?php if (!empty($goals)): ?>
                <?php foreach ($goals as $k => $goal): ++$k ?>
                    <div class="common-list">
                        <div class="common-title"> Goal <?= $k ?>
                            <?php if (empty($development_state['status'])): ?>
                                <a class="delete" title="Delete goal"
                                   href="/goals/delete?id=<?= $goal['id'] ?>&year=<?= $year ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="flex">

                            <div class="common-item">
                                <label>Goal description</label>
                                <input type="hidden" name="goals[<?= $k ?>][id]" value="<?= $goal['id'] ?>">
                                <textarea <?=$readonly?> name="goals[<?= $k ?>][description]"><?= $goal['description'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Timeframe</label>
                                <textarea <?=$readonly?> name="goals[<?= $k ?>][timeframe]"><?= $goal['timeframe'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Measure of success</label>
                                <textarea <?=$readonly?>
                                        name="goals[<?= $k ?>][measure_success]"><?= $goal['measure_success'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Support needed</label>
                                <textarea <?=$readonly?>
                                        name="goals[<?= $k ?>][support_needed]"><?= $goal['support_needed'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>My comments</label>
                                <textarea <?=$readonly?> name="goals[<?= $k ?>][my_comment]"><?= $goal['my_comment'] ?></textarea>
                            </div>
                            <div class="common-item">
                                <label>Manager’s comments</label>
                                <textarea readonly><?= $goal['manager_comments'] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: $class = ''; ?>
            <?php endif; ?>

            <div class="common-list <?= $class ?>">
                <div class="common-title"> Goal <?= $k + 1 ?></div>
                <div class="flex">
                    <div class="common-item">
                        <label>Goal description</label>
                        <textarea
                                placeholder="What do I want to achieve? How does it contribute to my service line/team/firm strategic priorities?"
                                name="description"></textarea>
                    </div>
                    <div class="common-item">
                        <label>Timeframe</label>
                        <textarea
                                placeholder="When will this goal be complete / achieved?"
                                name="timeframe"></textarea>
                    </div>
                    <div class="common-item">
                        <label>Measure of success</label>
                        <textarea
                                placeholder="How will success be measured / demonstrated?"
                                name="measure_success"></textarea>
                    </div>
                    <div class="common-item">
                        <label>Support needed</label>
                        <textarea
                                placeholder="What needs to be in place (including support, development and coaching) to ensure you achieve your goal?"
                                name="support_needed"></textarea>
                    </div>
                    <div class="common-item">
                        <label>My comments</label>
                        <textarea
                                placeholder="Comment"
                                name="my_comment"></textarea>
                    </div>
                    <div class="common-item">
                        <label>Manager’s comments</label>
                        <textarea
                                placeholder=""
                                name="manager_comments" readonly></textarea>
                    </div>
                </div>
            </div>

            <?php if (empty($development_state['status'])): ?>
                <?php if ($class != ''): ?>
                    <div class="add-goal">
                        <button type="button" class="long-btn btn-border" id="add_new_goal"> + Add new goal</button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php if (empty($development_state['status'])): ?>
            <div align="center" class="save-submit">
                <button title="submit" form="form" class="long-btn">Save changes</button>
            </div>
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
            <a class="green-bg " target="_blank" href="/myPerformance_guildline_Final.pdf">
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


