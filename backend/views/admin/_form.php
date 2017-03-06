<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\datamaster\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Admin */
/* @var $form yii\widgets\ActiveForm */
$user =  ArrayHelper::map(User::findBySql('select * from user where user.role_id = "1" and user.user_id not in (select member.user_id from user, member where user.user_id = member.user_id)')->all(),'USER_ID','USER_NAMA');
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'USER_ID')->dropDownList($user)->label('User');  ?>
    <!-- <?= $form->field($model, 'USER_ID')->textInput() ?> -->

    <?= $form->field($model, 'NAMA')->textInput(['maxlength' => 200]) ?>

    <!-- <?= $form->field($model, 'DATE_JOIN')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
