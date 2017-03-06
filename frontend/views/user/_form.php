<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-signup">
<div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'ROLE_ID')->textInput() ?> -->

    <?= $form->field($model, 'USER_NAMA')->textInput(['maxlength' => 20]) ?>
<?= $form->field($member, 'MEMBER_NAMA')->textInput(['maxlength' => 200]) ?>

 <?= $form->field($model, 'USER_EMAIL')->textInput(['maxlength' => 200]) ?>

    <div class="form-group field-user-user_password required">
    <label class="control-label" for="user-user_password">Password</label>
    <input type="password" id="user-user_password" class="form-control" name="pass" maxlength="100" required>

    <div class="help-block"></div>

   
    <!-- <?= $form->field($model, 'USER_AVATAR')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'USER_AKTIF')->textInput() ?>
 -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Sign Up' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>