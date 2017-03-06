<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'AnimeList';

?>
<div class="site-index">
	<h3 class="agile_w3_title"> Latest <span>Anime</span></h3>
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


				    <div class="inner-agile-w3l-part-head">
					            <h3 class="w3l-inner-h-title">Latest Review Anime</h3>
								<p class="w3ls_head_para">Add short Description</p>
							</div>
							<?php foreach($review as $data): ?>
							<div class="latest-news-agile-info">
								   <div class="col-md-12 latest-news-agile-left-content">
											<div class="w3-agileits-news-one">
												<div class="wthree-news-img">
													<a href="<?= Yii::$app->homeUrl ?>/anime/detail?id=<?=$data->id_anime;?>"><img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>" alt=""></a>
												</div>
												
												<div class="wthree-news-info">
													<h5><a href="news-single.html"><?= $data->title ?></a></h5>
													<div class="agile-post">
															by <a href="#" title="w3ls" rel="author"><?= $data->user ?></a> on <?= $data->date_review ?> <a href="#"><?= $data->jumlah_komentar ?> comments</a>
														</div>
														<p><?= substr($data->review,0,500); ?></p>
														<a class="new-more" href="<?= Yii::$app->homeUrl ?>/review/read?id=<?=$data->id;?>">Read More</a>
												</div>
												<div class="clearfix"> </div>
											</div>				
								   </div>
								 


								  
								   <div class="clearfix"></div>
							   </div>

					<?php endforeach;?>
					<div class="latest-news-agile-info">
								   <div class="col-md-12 latest-news-agile-left-content">
											<div class="w3-agileits-news-one">
												<div class="wthree-news-img">
													<!-- <a href="<?= Yii::$app->homeUrl ?>/anime/detail?id=<?=$data->id_anime;?>"><img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>" alt=""></a> -->
												</div>
												
												<div class="wthree-news-info">
													<!-- <h5><a href="news-single.html"><?= $data->title ?></a></h5>
													<div class="agile-post">
															by <a href="#" title="w3ls" rel="author"><?= $data->user ?></a> on <?= $data->date_review ?> <a href="#">2 comments</a>
														</div>
														<p><?= substr($data->review,0,500); ?></p> -->
														<a class="new-more" href="<?= Yii::$app->homeUrl ?>/review/all ">More Review</a>
												</div>
												<div class="clearfix"> </div>
											</div>				
								   </div>
								 


								  
								   <div class="clearfix"></div>
							   </div>
						<!--  <div class="blog-pagenat-wthree">
                                <ul>
                                    <li><a class="frist" href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    
                                    <li><a class="last" href="<?php 
									$pages->route = 'site/index';echo $pages->createUrl(2);?>">Next</a></li>
                                </ul>
                         </div>  -->
							   
</div> 