<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'School Genre';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mempunyai-genre-index">

   <div class="w3_content_agilleinfo_inner">
                    <div class="agile_featured_movies">
                        <!--/comedy-movies-->
                    <h3 class="agile_w3_title hor-t"><?=$this->title; ?><span>Anime</span> </h3>
                     <div class="wthree_agile-requested-movies tv-movies">
                     <?php foreach($anime as $data): ?>
                                        <div class="col-md-2 w3l-movie-gride-agile requested-movies">
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
                                                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            <div class="ribben one">
                                                                <p>SCHOOL</p>
                                                            </div>
                                                    </div>
                                                    <?php endforeach;?>
                                            
                                            
                                           
                                            
                                                <div class="clearfix"></div>
                        </div>
            <!--//comedy-movies-->
                    <!--/tv-movies-->
                    <!--//requested-movies-->
                      <div class="blog-pagenat-wthree">
                                <ul>
                                    <li><a class="frist" href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    
                                    <li><a class="last" href="#">Next</a></li>
                                </ul>
                                
                                <!--//requested-movies-->
                  <h3 class="agile_w3_title"> Top Anime <span>Review</span></h3>
            <!--/movies-->              
            <div class="w3_agile_latest_movies">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    
                    <?php foreach($top as $data): ?>
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
                                <p>TOP</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="item">
                    
                       </div>
                    </div>
                    </div>
                    
                        </div></div></div></div>
                    
                    
                    
                    
                    
                    
                    
                    
                       <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page"><span class=""></span></div><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev">prev</div><div class="owl-next">next</div></div></div></div>
                    </div>
                <!--//movies-->
                    </div>
                </div>
                </div>
</div>
