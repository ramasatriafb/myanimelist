<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\datamaster\Anime;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Review */
/* @var $form yii\widgets\ActiveForm */
$anime =  ArrayHelper::map(Anime::find()->all(),'ANIME_ID','ANIME_TITLE'); 

?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'USER_ID')->textInput() ?> -->

    <!-- <?= $form->field($model, 'ANIME_ID')->textInput() ?> -->
    <?= $form->field($model, 'ANIME_ID')->dropDownList($anime)->label('Pilih Anime');  ?>
	

    <?= $form->field($model, 'REVIEW')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'DATE_REVIEW')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
