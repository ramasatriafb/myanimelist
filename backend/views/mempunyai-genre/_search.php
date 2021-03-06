<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CariManajemenDSM */
/* @var $form yii\widgets\ActiveForm */
?>

<div class=mempunyai-anime-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MANAJEMENDSM_ID') ?>

    <?= $form->field($model, 'USER_ID') ?>

    <?= $form->field($model, 'MANAJEMENDSM_NAMA') ?>

    <?= $form->field($model, 'MANAJEMENDSM_NOHP') ?>

    <?= $form->field($model, 'MANAJEMENDSM_AKTIF') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
