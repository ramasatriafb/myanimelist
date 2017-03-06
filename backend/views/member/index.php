<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CariMember */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Tambah Member', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MEMBER_ID',
            'USER_ID',
            'MEMBER_NAMA',
            'DATE_JOIN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
