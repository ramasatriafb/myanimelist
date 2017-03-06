<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CariAnime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anime-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ANIME_ID') ?>

    <?= $form->field($model, 'ANIME_TITLE') ?>

    <?= $form->field($model, 'EPISODE') ?>

    <?= $form->field($model, 'PREMIRED') ?>

    <?= $form->field($model, 'SYNOPSIS') ?>

    <?php // echo $form->field($model, 'DATE_CREATE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
