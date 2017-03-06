<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiRating */

$this->title = 'Update Mempunyai Rating: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Mempunyai Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mempunyai-rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
