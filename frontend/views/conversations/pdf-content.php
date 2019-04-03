<?php

?>

<div class="container">
    <h3>Coaching sessions | <?= \frontend\models\User::getCurrentUserName() ?> | <?= $year ?></h3>
    <div class="table-block">
        <h4>Received</h4>
        <div class="table-item">
            <table>
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
                                <span>
                                    <img width="50px" src="/users/<?= $item['avatar'] ?>" alt="" class="request-to-whom">
                                </span>
                                <?= $item['first_name'] ?> <?= $item['last_name'] ?>
                            </td>
                            <td><?= $item['notes'] ?>
                                <!--                                        <a href="#" class="red-text">View more</a>-->
                            </td>
                            <td class="red-text">
                                <?php if (!empty($item['attachment'])): ?>
                                    <i class="fas fa-download"></i><a
                                            href="/attachments/<?= $item['attachment'] ?>" target="_blank">
                                        Document</a>
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
    <div class="table-block">
        <h4>Provided</h4>
        <div class="table-item">
            <table>
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
                            <td><span><img width="50px" src="/users/<?= $item['avatar'] ?>" alt=""
                                           class="request-to-whom"></span> <?= $item['first_name'] ?> <?= $item['last_name'] ?>
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
                                       target="_blank"> Document</a>
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
