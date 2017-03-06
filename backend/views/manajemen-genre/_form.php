<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\MempunyaiGenre */
/* @var $form yii\widgets\ActiveForm */
use common\models\datamaster\Anime;
use common\models\datamaster\Genre;
use yii\helpers\ArrayHelper;
$anime =  ArrayHelper::map(Anime::findBySql('select * from anime order by anime_title asc')->all(),'ANIME_ID','ANIME_TITLE');
$genre =  ArrayHelper::map(Genre::findBySql('select * from genre order by genre asc')->all(),'GENRE_ID','GENRE');  
?>

<div class="mempunyai-genre-form">

   <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($model, 'ANIME_ID')->dropDownList($anime)->label('Pilih Anime');  ?> 

    <?= $form->field($model, 'GENRE_ID')->dropDownList($genre)->label('Pilih genre');  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
