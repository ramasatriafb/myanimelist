<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- <?= $form->field($model, 'ROLE_ID')->textInput() ?> -->

 <!--    <?= $form->field($model, 'USER_NAMA')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'USER_PASSWORD')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'USER_EMAIL')->textInput(['maxlength' => 200]) ?>

 -->
 
 <div class="form-group field-user-file_file required">
    <label class="control-label" for="user-file_file">Avatar</label>
    <input type="hidden" name="User[FILE_FILE]" value=""><input type="file" id="user-file_file" name="User[FILE_FILE]" required>

    <div class="help-block"></div>
    </div>  
    <!-- <?= $form->field($model, 'USER_AKTIF')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
