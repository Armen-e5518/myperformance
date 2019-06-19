<?php

?>

<div class="container" id="content">
    <h1 style="color: #fff">Coaching sessions  | <?= $year ?></h1>
   <br>
    <div class="table-block">
        <h3 style="margin: 0">Received</h3>
        <div class="table-item">
           <table cellpadding="5" width="100%">
                <thead>
                <tr>
                    <th>Received from</th>
                    <th>Session notes</th>
                    <th>Attachment</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($provided)): $flag_p = false; ?>
                    <?php foreach ($provided as $item): ?>
                        <tr>
                            <td>
                                <?= $item['first_name'] ?> <?= $item['last_name'] ?>
                            </td>
                            <td>
                               <?= $item['notes'] ?>
                            </td>
                            <td class="red-text">
                                <?php if (!empty($item['attachment'])): ?>
                                    <i class="fas fa-download"></i><a
                                            href="/attachments/<?= $item['attachment'] ?>" target="_blank">Download</a>
                                <?php endif; ?>
                            </td>
                            <td><?= \backend\components\Helper::GetDateByTime($item['date']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
   <br>
    <div class="table-block">
        <h3 style="margin: 0">Provided</h3>
        <div class="table-item">
            <table cellpadding="5" width="100%">
                <thead>
                <tr>
                    <th>Provided to</th>
                    <th>Session notes</th>
                    <th>Attachment</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($received)): $flag = false; ?>
                    <?php foreach ($received as $item): ?>
                        <tr>
                            <td>
                               <?= $item['first_name'] ?> <?= $item['last_name'] ?>
                            </td>
                            <td>
                                <?php if (!empty($item['notes'])): ?>
                                    <?= $item['notes'] ?>
                                <?php endif; ?>
                                <br>
                            </td>
                            <td class="red-text">
                                <?php if (!empty($item['attachment'])): ?>
                                    <i class="fas fa-download"></i>
                                    <a href="/attachments/<?= $item['attachment'] ?>"
                                       target="_blank">Download</a>
                                <?php endif; ?>
                            </td>
                            <td>
                               <?= \backend\components\Helper::GetDateByTime($item['date']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
