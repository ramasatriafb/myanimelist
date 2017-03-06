<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

foreach($anime as $data):
    
$this->title = $data->title;
    
endforeach;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">
<?php foreach($review as $data): ?>
   <div class="w3_content_agilleinfo_inner">
                        <div class="agile_featured_movies">
                            <div class="inner-agile-w3l-part-head">
                                <h3 class="w3l-inner-h-title"><?= $data->title ?></h3>
                                <p class="w3ls_head_para">Review</p>
                            </div>
                               <div class="latest-news-agile-info">
                                   <div class="col-md-8 latest-news-agile-left-content">
                                            <div class="single video_agile_player">
                                                   
                                                   <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>">
                                                     <h4>Review.</h4>
                                                     <div class="agile-post">
                                                            by <a href="#" title="w3ls" rel="author"><?= $data->user ?></a> on   <?= $data->date_review ?> with <a href="#"><?= $data->jumlah_komentar ?> comments</a>
                                                        </div>
                                                     <p><?= $data->review ?></p>
                                                     
                                            </div>
                                                
                                        
                                        <div class="response">
                            
                            <!-- agile-comments -->

                        <div class="agile-news-comments">
                            <div class="agile-news-comments-info">
                                 <h4>LEAVE A COMMENT</h4>
                                                <div class="agile-info-wthree-box">
                                                    <?php $form = ActiveForm::begin([
                                                         'id' => 'comment-form',
        ]); ?>
<div class="col-md-12 form-info">
  
    <?= $form->field($komentar, 'KOMENTAR')->label('Comment')->textarea(['rows' => 6]) ?>

   <input type="submit" value="SEND">

    <?php ActiveForm::end(); ?>
                                                         
                                                       
                                                     </div>
                                                     <div class="clearfix"> </div>
                                                        
                                                        
                                                    </form>
                                                </div><?php endforeach; ?>
                            </div>
                        </div>
                        <!-- //agile-comments -->

                        </div>
                        <div class="admin-text"><?php foreach($user as $data): ?>
                                                <h5>WRITTEN BY <?= $data->user ?></h5>
                                                <div class="admin-text-left">
                                                    <a href="#"><img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?= $data->ava; ?>" alt=""></a>
                                                </div>
                                                <div class="admin-text-right">
                                                   
                                                    <span>View all posts by :<a href="<?= Yii::$app->homeUrl ?>/review/userreview?id=<?=$data->user_id;?>"> <?= $data->user ?> </a></span>
                                                </div>
                                                <div class="clearfix"> </div>
                                        </div>
                                         <?php endforeach; ?>

                                   </div>
                                   <div class="response">
                            <h4>COMMENT</h4>
                            <div class="media response-info">
                               
                             <div class="media response-info">
                             <?php foreach($komen as $data): ?>

                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?= $data->ava; ?>" alt="" class="img-responsive" style="max-width: 50px;">
                                    </a>
                                    <h5><a href="#"><?= $data->user ?></a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p><?= $data->komentar ?>.</p>
                                    <ul>
                                        <li><?= $data->date ?></li>
                                    </ul>       
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
                                   <div class="clearfix"></div>
                               </div>
                    
                        </div>
                </div>
</div>
