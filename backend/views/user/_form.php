<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\datamaster\Role;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\data\User */
/* @var $form yii\widgets\ActiveForm */
$role =  ArrayHelper::map(Role::find()->all(),'ROLE_ID','ROLE_NAMA'); 
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<div class="form-group field-user-user_nama required">
		<label class="control-label" for="user-user_nama">User  Nama</label>
		<input type="text" id="user-user_nama" class="form-control" name="User[USER_NAMA]" maxlength="20" required>

		<div class="help-block"></div>
	</div>	
	
	<?= $form->field($model, 'ROLE_ID')->dropDownList($role)->label('Sebagai');  ?>
	
	<div class="form-group field-user-file_file required">
	<label class="control-label" for="user-file_file">Avatar</label>
	<input type="hidden" name="User[FILE_FILE]" value=""><input type="file" id="user-file_file" name="User[FILE_FILE]" required>

	<div class="help-block"></div>
	</div>	
	
    <div class="form-group field-user-user_password required">
	<label class="control-label" for="user-user_password">Password</label>
	<input type="password" id="user-user_password" class="form-control" name="pass" maxlength="100" required>

	<div class="help-block"></div>

    <div class="form-group field-user-user_avatar required">
	<input type="hidden" id="user-user_avatar" class="form-control" name="User[USER_AVATAR]" value="ssd" maxlength="100">

	<div class="help-block"></div>

	<?= $form->field($model, 'USER_AKTIF')->textInput(['maxlength' => 10]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
