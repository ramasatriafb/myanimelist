<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiGenre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mempunyai-genre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ANIME_ID')->textInput() ?>

    <?= $form->field($model, 'GENRE_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
