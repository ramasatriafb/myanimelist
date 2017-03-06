<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Anime */

$this->title = $model->ANIME_ID;
$this->params['breadcrumbs'][] = ['label' => 'Animes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ANIME_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ANIME_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ANIME_ID',
            'ANIME_TITLE',
            'EPISODE',
            'PREMIRED',
            'SYNOPSIS:ntext',
            'DATE_CREATE',
        ],
    ]) ?>

</div>
