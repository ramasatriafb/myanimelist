<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

    
$this->title ='My Review';
    

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

 <div class="inner-agile-w3l-part-head">
                                <h3 class="w3l-inner-h-title">Latest <?= $this->title ?> Anime</h3>
                                <p class="w3ls_head_para">Add short Description</p>
                            </div>
                            <?php foreach($myreview as $data): ?>
                            <div class="latest-news-agile-info">
                                   <div class="col-md-12 latest-news-agile-left-content">
                                            <div class="w3-agileits-news-one">
                                                <div class="wthree-news-img">
                                                    <a href="news-single.html"><img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>" alt=""></a>
                                                </div>
                                                
                                                <div class="wthree-news-info">
                                                    <h5><a href="news-single.html"><?= $data->title ?></a></h5>
                                                    <div class="agile-post">
                                                            by <a href="#" title="w3ls" rel="author"><?= $data->user ?></a> on <?= $data->date_review ?> <a href="#">2 comments</a>
                                                        </div>
                                                        <p><?= substr($data->review,0,500); ?></p>
                                                        <a class="new-more" href="<?= Yii::$app->homeUrl ?>/review/read?id=<?=$data->id;?>">Read More</a>
                                                        <?php if(Yii::$app->user->identity->USER_ID== $data->user_id ){?>
                            <a class="new-more" href="<?= Yii::$app->homeUrl ?>/review/update?id=<?=$data->id;?>">Edit</a>
                <?php } ?>
                                                        
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>              
                                   </div>
                                   
                                        
                                   
                                   <div class="clearfix"></div>
                               </div>

                    <?php endforeach;?>
</div>
