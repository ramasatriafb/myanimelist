<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CariAdmin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ADMIN_ID',
            'USER_ID',
            'NAMA',
            'DATE_JOIN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
