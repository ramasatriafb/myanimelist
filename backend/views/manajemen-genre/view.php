<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiGenre */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Mempunyai Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-genre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
   

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
