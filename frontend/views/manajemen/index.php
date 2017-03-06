<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CariMempunyaiGenre */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mempunyai Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-genre-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mempunyai Genre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ANIME_ID',
            'GENRE_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
