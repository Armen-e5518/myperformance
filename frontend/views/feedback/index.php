<?php
//$this->registerJsFile('/js/jq.js');
//$this->registerJsFile('/js/feedback/feedback-src.js');
$this->registerJsFile('/js/common.js');
$this->params['feedback'] = true;

$this->title = "Feedback | " . $year;
?>

<div class="main-content">
    <section class="nav-tab">
        <div class="container">
            <?= $this->render('/common/header', [
                'year' => $year,
                'active' => [
                    'feedback' => true
                ]
            ]) ?>
        </div>
    </section>
    <section class="table-list gray-bg feedback">
        <div class="container">
            <div class="feedback-links flex">
                <a href="javascript:void(0);" class="btn-border give-feedback-btn inline-block transition">Request
                    feedback <i class="fas fa-chevron-right"></i></a>
                <a class="btn-border" href="/provide-feedback/<?= $year ?>">Provide feedback <i
                            class="fas fa-chevron-right"></i></a>
                <a class="btn-border download-report" href="#">Download report <i class="far fa-file-pdf"></i></a>
            </div>
            <div class="table-block">
                <div class="table-title flex"><img src="/html/assets/images/icons/feedback-received.png"> Feedback
                    received | <?= $year ?>
                </div>
                <div class="table-item">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <!--                            <th>Job title</th>-->
                            <th>Department</th>
                            <th>Internal/External</th>
                            <th>Project</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($feedback_received)): ?>
                            <?php foreach ($feedback_received as $k => $item): ++$k;
                                $u = $item['is_request'] == \common\models\Feedbacks::IS_REQUEST ? 'u_' : ''; ?>
                                <tr>
                                    <td>
                                        <?php if ($item['type'] == \common\models\Feedbacks::TYPE_INTERNAL): ?>
                                            <span><img src="/users/<?= $item[$u . 'avatar'] ?>" alt=""
                                                       class="request-to-whom"></span>
                                            <?= $item[$u . 'first_name'] . ' ' . $item[$u . 'last_name'] ?>
                                        <?php else: ?>
                                            <span><img src="/images/user.png" alt="" class="request-to-whom"></span>
                                            <?= $item['user_name'] ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($item['type'] == \common\models\Feedbacks::TYPE_INTERNAL): ?>
                                            <?= $item[$u . 'departments'] ?>
                                        <?php else: ?>
                                            <?= $item['user_position'] ?>
                                        <?php endif; ?>
                                    </td>
                                    <!--                                    <td>Member firm development</td>-->
                                    <td>
                                        <?php if ($item['type'] == \common\models\Feedbacks::TYPE_INTERNAL): ?>
                                            Internal
                                        <?php else: ?>
                                            External
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $item['project_name'] ?></td>
                                    <td><?= \backend\components\Helper::GetDate($item['date']) ?></td>
                                    <td>
                                        <?php if ($item['status'] == \common\models\Feedbacks::STATUS_PENDING): ?>
                                            <span class="red-text">Pending</span>
                                        <?php else: ?>
                                            <a class="green-text" href="/view-feedback/<?= $year ?>/<?= $item['id'] ?>">Feedback
                                                received</a>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="table-block">
                <div class="table-title flex"><img src="/html/assets/images/icons/feedback-provided.png"> Feedback
                    provided | <?= $year ?>
                </div>
                <div class="table-item">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <!--                            <th>Job title</th>-->
                            <th>Department</th>
                            <th>Internal/External</th>
                            <th>Project</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($feedback_provided)): ?>
                            <?php foreach ($feedback_provided as $k => $item): ++$k;
                                $u = $item['is_request'] == \common\models\Feedbacks::IS_REQUEST ? '' : 'u_'; ?>
                                <tr>
                                    <td>
                                        <?php if ($item['type'] == \common\models\Feedbacks::TYPE_INTERNAL): ?>
                                            <span>
                                        <img src="/users/<?= $item[$u . 'avatar'] ?>" alt="" class="request-to-whom">
                                    </span>
                                            <?= $item[$u . 'first_name'] . ' ' . $item[$u . 'last_name'] ?>
                                        <?php else: ?>
                                            <span>
                                        <img src="/images/user.png" alt=""
                                             class="request-to-whom">
                                    </span>
                                            <?= $item['user_name'] ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($item['type'] == \common\models\Feedbacks::TYPE_INTERNAL): ?>
                                            <?= $item[$u . 'departments'] ?>
                                        <?php else: ?>
                                            <?= $item['user_position'] ?>
                                        <?php endif; ?>
                                    </td>
                                    <!--                                    <td>Member firm development</td>-->
                                    <td>
                                        <?php if ($item['type'] == \common\models\Feedbacks::TYPE_INTERNAL): ?>
                                            Internal
                                        <?php else: ?>
                                            External
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $item['project_name'] ?>
                                    </td>
                                    <td><?= \backend\components\Helper::GetDate($item['date']) ?></td>
                                    <td>
                                        <?php if ($item['status'] == \common\models\Feedbacks::STATUS_PENDING): ?>
                                            <a class="red-text" href="/give-feedback/<?= $year ?>/<?= $item['id'] ?>">Pending</a>
                                        <?php else: ?>
                                            <a class="green-text" href="/view-feedback/<?= $year ?>/<?= $item['id'] ?>">
                                                Feedback provided</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="table-block">
                <div class="table-title flex"><img src="/html/assets/images/icons/team-members-feedback.png"> Team
                    member’s
                    feedback | <?= $year ?>
                </div>
                <div class="table-item">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Feedback</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($team)): ?>
                            <?php foreach ($team as $k => $item): ++$k ?>
                                <tr>
                                    <td><span><img src="/users/<?= $item['avatar'] ?>" alt=""
                                                   class="request-to-whom"></span> <?= $item['first_name'] . ' ' . $item['last_name'] ?>
                                    </td>
                                    <td><?= $item['position'] ?></td>
                                    <td><?= $item['title'] ?></td>
                                    <td class="red-text"><a href="#">View report</a> <i class="far fa-file-pdf"></i>
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
</div>
<div class="popup-layer transition">
    <div class="popup relative">
        <a href="javascript:void(0);" class="popup-close absolute" title="Close popup"></a>
        <h3>Request feedback</h3>
        <ul class="requests-tab-title flex">
            <li><a href="javascript:void(0);" class="transition active">Internal</a></li>
            <li><a href="javascript:void(0);" class="transition">External</a></li>
        </ul>

        <div class="requests-list active absolute">
            <?php $form_i = \yii\widgets\ActiveForm::begin(['id' => 'form']); ?>
            <div class="request-body">
                <div>
                    <?= \kartik\select2\Select2::widget([
                        'model' => $internal_model,
                        'name' => 'user_id',
                        'attribute' => 'user_id',
                        'data' => $users,
                        'maintainOrder' => true,
                        'options' => ['placeholder' => 'Select person...', 'id' => 'add-user', 'multiple' => false],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'initialize' => true,
                            'tags' => true,
                        ],
                    ]);
                    ?>
                </div>
                <div>
                    <?= \kartik\select2\Select2::widget([
                        'model' => $internal_model,
                        'name' => 'feedback_type',
                        'attribute' => 'feedback_type',
                        'data' => \common\models\Feedbacks::FEEDBACK_TYPE,
//                        'maintainOrder' => true,
                        'options' => ['placeholder' => 'Reason for feedback', 'id' => 'Reason', 'multiple' => false],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'initialize' => true,
//                            'tags' => true,
                        ],
                    ]);
                    ?>
                </div>
                <div>
                    <?= $form_i->field($internal_model, 'project_name')->textInput(['maxlength' => true, 'placeholder' => 'Project name / other'])->label(false) ?>
                </div>
            </div>
            <div>
                <button type="submit" class="submit-btn transition">Request feedback</button>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>


        <div class="requests-list absolute">
            <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'External_model']); ?>
            <div class="request-body">
                <div>
                    <?= $form->field($External_model, 'user_email')
                        ->textInput(['maxlength' => true, 'placeholder' => 'Email'])->label(false) ?>
                </div>
                <div>
                    <?= $form->field($External_model, 'user_name')
                        ->textInput(['maxlength' => true, 'placeholder' => 'Name'])->label(false) ?>
                </div>
                <div>
                    <?= $form->field($External_model, 'user_position')
                        ->textInput(['maxlength' => true, 'placeholder' => 'Company / Position'])->label(false) ?>
                </div>
                <div>
                    <?= \kartik\select2\Select2::widget([
                        'model' => $External_model,
                        'name' => 'feedback_type',
                        'attribute' => 'feedback_type',
                        'data' => \common\models\Feedbacks::FEEDBACK_TYPE,
//                        'maintainOrder' => true,
                        'options' => ['placeholder' => 'Reason for feedback', 'id' => 'External_model_2', 'multiple' => false],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'initialize' => true,
//                            'tags' => true,
                        ],
                    ]);
                    ?>
                </div>
                <div>
                    <?= $form->field($External_model, 'project_name')
                        ->textInput(['maxlength' => true, 'placeholder' => 'Project name / other'])->label(false) ?>
                </div>
            </div>
            <div>
                <button type="submit" class="submit-btn transition">Request feedback</button>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
</div>