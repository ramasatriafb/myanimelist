<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\datamaster\Anime;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiRating */
/* @var $form yii\widgets\ActiveForm */
$anime =  ArrayHelper::map(Anime::findBySql('select * from anime order by anime_title asc')->all(),'ANIME_ID','ANIME_TITLE');

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiRating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mempunyai-rating-form">
 <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'USER_ID')->textInput() ?> -->

    <!-- <?= $form->field($model, 'ANIME_ID')->textInput() ?> -->
<?= $form->field($model, 'ANIME_ID')->dropDownList($anime)->label('Anime');  ?>
    <?= $form->field($model, 'RATING')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
