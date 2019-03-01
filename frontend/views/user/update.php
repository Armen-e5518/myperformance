<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Edit user data';

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="user-behavioral-create">
    <?= $this->render('_form_u', [
        'model' => $model,
    ]) ?>
</div>
