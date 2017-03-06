<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Admin */

$this->title = 'Update Admin: ' . ' ' . $model->ADMIN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ADMIN_ID, 'url' => ['view', 'id' => $model->ADMIN_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
