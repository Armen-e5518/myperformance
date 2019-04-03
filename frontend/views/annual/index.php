<?php
//$this->registerJsFile('/js/jq.js');
$this->registerJsFile('/js/common.js');
//$this->registerJsFile('/js/feedback/feedback-src.js');
$this->params['feedback'] = true;

$this->title = "Annual appraisal | " . $year;
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
    <section class="table-list gray-bg annual-appraisal">
        <div class="container">
            <div class="table-block">
                <div class="table-title flex"><img src="/html/assets/images/icons/user-icon.png"> My annual appraisal
                    | <?= $year ?>
                </div>
                <div class="table-item">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Manager</th>
                            <th>Goals</th>
                            <th>Behavioral competencies</th>
                            <th>Impact</th>
                            <th>Development plan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= \frontend\models\User::getCurrentUserName() ?></td>
                            <td><?= Yii::$app->user->identity->position ?></td>
                            <td><?= \common\models\Departments::GetTitleById(Yii::$app->user->identity->department_id) ?></td>
                            <td><?= \backend\models\User::GetManagerName() ?></td>
                            <td class="blue-text"><a href="/goals/<?= $year ?>">View goals</a></td>
                            <td class="blue-text"><a href="/behavioral/<?= $year ?>"> View behavioral
                                    competencies </a></td>
                            <td class="blue-text"><a href="/impact/<?= $year ?>">View impact</a></td>
                            <td class="blue-text"><a href="/development/<?= $year ?>">View development plan </a></td>
                            <td class="red-text"><a target="_blank" href="/annual-pdf/<?= $year ?>"><i class="far fa-file-pdf"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="table-block">
                <div class="table-title flex"><img src="/html/assets/images/icons/team-icon.png"> Team members’ annual
                    appraisal | <?= $year ?>
                </div>
                <div class="table-item">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <!--                            <th>Manager</th>-->
                            <th>Goals</th>
                            <th>Behavioral competencies</th>
                            <th>Impact</th>
                            <th>Development plan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($my_users)): ?>
                            <?php foreach ($my_users as $k => $my_user): ++$k ?>
                                <tr>
                                    <td><span><img src="/users/<?= $my_user['avatar'] ?>" alt=""
                                                   class="request-to-whom"></span><?= $my_user['first_name'] ?> <?= $my_user['last_name'] ?>
                                    </td>
                                    <td><?= $my_user['position'] ?> </td>
                                    <td><?= $my_user['title'] ?> </td>
                                    <!--                                    <td>Gurgen Hakobyan</td>-->
                                    <td class="blue-text"><a href="/user-goals/<?= $year . '/' . $my_user['id'] ?>">View
                                            goals</a></td>

                                    <td class="blue-text"><a
                                                href="/user-behavioral/<?= $year . '/' . $my_user['id'] ?>"> View
                                            behavioral
                                            competencies </a></td>

                                    <td class="blue-text"><a href="/user-impact/<?= $year . '/' . $my_user['id'] ?>">View
                                            impact</a></td>
                                    <td class="blue-text"><a
                                                href="/user-development/<?= $year . '/' . $my_user['id'] ?>">View
                                            development plan </a>
                                    </td>
                                    <td class="red-text">
                                        <a target="_blank" href="/annual-user-pdf/<?= $year . '/' . $my_user['id'] ?>"><i class="far fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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