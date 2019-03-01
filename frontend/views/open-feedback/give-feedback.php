<?php
//$this->registerJsFile('/js/jq.js');
//$this->registerJsFile('/js/feedback/feedback-src.js');
/* @var $model common\models\Feedbacks */
$this->registerJsFile('/js/common.js');
$this->params['feedback'] = true;

$this->title = "Feedback | " . $year;
?>

<div class="main-content">

    <section class="gray-bg common-block">
        <?php $form_i = \yii\widgets\ActiveForm::begin(['id' => 'form']); ?>
        <div class="container">
            <div class="table-title flex"><img src="/html/assets/images/icons/feedback-provided.png">Provide feedback
            </div>
            <div class="request-body flex">
                <div>
                    <input type="text" name="Feedbacks[user_name]" disabled value="<?= $model->user_name ?>"
                           placeholder="Name">
                </div>
            </div>
            <div class="request-body flex">
                <div>
                    <input type="text" name="Feedbacks[user_position]" disabled value="<?= $model->user_position ?>"
                           placeholder="Position">
                </div>
                <div>
                    <?= \kartik\select2\Select2::widget([
                        'model' => $model,
                        'name' => 'feedback_type',
                        'attribute' => 'feedback_type',
                        'data' => \common\models\Feedbacks::FEEDBACK_TYPE,
//                        'maintainOrder' => true,
                        'options' => ['placeholder' => 'Reason for feedback', 'disabled' => true, 'id' => 'Reason', 'multiple' => false],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'initialize' => true,
//                            'tags' => true,
                        ],
                    ]);
                    ?>
                </div>
                <div>
                    <input type="text" name="Feedbacks[project_name]" disabled value="<?= $model->project_name ?>"
                           placeholder="Project name / other">
                </div>
            </div>
            <div class="common-list">
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
                        <textarea placeholder="Write your comments here" name="Feedbacks[critical_thinking]"></textarea>
                    </div>
                    <div class="line"></div>
                    <div class="common-item">
                        <label>Builds business relationships</label>
                        <p>This person invests time to establish the trust and confidence of colleagues, clients and
                            external stakeholders.</p>
                    </div>
                    <div class="common-item">
                        <textarea placeholder="Write your comments here" name="Feedbacks[builds]"></textarea>
                    </div>
                    <div class="line"></div>
                    <div class="common-item">
                        <label>Results driven</label>
                        <p>This person makes decisions, takes action and looks to find most efficient and productive
                            ways to achieve commitments.</p>
                    </div>
                    <div class="common-item">
                        <textarea placeholder="Write your comments here" name="Feedbacks[results]"></textarea>
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
                        <div class="radio-list">
                            <label>
                                <input type="radio" name="Feedbacks[collaboration]" value="0"><span></span><em>Strongly
                                    Agree </em>
                            </label>
                            <label>
                                <input type="radio" name="Feedbacks[collaboration]"
                                       value="1"><span></span><em>Agree</em></label>
                            <label>
                                <input type="radio" name="Feedbacks[collaboration]"
                                       value="Neutral"><span></span><em>Neutral </em></label>
                            <label>
                                <input type="radio" name="Feedbacks[collaboration]" value="2"><span></span>
                                <em>Disagree </em></label>
                            <label>
                                <input type="radio" name="Feedbacks[collaboration]" value="3"><span></span><em> Strongly
                                    Disagree</em> </label>
                        </div>
                        <textarea placeholder="Write your comments here"
                                  name="Feedbacks[collaboration_text]"></textarea>
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
                        <div class="radio-list">
                            <label><input type="radio" name="Feedbacks[leadership]" value="0"><span></span><em>Strongly
                                    Agree </em></label>
                            <label><input type="radio" name="Feedbacks[leadership]"
                                          value="1"><span></span><em>Agree</em></label>
                            <label><input type="radio" name="Feedbacks[leadership]"
                                          value="2"><span></span><em>Neutral </em></label>
                            <label><input type="radio" name="Feedbacks[leadership]" value="3"><span></span>
                                <em>Disagree </em></label>
                            <label><input type="radio" name="Feedbacks[leadership]" value="4"><span></span><em> Strongly
                                    Disagree</em> </label>
                        </div>
                        <textarea placeholder="Write your comments here" name="Feedbacks[leadership_text]"></textarea>
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
                        <div class="radio-list">
                            <label><input type="radio" name="Feedbacks[excellence]" value="0"><span></span><em>Strongly
                                    Agree </em></label>
                            <label><input type="radio" name="Feedbacks[excellence]"
                                          value="1"><span></span><em>Agree</em></label>
                            <label><input type="radio" name="Feedbacks[excellence]"
                                          value="2"><span></span><em>Neutral </em></label>
                            <label><input type="radio" name="Feedbacks[excellence]" value="3"><span></span>
                                <em>Disagree </em></label>
                            <label><input type="radio" name="Feedbacks[excellence]" value="4"><span></span><em> Strongly
                                    Disagree</em> </label>
                        </div>
                        <textarea placeholder="Write your comments here" name="Feedbacks[excellence_text]"></textarea>
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
                        <div class="radio-list">
                            <label><input type="radio" name="Feedbacks[agility]" value="0"><span></span><em>Strongly
                                    Agree </em></label>
                            <label><input type="radio" name="Feedbacks[agility]"
                                          value="1"><span></span><em>Agree</em></label>
                            <label><input type="radio" name="Feedbacks[agility]"
                                          value="2"><span></span><em>Neutral </em></label>
                            <label><input type="radio" name="Feedbacks[agility]" value="3"><span></span>
                                <em>Disagree </em></label>
                            <label><input type="radio" name="Feedbacks[agility]" value="4"><span></span><em> Strongly
                                    Disagree</em> </label>
                        </div>
                        <textarea placeholder="Write your comments here" name="Feedbacks[agility_text]"></textarea>
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
                        <div class="radio-list">
                            <label><input type="radio" name="Feedbacks[respect]" value="0"><span></span><em>Strongly
                                    Agree </em></label>
                            <label><input type="radio" name="Feedbacks[respect]"
                                          value="1"><span></span><em>Agree</em></label>
                            <label><input type="radio" name="Feedbacks[respect]"
                                          value="2"><span></span><em>Neutral </em></label>
                            <label><input type="radio" name="Feedbacks[respect]" value="3"><span></span>
                                <em>Disagree </em></label>
                            <label><input type="radio" name="Feedbacks[respect]" value="4"><span></span><em> Strongly
                                    Disagree</em> </label>
                        </div>
                        <textarea placeholder="Write your comments here" name="Feedbacks[respect_text]"></textarea>
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
                        <div class="radio-list">
                            <label><input type="radio" name="Feedbacks[responsibility]" value="0"><span></span><em>Strongly
                                    Agree </em></label>
                            <label><input type="radio" name="Feedbacks[responsibility]"
                                          value="1"><span></span><em>Agree</em></label>
                            <label><input type="radio" name="Feedbacks[responsibility]" value="2"><span></span><em>Neutral </em></label>
                            <label><input type="radio" name="Feedbacks[responsibility]" value="3"><span></span>
                                <em>Disagree </em></label>
                            <label><input type="radio" name="Feedbacks[responsibility]" value="4"><span></span><em>
                                    Strongly
                                    Disagree</em> </label>
                        </div>
                        <textarea placeholder="Write your comments here"
                                  name="Feedbacks[responsibility_text]"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div align="center" class="save-submit">
            <button type="submit" class="long-btn send"> Send feedback</button>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </section>
</div>
