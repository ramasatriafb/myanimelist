<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                                                            by <a href="#" title="w3ls" rel="author"><?= $data->user ?></a> on   <?= $data->date_review ?> with <a href="#">2 comments</a>
                                                        </div>
                                                     <p><?= $data->review ?></p>
                                                     <?php endforeach; ?>
                                            </div>
                                                
                                        
                                        <div class="response">
                            
                            <!-- agile-comments -->
                        <div class="agile-news-comments">
                            <div class="agile-news-comments-info">
                                <h4>Comments</h4>
                                <div class="fb-comments" data-href="https://w3layouts.com/" data-width="100%" data-numposts="5"></div>
                            </div>
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
                        <div class="all-comments-info">
                                                 <h5>LEAVE A COMMENT</h5>
                                                <div class="agile-info-wthree-box">
                                                    <form>
                                                       <div class="col-md-6 form-info">
                                                        <input type="text" name="name" placeholder="Your Name" required="">                                        
                                                        <input type="email" name="email" placeholder="Your Email" required="">
                                                        <input type="text" name="phone" placeholder="Your Phone" required="">   
                                                      </div>
                                                       <div class="col-md-6 form-info">
                                                        
                                                        <textarea placeholder="Message" required=""></textarea>
                                                        <input type="submit" value="SEND">
                                                     </div>
                                                     <div class="clearfix"> </div>
                                                        
                                                        
                                                    </form>
                                                </div>
                                            </div>
                        <!-- //agile-comments -->

                        </div>
                        

                                   </div>
                                    <div class="agile-news-comments">
                            <div class="agile-news-comments-info">
                                <h4>Comments</h4><?php foreach($user as $data): ?>
                                <div class="fb-comments" data-href="https://w3layouts.com/" data-width="100%" data-numposts="5"></div>
                                <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?= $data->ava; ?>"  style="max-width: 100px;"alt="">
                                    </a>
                                    <h5><a href="#">Admin</a></h5>
                                </div> <?php endforeach; ?>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.There are many variations of passages of Lorem Ipsum available.</p>
                                    <ul>
                                        <li>October 15, 2016</li>
                                        <li><a href="single.html"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a></li>
                                    </ul>
                                    
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            </div>
                                   <div class="clearfix"></div>
                               </div>
                    
                        </div>
                </div>
</div>
