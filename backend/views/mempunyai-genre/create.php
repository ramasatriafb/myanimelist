<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\ManajemenDSM */

$this->title = 'Manajemen Genre';
$this->params['breadcrumbs'][] = ['label' => 'Manajemen Genre Anime', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-anime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
