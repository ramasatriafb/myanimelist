<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Genre */

$this->title = 'Update Genre: ' . ' ' . $model->GENRE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->GENRE_ID, 'url' => ['view', 'id' => $model->GENRE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="genre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
