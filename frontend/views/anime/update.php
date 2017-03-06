<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Anime */

$this->title = 'Update Anime: ' . ' ' . $model->ANIME_ID;
$this->params['breadcrumbs'][] = ['label' => 'Animes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ANIME_ID, 'url' => ['view', 'id' => $model->ANIME_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
