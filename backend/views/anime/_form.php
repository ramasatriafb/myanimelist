<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Anime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anime-form">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'ANIME_TITLE')->textInput(['maxlength' => 50]) ?>
    <div class="form-group field-user-file_file required">
    <label class="control-label" for="user-file_file">Picture</label>
    <input type="hidden" name="Anime[FILE_FILE]" value=""><input type="file" id="anime-file_file" name="Anime[FILE_FILE]" required>

    <div class="help-block"></div>
    </div>  

    <?= $form->field($model, 'EPISODE')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'PREMIRED')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'SYNOPSIS')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'DATE_CREATE')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
