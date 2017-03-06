<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Komentar */

$this->title = 'Update Komentar: ' . $model->KOMENTAR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Komentars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KOMENTAR_ID, 'url' => ['view', 'id' => $model->KOMENTAR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komentar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
