<?php
$years = \common\models\Years::GetAll();
$g_year = Yii::$app->request->get('year');
?>
<div class="main-right">
    <?php if (!empty($years)): ?>
        <?php foreach ($years as $year): ?>
            <ul class="post-type-by-date accordion-m">
                <li>
                    <a href="javascript:void(0);" class="flex date">
                        <span><?= $year ?></span>
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <ul class="<?= $g_year != $year ? 'hide-a' : '' ?>">
                        <li>
                            <a href="/feedback">Feedback requests</a>
                        </li>

                        <li>
                            <a href="/conversations">Coaching conversations</a>
                        </li>
                        <ul class="">
                            <li>
                                <a href="/goals/<?= $year ?>" class="<?= $active == 'goals' . $year ? 'active' : '' ?>">Goals</a>
                            </li>
                            <li>
                                <a href="/behavioral/<?= $year ?>"
                                   class="<?= $active == 'behavioral' . $year ? 'active' : '' ?>">Behavioral
                                    competencies</a>
                            </li>
                            <li>
                                <a href="/impact/<?= $year ?>" class="<?= $active == 'impact' . $year ? 'active' : '' ?>">Impact</a>
                            </li>
                        </ul>

                    </ul>
                </li>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</div>