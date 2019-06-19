<h1 style="color: #fff">Goals</h1>
<?php if (!empty($goals)): ?>
   <?php foreach ($goals as $k => $goal): ++$k ?>
      <div class="common-list">
         <h3 align="center" class="common-title"> Goal <?= $k ?></h3>
         <div class="flex">
            <div class="common-item">
               <p>Goal description</p>
               <em><?= $goal['description'] ?></em>
            </div>
            <hr>
            <div class="common-item">
               <p>Timeframe</p>
               <em><?= $goal['timeframe'] ?></em>
            </div>
            <hr>
            <div class="common-item">
               <p>Measure of success</p>
               <em><?= $goal['measure_success'] ?></em>
            </div>
            <hr>
            <div class="common-item">
               <p>Support needed</p>
               <em><?= $goal['support_needed'] ?></em>
            </div>
            <hr>
            <div class="common-item">
               <p>My comments</p>
               <em><?= $goal['my_comment'] ?></em>
            </div>
            <hr>
            <div class="common-item">
               <p>Manager’s comments</p>
               <em><?= $goal['manager_comments'] ?></em>
            </div>
         </div>
      </div>
      <hr>
   <?php endforeach; ?>
<?php endif; ?>
<h1 style="color: #fff">Behavioral</h1>
<?php if (!empty($behavioral)): ?>
   <?php foreach ($behavioral as $k => $beh): ++$k ?>
      <div class="common-list">
         <h3 class="common-title"> <?= $beh['title'] ?> - <span> <?= $beh['sub_title'] ?>  </span></h3>
         <div class="flex">
            <div class="common-item common-item-text">
               <em> <?= $beh['description'] ?></em>
            </div>
            <div class="common-item">
               <p>My comments</p>
               <em><?= $beh['user_comment'] ?></em>
            </div>
            <div class="common-item">
               <p>Manager’s comments</p>
               <em><?= $beh['manager_comment'] ?></em>
            </div>
         </div>
      </div>
      <hr>
   <?php endforeach; ?>
<?php endif; ?>
<h1 style="color: #fff">Impacts</h1>
<?php if (!empty($impacts)): ?>
   <?php foreach ($impacts as $k => $impact): ++$k ?>
      <div class="common-list">
         <h3 class="common-title"><?= $impact['title'] ?></h3>
         <div class="flex">
            <?php if (!empty($impact['description'])): ?>
               <p class="common-item common-item-text">
                  <?= $impact['description'] ?>
               </p>
            <?php endif; ?>
            <div class="common-item">
               <p>My comments</p>
               <em><?= $impact['user_comment'] ?></em>
            </div>
            <div class=" common-item">
               <p>Manager’s comments</p>
               <em><?= $impact['manager_comment'] ?></em>
            </div>
         </div>
      </div>
      <hr>
   <?php endforeach; ?>
<?php endif; ?>
<h1 style="color: #fff">Developments</h1>
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
         <h3 class="common-title"><?= $development['title'] ?></h3>
         <div class="flex">
            <div class="common-item">
               <p>Description</p>
               <em><?= $development['description'] ?></em>
            </div>
            <div class="common-item">
               <p>User comment</p>
               <em><?= $development['user_comment'] ?></em>
            </div>
         </div>
      </div>
      <hr>
   <?php endforeach; ?>
<?php endif; ?>
<div>
   <p>Manager comment</p>
   <em><?= $manager_comment->manager_comment ?></em>
</div>
