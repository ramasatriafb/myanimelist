<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = $hariini;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adik-binaan-index">
  
    <h1><?= Html::encode($this->title) ?></h1>
	
	<h3>Pengajar</h3>
    <?= GridView::widget([
        'dataProvider' => $pengajar,
		'layout'=>"{pager}\n{items}\n{summary}",
        'columns' => [
			'PENGAJAR_NAMALENGKAP',
			'PENGAJAR_NOHP',
			'PENGAJAR_ALAMATKOS',
			[
				'class'      => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
					'view' => function ($url, $pengajar) {
						return Html::a('Lihat', $url, [
									'title' => 'Lihat '.$pengajar['PENGAJAR_NAMALENGKAP'],
						]);
					},
				  ],
				'urlCreator' => function ($action, $pengajar, $key, $index) {
					$url = Url::toRoute(['pengajar/view', 'id' => $pengajar['PENGAJAR_ID']]);
					return $url;
				}
			],
        ],
    ]); ?>
	<hr>
	<h3>Adik binaan</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'layout'=>"{pager}\n{items}\n{summary}",
        'columns' => [
			'ADIKBINAAN_NAMALENGKAP',
			'ADIKBINAAN_TEMPATLAHIR',
			'ADIKBINAAN_TANGGALLAHIR',
			[
				'class'      => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
					'view' => function ($url, $dataProvider) {
						return Html::a('Lihat', $url, [
									'title' => 'Lihat '.$dataProvider['ADIKBINAAN_NAMALENGKAP'],
						]);
					},
				  ],
				'urlCreator' => function ($action, $dataProvider, $key, $index) {
					$url = Url::toRoute(['adikbinaan/view', 'id' => $dataProvider['ADIKBINAAN_ID']]);
					return $url;
				}
			],
        ],
    ]); ?>

</div>
