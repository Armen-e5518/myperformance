<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/26/2019
 * Time: 11:16 AM
 */
$years = \common\models\Years::GetAll();
?>
<div class="flex">
    <ul>
        <li>
            <a href="/annual/<?= $year ?>">
                <img src="/html/assets/images/icons/home-icon.png"></a>
        </li>
        <li>
            <a href="/annual/<?= $year ?>" class="<?= !empty($active['annual']) ? 'active' : '' ?>">Annual appraisal</a>
        </li>
        <li>
            <a href="/feedback/<?= $year ?>" class="<?= !empty($active['feedback']) ? 'active' : '' ?>">Feedback</a>
        </li>
        <li>
            <a href="/conversations/<?= $year ?>" class="<?= !empty($active['conversations']) ? 'active' : '' ?>">Coaching
                sessions</a>
        </li>
    </ul>
    <div class="change-year">
        <label>Year</label>
        <select id="years">
            <?php foreach ($years as $y): ?>
                <option <?= $y == $year ? 'selected' : '' ?> ><?= $y ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
