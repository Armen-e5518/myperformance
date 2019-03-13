<?php
$this->registerCssFile('/css/pdf.css');
?>

<div class="container">
    <h2>Provide feedback | <?= $year ?></h2>
    <?php if ($model->type == \common\models\Feedbacks::TYPE_EXTERNAL): ?>
        <div class="row">
            <div>
                <p>User name: <?= $model->user_name ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php if ($model->type == \common\models\Feedbacks::TYPE_EXTERNAL): ?>
            <div class="col-md-6">
                User position: <?= $model->user_position ?>
            </div>
        <?php else: ?>
            <div class="col-md-6">
                <?php if (!empty($model->user_id)): ?>
                    <p>User:<?= $users[$model->user_id] ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="col-md-6">
            <?php if (!empty($model->feedback_type)): ?>
                <p>Feedback type: <?= \common\models\Feedbacks::FEEDBACK_TYPE[$model->feedback_type] ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            Project name: <?= $model->project_name ?>
        </div>
    </div>
    <div class="row">
        <div class="common-title">1. Feedback on behavioral competencies</div>
        <div class="flex">
            <div class="common-item common-item-text">
                <p>In giving feedback the main objective is to provide guidance by supplying information in a
                    professional and useful manner, either to support effective behaviour, or to guide someone
                    back on track towards successful performance. Please complete the fields below if you wish
                    to give feedback:</p>
            </div>
            <div class="common-item">
                <label>Critical thinking</label>
                <p>This person asks probing questions and makes sense of disparate information to connect the
                    dots and bring clarity. </p>
            </div>
            <div class="common-item">
                <p placeholder="Write your comments here" readonly
                   name="Feedbacks[critical_thinking]"><?= $model->critical_thinking ?></p>
            </div>
            <div class="line"></div>
            <div class="common-item">
                <label>Builds business relationships</label>
                <p>This person invests time to establish the trust and confidence of colleagues, clients and
                    external stakeholders.</p>
            </div>
            <div class="common-item">
                <p placeholder="Write your comments here" readonly
                   name="Feedbacks[builds]"><?= $model->builds ?></p>
            </div>
            <div class="line"></div>
            <div class="common-item">
                <label>Results driven</label>
                <p>This person makes decisions, takes action and looks to find most efficient and productive
                    ways to achieve commitments.</p>
            </div>
            <div class="common-item">
                <p placeholder="Write your comments here" readonly
                   name="Feedbacks[results]"><?= $model->results ?></p>
            </div>
        </div>
    </div>
    <div class="common-list">
        <div class="common-title">2. Global values</div>
        <div class="flex">
            <div class="common-item common-item-text">
                <p>Does the individual behave in a way that aligns to our global values? Please rate them using
                    the following scale: Strongly Agree – Agree – Neutral - Disagree - Strongly Disagree:</p>
            </div>
            <div class="common-item flex">
                <div><img src="/html/assets/images/icons/collaboration2_rgb_teal.png"></div>
                <div>
                    <label>Collaboration </label>
                    <ul>
                        <li>asks for help, gives help</li>
                        <li>thinks team, not self</li>
                        <li>brings the best resources to every situation</li>
                    </ul>
                </div>
            </div>
            <div class="common-item">

                <div class="radio-list" value="<?= $model->collaboration ?>">
                    <label><?=$model->GetPdfImage('collaboration',0)?><em>Strongly Agree</em></label>
                    <label><?=$model->GetPdfImage('collaboration',1)?><em>Agree</em></label>
                    <label><?=$model->GetPdfImage('collaboration',2)?><em>Neutral</em></label>
                    <label><?=$model->GetPdfImage('collaboration',3)?><em>Disagree</em></label>
                    <label><?=$model->GetPdfImage('collaboration',4)?><em>Strongly Disagree</em> </label>
                </div>
                <textarea placeholder="Write your comments here" readonly
                          name="Feedbacks[collaboration_text]"><?= $model->collaboration_text ?></textarea>
            </div>
            <div class="line"></div>
            <div class="common-item flex">
                <div><img src="/html/assets/images/icons/leadership2_rgb_red.png"></div>
                <div>
                    <label>Leadership </label>
                    <ul>
                        <li>has courage, inspires others</li>
                        <li>lives our values</li>
                        <li>acts with integrity</li>
                    </ul>
                </div>
            </div>
            <div class="common-item">
                <div class="radio-list" value="<?= $model->leadership ?>">
                    <label><?=$model->GetPdfImage('leadership',0)?><em>Strongly Agree</em></label>
                    <label><?=$model->GetPdfImage('leadership',1)?><em>Agree</em></label>
                    <label><?=$model->GetPdfImage('leadership',2)?><em>Neutral</em></label>
                    <label><?=$model->GetPdfImage('leadership',3)?><em>Disagree</em></label>
                    <label><?=$model->GetPdfImage('leadership',4)?><em>Strongly Disagree</em></label>
                </div>
                <textarea placeholder="Write your comments here" readonly
                          name="Feedbacks[leadership_text]"><?= $model->leadership_text ?></textarea>
            </div>
            <div class="line"></div>
            <div class="common-item flex">
                <div><img src="/html/assets/images/icons/excellence_rgb_green.png"></div>
                <div>
                    <label>Excellence </label>
                    <ul>
                        <li>finds a better way each time</li>
                        <li>continuously grows their expertise</li>
                        <li>strives to be at their best</li>
                    </ul>
                </div>
            </div>
            <div class="common-item">
                <div class="radio-list" value="<?= $model->excellence ?>">
                    <label><?=$model->GetPdfImage('excellence',0)?><em>Strongly Agree</em></label>
                    <label><?=$model->GetPdfImage('excellence',1)?><em>Agree</em></label>
                    <label><?=$model->GetPdfImage('excellence',2)?><em>Neutral</em></label>
                    <label><?=$model->GetPdfImage('excellence',3)?><em>Disagree</em></label>
                    <label><?=$model->GetPdfImage('excellence',4)?><em>Strongly Disagree</em></label>
                </div>
                <textarea placeholder="Write your comments here" readonly
                          name="Feedbacks[excellence_text]"><?= $model->excellence_text ?></textarea>
            </div>
            <div class="line"></div>
            <div class="common-item flex">
                <div><img src="/html/assets/images/icons/agility_rgb_teal.png"></div>
                <div>
                    <label>Agility </label>
                    <ul>
                        <li>thinks broadly acts quickly</li>
                        <li>anticipates, adapts</li>
                        <li>embraces change</li>
                    </ul>
                </div>
            </div>
            <div class="common-item">
                <div class="radio-list" value="<?= $model->agility ?>">
                    <label><?=$model->GetPdfImage('agility',0)?><em>Strongly Agree</em></label>
                    <label><?=$model->GetPdfImage('agility',1)?><em>Agree</em></label>
                    <label><?=$model->GetPdfImage('agility',2)?><em>Neutral</em></label>
                    <label><?=$model->GetPdfImage('agility',3)?><em>Disagree</em></label>
                    <label><?=$model->GetPdfImage('agility',4)?><em>Strongly Disagree</em></label>
                </div>
                <textarea placeholder="Write your comments here" readonly
                          name="Feedbacks[agility_text]"><?= $model->agility_text ?></textarea>
            </div>
            <div class="line"></div>
            <div class="common-item flex">
                <div><img src="/html/assets/images/icons/respect_rgb_red.png"></div>
                <div>
                    <label>Respect </label>
                    <ul>
                        <li>listen and understand, be forthright</li>
                        <li>discovers what is important to others and make it important to themselves</li>
                        <li>value differences</li>
                    </ul>
                </div>
            </div>
            <div class="common-item">
                <div class="radio-list" value="<?= $model->respect ?>">
                    <label><?=$model->GetPdfImage('respect',0)?><em>Strongly Agree</em></label>
                    <label><?=$model->GetPdfImage('respect',1)?><em>Agree</em></label>
                    <label><?=$model->GetPdfImage('respect',2)?><em>Neutral</em></label>
                    <label><?=$model->GetPdfImage('respect',3)?><em>Disagree</em></label>
                    <label><?=$model->GetPdfImage('respect',4)?><em>Strongly Disagree</em></label>
                </div>
                <textarea placeholder="Write your comments here" readonly
                          name="Feedbacks[respect_text]"><?= $model->respect_text ?></textarea>
            </div>
            <div class="line"></div>
            <div class="common-item flex">
                <div><img src="/html/assets/images/icons/responsibility_rgb_green.png"></div>
                <div>
                    <label>Responsibility </label>
                    <ul>
                        <li>influences wisely and owns actions</li>
                        <li>decides, acts and is accountable</li>
                        <li>seeks, accepts and gives honest feedback</li>
                    </ul>
                </div>
            </div>
            <div class="common-item">
                <div class="radio-list" value="<?= $model->responsibility ?>">
                    <label><?=$model->GetPdfImage('responsibility',0)?><em>Strongly Agree</em></label>
                    <label><?=$model->GetPdfImage('responsibility',1)?><em>Agree</em></label>
                    <label><?=$model->GetPdfImage('responsibility',2)?><em>Neutral</em></label>
                    <label><?=$model->GetPdfImage('responsibility',3)?><em>Disagree</em></label>
                    <label><?=$model->GetPdfImage('responsibility',4)?><em>Strongly Disagree</em></label>
                </div>
                <textarea placeholder="Write your comments here"
                          name="Feedbacks[responsibility_text]"
                          readonly><?= $model->responsibility_text ?></textarea>
            </div>
        </div>
    </div>
</div>
