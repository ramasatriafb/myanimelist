<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mempunyai Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mempunyai Rating', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'USER_ID',
            'ANIME_ID',
            'RATING',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
