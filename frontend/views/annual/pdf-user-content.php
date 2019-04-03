<?php
$this->registerCssFile('/css/pdf.css');
?>

<h1>Goals</h1>
<?php if (!empty($goals)): ?>
    <?php foreach ($goals as $k => $goal): ++$k ?>
        <div class="common-list">
            <div class="common-title"> Goal <?= $k ?></div>
            <div class="flex">
                <div class="common-item">
                    <label>Goal description</label>
                    <div readonly><?= $goal['description'] ?></div>
                </div>
                <div class="common-item">
                    <label>Timeframe</label>
                    <div readonly><?= $goal['timeframe'] ?></div>
                </div>
                <div class="common-item">
                    <label>Measure of success</label>
                    <div readonly><?= $goal['measure_success'] ?></div>
                </div>
                <div class="common-item">
                    <label>Support needed</label>
                    <div readonly><?= $goal['support_needed'] ?></div>
                </div>
                <div class="common-item">
                    <label>Employee comments</label>
                    <div readonly><?= $goal['my_comment'] ?></div>
                </div>
                <div class="common-item">
                    <label>Manager’s comments</label>
                    <input type="hidden" name="comments[<?= $k ?>][id]" value="<?= $goal['id'] ?>">
                    <div placeholder="Comments" <?= $readonly ?>
                         name="comments[<?= $k ?>][manager_comment]"><?= $goal['manager_comments'] ?></div>
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
                    <label>Employee comments</label>
                    <input type="hidden" name="comments[<?= $k ?>][id]" value="<?= $beh['user_beh_id'] ?>">
                    <div readonly><?= $beh['user_comment'] ?></div>
                </div>
                <div class="common-item">
                    <label>Manager’s comments</label>
                    <div placeholder="Comment" <?= $readonly ?>
                         name="comments[<?= $k ?>][manager_comment]"><?= $beh['manager_comment'] ?></div>
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
                <div class="common-item">
                    <label>Employee comments</label>
                    <input type="hidden"
                           name="comments[<?= $k ?>][id]"
                           value="<?= $impact['user_imp_id'] ?>">
                    <div readonly><?= $impact['user_comment'] ?></div>
                </div>
                <div class=" common-item">
                    <label>Manager’s comments</label>
                    <div placeholder="Comment" <?= $readonly ?>
                         name="comments[<?= $k ?>][manager_comment]"><?= $impact['manager_comment'] ?></div>
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
                    <div readonly><?= $development['user_comment'] ?></div>
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
            <div placeholder="Comment" <?= $readonly ?>
                 name="comment[manager_comment]"><?= $manager['manager_comment'] ?></div>
        </div>
    </div>
</div>