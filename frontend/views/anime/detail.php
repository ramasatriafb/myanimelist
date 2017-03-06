<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\datamaster\Anime */
/* @var $form yii\widgets\ActiveForm */
foreach($anime as $data):
    
$this->title = $data->title;
    
endforeach;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anime-detail">

<div class="w3_content_agilleinfo_inner">
                        <div class="agile_featured_movies">
                            <div class="inner-agile-w3l-part-head">
                                <h3 class="w3l-inner-h-title"><?= $this->title ?></h3>
                                <p class="w3ls_head_para"></p>
                            </div>
                               <div class="latest-news-agile-info">
                                           
                                  <?php foreach($anime as $data): ?>      
                                        
                                                   <div class="video-grid-single-page-agileits">
                                                        <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>" alt="" class="img-responsive" style="max-width: 225px;"> 
                                                    </div>


                                                <div class="player-text side-bar-info">
                                                <p class="fexi_header"><?= $data->title;?></p>
                                                <p class="fexi_header_para"><span >Episodes<label>:</label></span><?= $data->episode; ?></p>
                                                 <p class="fexi_header_para"><span>Premiered<label>:</label></span><?= $data->premired; ?></p>
                                                   <p class="fexi_header_para"><span>Genre<label>:</label></span><?= $data->genre; ?></p>
                                               
                                                    
                                                 
                                                  <p class="fexi_header_para"><span >Synopsis<label>:</label></span><?= $data->synopsis; ?></p>
                                               <p class="fexi_header_para"><span class="conjuring_w3">Rating<label>:</label></span><?= $data->rating; ?></p>
                                            <p class="fexi_header_para"><a class="new-more" href="<?= Yii::$app->homeUrl ?>/rating/create?id=<?=$data->id;?>">Give a Rating</a></p>
                                               <?php endforeach; ?>

                                                
 </div>
                            <!-- agile-comments -->
                        
                        <!-- //agile-comments -->
                        
                        </div>
                       
                                   
                        <div class="response">
                            <h4>Review</h4>
                                <?php foreach($review as $data): ?>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?= $data->ava; ?>" alt="" style="max-width: 225px;"">
                                    </a>
                                    <h5><a href="#"><?= $data->user ?></a></h5>
                                      <p><?= $data->date_review ?></p>
                                </div>
                                <div class="media-body response-text-right">
                                    <p> <?= substr($data->review,0,500);?></p>
                                    <a class="new-more" href="<?= Yii::$app->homeUrl ?>/review/read?id=<?=$data->id;?>">Read More</a>
                                      
                                    </ul>       
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                             <?php endforeach; ?>      
                    
                        </div>
                </div>
</div>