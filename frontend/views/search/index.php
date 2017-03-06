<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'AnimeList';

?>
<div class="site-index">
	<h3 class="agile_w3_title"> Result <span>Anime</span></h3>
	<!-- Main content -->
<div class="w3_agile_latest_movies">
			
				<div id="owl-demo" class="owl-carousel owl-theme">
					
					<?php foreach($anime as $data): ?>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="<?= Yii::$app->homeUrl ?>/anime/detail?id=<?=$data->id;?>" class="hvr-sweep-to-bottom"><img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>" class=" img-responsive" alt="Ava User">
								<div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="<?= Yii::$app->homeUrl ?>/anime/detail?id=<?=$data->id;?>"><?= $data->title;?></a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p><?= $data->rating;?></p><i><?= $data->user ?> users</i>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben one">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<div class="item">
					
					   </div>
				    </div>


				   
							   
</div>