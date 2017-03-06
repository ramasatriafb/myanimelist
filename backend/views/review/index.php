<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarirReview */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Review';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'USER_ID',
            'ANIME_ID',
            // 'REVIEW:ntext',
            'DATE_REVIEW',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
