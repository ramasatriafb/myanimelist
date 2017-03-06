<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CariAnime */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Animes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Anime', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ANIME_ID',
            'ANIME_TITLE',
            'EPISODE',
            'PREMIRED',
            'SYNOPSIS:ntext',
            // 'DATE_CREATE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
