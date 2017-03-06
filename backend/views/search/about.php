<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Lihat Anak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

	<table class="table table-striped table-bordered">
	<tr>
	<th>Foto</th>
	<th>Nama Lengkap</th>
	<th>Nama Panggilan</th>
	<th>TTL</th>
	<th></th>
	</tr>
    <?php foreach($dataraw as $data){ ?>
	<tr>
	<td align='center'>
    <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>uploads/img/adikbinaan/<?=$data->foto; ?>" class=" img-responsive" alt="Foto Adik Binaan" style="max-width: 300px;">
	</td>
	<td><?=$data->nama_lengkap;?></td>
	<td><?=$data->nama_panggilan;?></td>
	<td><?=$data->tempat_lahir;?>, <?=$data->tanggal_lahir;?></td>
	<td><a href="<?= Yii::$app->homeUrl ?>/site/lihatkembang?id=<?=$data->id?>&ibu=<?=Yii::$app->user->identity->USER_ID?>">Lihat</a></td>
	</tr>
	
	<?php } ?>
	</table>
</div>
