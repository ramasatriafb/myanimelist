<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mempunyai Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-genre-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mempunyai Genre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ANIME_ID',
            'GENRE_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
