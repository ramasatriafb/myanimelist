<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\datamaster\User */

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>Please fill out the following fields to signup:</p>

    <?= $this->render('_form', [
        'model' => $model,
                'member' => $member,
    ]) ?>

</div>
