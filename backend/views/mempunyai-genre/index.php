<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CariManajemenDSM */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Genre Anime';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-anime-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Manajemen Genre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'MANAJEMENDSM_ID',
            'ID',
            'ANIME_ID',
            'GENRE_ID',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'anime_title',
            'genre',

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
