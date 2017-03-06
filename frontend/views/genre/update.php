<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiGenre */

$this->title = 'Update Mempunyai Genre: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Mempunyai Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mempunyai-genre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
