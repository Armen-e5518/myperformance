<?php

use common\models\Feedbacks;


?>

<div class="container">
   <h1 style="color: #fff">Feedback | <?= $year ?></h1>
   <?php if (!empty($feedbacks)): ?>
      <?php foreach ($feedbacks as $k => $model):
         $user_name = $model['type'] == \common\models\Feedbacks::TYPE_EXTERNAL ? $model['user_name'] : $users[$model['user_id']]; ?>
         <h3 align="center"><?= $user_name ?></h3>
         <div class="row">
            <?php if ($model['type'] == \common\models\Feedbacks::TYPE_EXTERNAL): ?>
               <div class="col-md-6">
                  <p>User position: <em> <?= $model['user_position'] ?></em></p>
               </div>
            <?php endif; ?>
            <div class="col-md-6">
               <?php if (!empty($model['feedback_type'])): ?>
                  <p>Feedback type:<em> <?= \common\models\Feedbacks::FEEDBACK_TYPE[$model['feedback_type']] ?></em></p>
               <?php endif; ?>
            </div>
            <div class="col-md-6">
               <p> Project name:<em> <?= $model['project_name'] ?></em></p>
            </div>
         </div>
         <div class="row">
            <h4 class="common-title">1. Feedback on behavioral competencies</h4>
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
                  <em><?= $model['critical_thinking'] ?></em>
               </div>
               <div class="line"></div>
               <div class="common-item">
                  <label>Builds business relationships</label>
                  <p>This person invests time to establish the trust and confidence of colleagues, clients and
                     external stakeholders.</p>
               </div>
               <div class="common-item">
                  <em><?= $model['builds'] ?></em>
               </div>
               <div class="line"></div>
               <div class="common-item">
                  <label>Results driven</label>
                  <p>This person makes decisions, takes action and looks to find most efficient and productive
                     ways to achieve commitments.</p>
               </div>
               <div class="common-item">
                  <em><?= $model['results'] ?></em>
               </div>
            </div>
         </div>
         <div class="common-list">
            <h4 class="common-title">2. Global values</h4>
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
                     <label><?= Feedbacks::GetPdfImage($model, 'collaboration', 0) ?><em>Strongly Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'collaboration', 1) ?><em>Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'collaboration', 2) ?><em>Neutral</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'collaboration', 3) ?><em>Disagree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'collaboration', 4) ?><em>Strongly Disagree</em> </label>
                  </div>
                  <em><?= $model['collaboration_text'] ?></em>
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
                     <label><?= Feedbacks::GetPdfImage($model, 'leadership', 0) ?><em>Strongly Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'leadership', 1) ?><em>Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'leadership', 2) ?><em>Neutral</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'leadership', 3) ?><em>Disagree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'leadership', 4) ?><em>Strongly Disagree</em></label>
                  </div>
                  <em><?= $model['leadership_text'] ?></em>
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
                     <label><?= Feedbacks::GetPdfImage($model, 'excellence', 0) ?><em>Strongly Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'excellence', 1) ?><em>Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'excellence', 2) ?><em>Neutral</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'excellence', 3) ?><em>Disagree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'excellence', 4) ?><em>Strongly Disagree</em></label>
                  </div>
                  <em><?= $model['excellence_text'] ?></em>
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
                     <label><?= Feedbacks::GetPdfImage($model, 'agility', 0) ?><em>Strongly Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'agility', 1) ?><em>Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'agility', 2) ?><em>Neutral</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'agility', 3) ?><em>Disagree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'agility', 4) ?><em>Strongly Disagree</em></label>
                  </div>
                  <em><?= $model['agility_text'] ?></em>
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
                     <label><?= Feedbacks::GetPdfImage($model, 'respect', 0) ?><em>Strongly Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'respect', 1) ?><em>Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'respect', 2) ?><em>Neutral</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'respect', 3) ?><em>Disagree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'respect', 4) ?><em>Strongly Disagree</em></label>
                  </div>
                  <em><?= $model['respect_text'] ?></em>
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
                     <label><?= Feedbacks::GetPdfImage($model, 'responsibility', 0) ?><em>Strongly Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'responsibility', 1) ?><em>Agree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'responsibility', 2) ?><em>Neutral</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'responsibility', 3) ?><em>Disagree</em></label>
                     <label><?= Feedbacks::GetPdfImage($model, 'responsibility', 4) ?><em>Strongly Disagree</em></label>
                  </div>
                  <em><?= $model['responsibility_text'] ?></em>
               </div>
            </div>
         </div>
         <hr>
      <?php endforeach; ?>
   <?php endif; ?>
</div>
