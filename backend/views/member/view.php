<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Member */

$this->title = $model->MEMBER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->MEMBER_ID], ['class' => 'btn btn-primary']) ?> -->
       <!--  <?= Html::a('Delete', ['delete', 'id' => $model->MEMBER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>
     

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MEMBER_ID',
            'USER_ID',
            'MEMBER_NAMA',
            'DATE_JOIN',
        ],
    ]) ?>

</div>
