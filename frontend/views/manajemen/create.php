<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiGenre */

$this->title = 'Create Mempunyai Genre';
$this->params['breadcrumbs'][] = ['label' => 'Mempunyai Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-genre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
