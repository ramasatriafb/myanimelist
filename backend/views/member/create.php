<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Member */

$this->title = 'Tambah Member';
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
