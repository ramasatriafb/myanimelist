
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\User */

$this->title = $model->USER_NAMA;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update User', ['update', 'id' => $model->USER_ID], ['class' => 'btn btn-primary']) ?>
    </p>

    <div style="max-width: 150px;">
        <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?=$model->USER_AVATAR; ?>" class=" img-responsive" alt="Ava User">
    </div>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'USER_ID',
            'ROLE_ID',
            'USER_NAMA',
            //'USER_PASSWORD',
            'USER_AVATAR',
            //'USER_AKTIF',
        ],
    ]) ?>
    
</div>
