<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiRating */

$this->title = 'Create Mempunyai Rating';
$this->params['breadcrumbs'][] = ['label' => 'Mempunyai Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
