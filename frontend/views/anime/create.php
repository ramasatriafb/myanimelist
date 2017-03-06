<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Anime */

$this->title = 'Create Anime';
$this->params['breadcrumbs'][] = ['label' => 'Animes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
