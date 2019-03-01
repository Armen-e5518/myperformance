<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Edit user';

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="user-behavioral-create">
    <?= $this->render('_form_u', [
        'model' => $model,
        'managers' => $managers,
    ]) ?>
</div>
