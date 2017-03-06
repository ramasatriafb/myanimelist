<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CariCari */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php if($anime!=null){ ?>
	<h3>Anime</h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
			<th>#</th>
			<th>Title</th>
			<th>Premiered</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($anime as $data): ?>
			<tr>
			<td class="tbl_column_name"><?=$data->ANIME_ID;?></td>
			<td class="tbl_column_name"><?=$data->ANIME_TITLE;?></td>
			<td class="tbl_column_name"><?=$data->PREMIRED;?></td>
			<td><a href="anime/view?id=<?=$data->ANIME_ID;?>">Detail</a></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	<?php } ?>
	<?php if($member!=null){ ?>
	<h3>Member</h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
			<th>#</th>
			<th>Member</th>
			<th>Date Join</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($member as $data): ?>
			<tr>
			<td class="tbl_column_name"><?=$data->MEMBER_ID;?></td>
			<td class="tbl_column_name"><?=$data->MEMBER_NAMA;?></td>
			<td class="tbl_column_name"><?=$data->DATE_JOIN;?></td>
			<td><a href="member/view?id=<?=$data->MEMBER_ID;?>">Detail</a></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	<?php } ?>
	
</div>
