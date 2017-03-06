<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\data\AdikBinaan */

foreach($dataraw as $data){
	$this->title = $data->nama_lengkap;
}
$this->params['breadcrumbs'][] = ['label' => 'Adik Binaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$jenjang;

?>
<div class="adik-binaan-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<table class="table table-striped table-bordered">
	<?php foreach($dataraw as $data){ ?>
	<tr>
	<td colspan="2" align='center'>
    <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>uploads/img/adikbinaan/<?=$data->foto; ?>" class=" img-responsive" alt="Foto Adik Binaan" style="max-width: 300px;">
	</td>
	</tr>
	<tr>
	<td>Nama Lengkap </td><td><?=$data->nama_lengkap;?></td>
	</tr>
	<tr>
	<td>Nama Panggilan </td><td><?=$data->nama_panggilan;?></td>
	</tr>
	<tr>
	<td>Tempat dan Tanggal Lahir </td><td><?=$data->tempat_lahir;?>, <?=$data->tanggal_lahir;?></td>
	</tr>
	<tr>
	<td>Jenis Kelamin </td><td><?=$data->jenis_kelamin;?></td>
	</tr>
	<tr>
	<td>Jenjang </td><td><?php $jenjang = $data->jenjang; echo $jenjang?></td>
	</tr>
	<tr>
	<td>TPQ </td><td><?=$data->tpq;?></td>
	</tr>
	<tr>
	<td>Sekolah </td><td><?=$data->sekolah;?></td>
	</tr>
	<tr>
	<td>Nama Ibu </td><td><?=$data->ibu;?></td>
	</tr>
	<tr>
	<td>Alamat </td><td><?=$data->alamat;?></td>
	</tr>
	<tr>
	<?php } ?>
	</table>
	
	<div class="row">
        <h3 class="box-title">Kehadiran</h3>
            <!--<div class="box-body">
                <div class="chart">
                <canvas id="kehadiran" height="230"></canvas>
                </div>
            </div><!-- /.box-body -->
			<?= GridView::widget([
				'dataProvider' => $hadir,
				'columns' => [
					'tanggal',
					'keterangan',
					],
			]); ?>
    </div><!-- /.row -->
	
	<div class="row">
        <h3 class="box-title">Ketercapaian</h3>
            <!--<div class="box-body">
                <div class="chart">
                <canvas id="ketercapaian" height="230"></canvas>
                </div>
            </div><!-- /.box-body -->

		<?php if($jenjang!='QURAN'){?>
		<div class="progress" style="height:40px;">
		  <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: <?= number_format($capaipersen->persen,0);?>%;">	<h4><?=$capaipersen->iqro_jilid;?> : <?= number_format($capaipersen->persen,0);?>%</h4> </div>
		</div>
		<?= GridView::widget([
			'dataProvider' => $capai,
			'columns' => [
				'tanggal',
				'iqro',
				'hal',
				'ket',
				'kel',
				'pengajar',
				],
		]); ?>
		<?php }else{ ?>
		<div class="progress" style="height:40px;">
		  <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: <?= number_format($capaipersen->persen,0);?>%;">	<h4><?= number_format($capaipersen->persen,0);?>%</h4> </div>
		</div>
		<?= GridView::widget([
			'dataProvider' => $capai,
			'columns' => [
				'tanggal',
				'surah',
				'hal',
				'juz',
				'ayat',
				'ket',
				'kel',
				'pengajar',
				],
		]); ?>
		<?php } ?>
    </div><!-- /.row -->
	
	<div class="row">
        <h3 class="box-title">Hafalan Surah</h3>
		<?= GridView::widget([
        'dataProvider' => $hafalan,
        'columns' => [
            'nama_surah',
			[
				'content' => function ($hafalan, $key, $index, $column) {
					return 
					'<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: '.$hafalan['persen'].'%;">'.number_format($hafalan['persen'],0).'% </div>
					</div>';
				},
			],
        ],
    ]); ?>
    </div><!-- /.row -->
	
	<div class="row">
        <h3 class="box-title">Prestasi</h3>
		<?= GridView::widget([
        'dataProvider' => $prestasi,
        'columns' => [

            'prestasi',
			'tanggal',
			'lokasi',
        ],
    ]); ?>
    </div><!-- /.row -->
	
</div>
