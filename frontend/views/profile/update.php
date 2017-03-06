<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\User */

$this->title = 'Setting Profile';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->USER_ID, 'url' => ['view', 'id' => $model->USER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
