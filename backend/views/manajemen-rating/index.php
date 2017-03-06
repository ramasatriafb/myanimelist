<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Rating';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Beri Rating Anime' , ['create'], ['class' => 'btn btn-success']) ?>
    </p>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'anime_title',
            'rating',

            [
                'class'      => 'yii\grid\ActionColumn',
                'template' => '{view}',
                
                // 'urlCreator' => function ($action, $dataProvider, $key, $index) {
                //     $url = Url::toRoute(['mempunyai/pengajar', 'id' => $dataProvider['id']]);
                //     return $url;
                // }
            ],
        ],
    ]); ?>
</div>
