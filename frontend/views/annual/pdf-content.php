<?php
$this->registerCssFile('/css/pdf.css');
?>

<h1>Goals</h1>
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
                    <div <?=$readonly?> name="goals[<?= $k ?>][description]"><?= $goal['description'] ?></div>
                </div>
                <div class="common-item">
                    <label>Timeframe</label>
                    <div <?=$readonly?> name="goals[<?= $k ?>][timeframe]"><?= $goal['timeframe'] ?></div>
                </div>
                <div class="common-item">
                    <label>Measure of success</label>
                    <div <?=$readonly?>
                                        name="goals[<?= $k ?>][measure_success]"><?= $goal['measure_success'] ?></div>
                </div>
                <div class="common-item">
                    <label>Support needed</label>
                    <div <?=$readonly?>
                                        name="goals[<?= $k ?>][support_needed]"><?= $goal['support_needed'] ?></div>
                </div>
                <div class="common-item">
                    <label>My comments</label>
                    <div <?=$readonly?> name="goals[<?= $k ?>][my_comment]"><?= $goal['my_comment'] ?></div>
                </div>
                <div class="common-item">
                    <label>Manager’s comments</label>
                    <div readonly><?= $goal['manager_comments'] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<h1>Behavioral</h1>
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
                    <label>My comments</label>
                    <input type="hidden" name="comments[<?= $k ?>][id]" value="<?= $beh['user_beh_id'] ?>">
                    <input type="hidden" name="comments[<?= $k ?>][behavioral_id]"
                           value="<?= $beh['id'] ?>">
                    <div placeholder="Comment" <?=$readonly?>
                                          name="comments[<?= $k ?>][user_comment]"><?= $beh['user_comment'] ?></div>
                </div>
                <div class="common-item">
                    <label>Manager’s comments</label>
                    <div readonly><?= $beh['manager_comment'] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<h1>Impacts</h1>
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
                    <div placeholder="Comment" <?= $readonly ?>
                                          name="comments[<?= $k ?>][user_comment]"><?= $impact['user_comment'] ?></div>
                </div>
                <div class=" common-item">
                    <label>Manager’s comments</label>
                    <div readonly><?= $impact['manager_comment'] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<h1>Developments</h1>
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
                    <input type="hidden" name="comments[<?= $k ?>][id]"
                           value="<?= $development['user_beh_id'] ?>">
                    <input type="hidden" name="comments[<?= $k ?>][development_id]"
                           value="<?= $development['id'] ?>">
                    <div placeholder="Write your comments here" <?=$readonly?>
                                          name="comments[<?= $k ?>][user_comment]"><?= $development['user_comment'] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
