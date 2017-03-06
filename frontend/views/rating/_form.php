<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiRating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mempunyai-rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'USER_ID')->textInput() ?> -->

    <!-- <?= $form->field($model, 'ANIME_ID')->textInput() ?> -->

    <?= $form->field($model, 'RATING')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Give' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
