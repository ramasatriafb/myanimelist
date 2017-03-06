<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

foreach($profil as $data):
    
$this->title = $data->user_nama;
    
endforeach;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <!--   <h1><?= Html::encode($this->title) ?></h1> -->
<div class="w3_content_agilleinfo_inner">
                        <div class="agile_featured_movies">
                            <div class="inner-agile-w3l-part-head">
                                <h3 class="w3l-inner-h-title">Profile</h3>
                                <p class="w3ls_head_para"></p>
                            </div>
                               <div class="latest-news-agile-info">
                                           
                                  <?php foreach($profil as $data): ?>      
                                        
                                                   <div class="video-grid-single-page-agileits">
                                                        <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?=$data->ava; ?>" alt="" class="img-responsive" style="max-width: 225px;"> 
                                                    </div>


                                                <div class="player-text side-bar-info">
                                                <p class="fexi_header"><?= $data->nama ?></p>
                                                <p class="fexi_header_para"><span >Email<label>:</label></span><?= $data->user_email ?></p>
                                                 <p class="fexi_header_para"><span class="conjuring_w3">Join On<label>:</label></span><?= $data->join ?></p>
                                            <p class="fexi_header_para"><a class="new-more" href="<?= Yii::$app->homeUrl ?>/profile/update?id=<?=$data->id;?>">Edit Photo Profile</a></p>
                                                </div>

                            <!-- agile-comments -->
                        
                        <!-- //agile-comments -->
                        <?php endforeach; ?>
                        </div>
                       
                                   
                                   <div class="clearfix"></div>
                               </div>
                    
                        </div>
                </div>

</div>
