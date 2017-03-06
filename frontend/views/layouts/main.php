<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\data\User;

use common\models\datamaster\Anime;

AppAsset::register($this);
 $anime = new Anime();
        $data_anime = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' from anime left join mempunyairating on anime.anime_id = mempunyairating.anime_id group by title order by id desc limit 2")->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href='<?= Yii::$app->homeUrl ?>/movie/css/bootstrap.css' rel="stylesheet" type="text/css" media="all" />
<!-- pop-up -->
<link href='<?= Yii::$app->homeUrl ?>/movie/css/popuo-box.css' rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<link href='<?= Yii::$app->homeUrl ?>/movie/css/easy-responsive-tabs.css' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href='<?= Yii::$app->homeUrl ?>/movie/css/zoomslider.css' />
<link rel="stylesheet" type="text/css" href='<?= Yii::$app->homeUrl ?>/movie/css/style.css' />
<link href='<?= Yii::$app->homeUrl ?>/movie/css/font-awesome.css' rel="stylesheet"> 
<script type="text/javascript" src='<?= Yii::$app->homeUrl ?>/movie/js/modernizr-2.6.2.min.js'></script>
<!--/web-fonts-->
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<?php $this->beginBody() ?>

<div id="demo-1" class="banner-inner">
     <div class="banner-inner-dott">
        <!--/header-w3l-->
               <div class="header-w3-agileits" id="home">
                 <div class="inner-header-agile part2"> 
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a  href="<?= Yii::$app->homeUrl ?>/site"><span>A</span>nime <span>L</span>ist</a></h1>
                    </div>
                    <!-- navbar-header -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                            <li><a href="<?= Yii::$app->homeUrl ?>/site">Home</a></li>
                            <?php
                if (Yii::$app->user->isGuest) { //untuk semua orang sebelum login
                ?>
                <li><a title="Login" href="<?= Yii::$app->homeUrl ?>/site/login">Login</a></li>
                <li><a title="Sign Up" href="<?= Yii::$app->homeUrl ?>/user/create">Sign Up</a></li>

                <?php
                } else {
                ?>
                <?php if(Yii::$app->user->identity->ROLE_ID=='1' ){?>
                            <li><a href="<?=Yii::$app->urlManagerBackEnd->createUrl('/');?>">Admin</a></li>
                <?php } ?>
                <?php if(Yii::$app->user->identity->ROLE_ID=='1' ||Yii::$app->user->identity->ROLE_ID=='2' ){?>
                            <li><a href="<?= Yii::$app->homeUrl ?>/profile">Profile</a></li>
                <?php } ?>
                <?php if(Yii::$app->user->identity->ROLE_ID=='2' ){?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genre <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/action">Action</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/adventure">Adventure</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/comedy">Comedy</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/drama">Drama</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/fantasy">Fantasy</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/horror">Horror</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/mystery">Mystery</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/parody">Parody</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/police">Police</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/psychological">Psychological</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/romance">Romance</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/drama">Drama</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/school">School</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/scifi">Sci-Fi</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/supernatural">Supernatural</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    </li>
                                </ul>
                                </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Review <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    
                                            <li><a href="<?= Yii::$app->homeUrl ?>/review/create">Write a Review</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/review/myreview">My Review</a></li>
                                            
                                        </ul>
                                    
                                    
                                    <div class="clearfix"></div>
                                    </li>
                                
                            <?php } ?>
                            <li>
                <a href="<?= Yii::$app->homeUrl ?>/site/logout">Logout (<?=Yii::$app->user->identity->USER_NAMA;?>)</a>
                </li>
                        </ul>

<?php
                }
                ?>
                    </div>
                    <div class="clearfix"> </div>   
                </nav>
<div class="w3ls_search">
                                    <div class="cd-main-header">
                                        <ul class="cd-header-buttons">
                                            <!-- <li><a class="cd-search-trigger search-is-visible" href="#cd-search"> <span></span></a></li> -->
                                        </ul> <!-- cd-header-buttons -->
                                    </div>
                                    <div id="cd-search" class="cd-search is-visible">
                                        <form action="<?= Yii::$app->homeUrl ?>/search" method="get">
                                                <input name="search" type="search" placeholder="Search...">
                                        </form>
                                    </div>
                                </div>
                <!-- <div class="w3ls_search">
                                    <div class="cd-main-header">
                                        <ul class="cd-header-buttons">
                                        
                                        </ul> 
                                    </div>
                                        
                                            <form action="<?= Yii::$app->homeUrl ?>/search" method="get">
                                                <input name="search" type="search" placeholder="Search...">
                                                <button type='submit' id='search-btn' ><i class="fa fa-search"></i></button>
                                            </form>
                                        
                                </div> -->

                
    
            </div> 
               </div>
        <!--//header-w3l-->
        </div>
    </div>

     <!--/banner-section-->
 <!--//main-header-->
             <!--/banner-bottom-->
              <div class="w3_agilits_banner_bootm">
                 <div class="w3_agilits_inner_bottom">
                        
                        
                </div>
            </div>
            <!--//banner-bottom-->
             <!-- Modal1 -->
                

        
        <div class="w3_content_agilleinfo_inner">
                    <div class="agile_featured_movies">
            <?=$content;?>
            </div>
            </div>  

        <div class="contact-w3ls" id="contact">
            <div class="footer-w3lagile-inner">
                <h2>Sign up for our <span>Newsletter</span></h2>
                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae eros eget tellus 
                    tristique bibendum. Donec rutrum sed sem quis venenatis.</p>
                <div class="footer-contact">
                    <form action="#" method="post">
                        <input type="email" name="Email" placeholder="Enter your email...." required=" ">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                    <div class="footer-grids w3-agileits">
                        <div class="col-md-2 footer-grid">
                        <h4>Release</h4>
                            <ul> 
                                <li><a href="#" title="Release 2016">2016</a></li> 
                                <li><a href="#" title="Release 2015">2015</a></li>
                                <li><a href="#" title="Release 2014">2014</a></li> 
                                <li><a href="#" title="Release 2013">2013</a></li> 
                                <li><a href="#" title="Release 2012">2012</a></li>
                                <li><a href="#" title="Release 2011">2011</a></li> 
                            </ul>
                        </div>
                                <div class="col-md-2 footer-grid">
                        <h4>Anime</h4>
                            <ul>
                                
                                <li><a href="<?= Yii::$app->homeUrl ?>/genre/comedy">Comedy</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/drama">Drama</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/fantasy">Fantasy</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/horror">Horror</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/mystery">Mystery</a></li>
                                            
                                
                            </ul>
                        </div>
                

                            <div class="col-md-2 footer-grid">
                                <h4>Review Anime</h4>
                                    <ul class="w3-tag2">
                                    <li><a href="<?= Yii::$app->homeUrl ?>/genre/action">Action</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/adventure">Adventure</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/comedy">Comedy</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/drama">Drama</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/fantasy">Fantasy</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/horror">Horror</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/mystery">Mystery</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/parody">Parody</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/police">Police</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/psychological">Psychological</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/romance">Romance</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/drama">Drama</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/school">School</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/scifi">Sci-Fi</a></li>
                                            <li><a href="<?= Yii::$app->homeUrl ?>/genre/supernatural">Supernatural</a></li>
                                </ul>


                        </div>
                                <div class="col-md-2 footer-grid">
                        <h4>Latest Anime</h4>
                        <?php foreach($data_anime as $data): ?>
                            <div class="footer-grid1">
                                <div class="footer-grid1-left">
                                    <a href="<?= Yii::$app->homeUrl ?>/anime/detail?id=<?=$data->id;?>" class="hvr-sweep-to-bottom"><img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/anime/<?=$data->pict; ?>" class=" img-responsive" alt="Ava User">
                                </div>
                                <div class="footer-grid1-right">
                                    <a href="<?= Yii::$app->homeUrl ?>/anime/detail?id=<?=$data->id;?>"><?= $data->title;?></a>
                                    
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                    <?php endforeach;?>
                            
                            
                            

                        </div>
                        <div class="col-md-2 footer-grid">
                           <h4 class="b-log"><a href="index.html"><span>A</span>nime <span>L</span>ist</a></h4>
                            <div class="footer-grid-instagram">
                            
                                
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                        <ul class="bottom-links-agile">
                                <li><a href="icons.html" title="Font Icons">Icons</a></li> 
                                <li><a href="short-codes.html" title="Short Codes">Short Codes</a></li> 
                                <li><a href="contact.html" title="contact">Contact</a></li> 
                                
                            </ul>
                    </div>
                    <h3 class="text-center follow">Connect <span>Us</span></h3>
                        <ul class="social-icons1 agileinfo">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>   
                    
             </div>
                        
            </div>    

<?php $this->endBody() ?>
<div class="w3agile_footer_copy">
                    <p>© 2017 AnimeList. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
                    <p>M. Ramasatria Firmansyah | 2110165007</p>
    </div>
<!-- #page -->
        <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src='<?= Yii::$app->homeUrl ?>/movie/js/jquery-1.11.1.min.js'></script>
    <!-- Dropdown-Menu-JavaScript -->
            <script>
                $(document).ready(function(){
                    $(".dropdown").hover(            
                        function() {
                            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                            $(this).toggleClass('open');        
                        },
                        function() {
                            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                            $(this).toggleClass('open');       
                        }
                    );
                });
            </script>
        <script src='<?= Yii::$app->homeUrl ?>/movie/js/jquery.magnific-popup.js' type="text/javascript"></script>

        <div id="small-dialog1" class="mfp-hide">
        <!-- <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe> -->
    </div>
    <div id="small-dialog2" class="mfp-hide">
        <!-- <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe> -->
    </div>

    <script>
        $(document).ready(function() {
        $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
                                                                        
        });
    </script>
<script src='<?= Yii::$app->homeUrl ?>/movie/js/easy-responsive-tabs.js'></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<link href='<?= Yii::$app->homeUrl ?>/movie/css/owl.carousel.css' rel="stylesheet" type="text/css" media="all">
<script src='<?= Yii::$app->homeUrl ?>/movie/js/owl.carousel.js'></script>
<script>
    $(document).ready(function() { 
        $("#owl-demo").owlCarousel({
     
         autoPlay: 3000, //Set AutoPlay to 3 seconds
          autoPlay : true,
           navigation :true,

          items : 5,
          itemsDesktop : [640,4],
          itemsDesktopSmall : [414,3]
     
        });
     
    }); 
</script> 

<!--/script-->
<script type="text/javascript" src='<?= Yii::$app->homeUrl ?>/movie/js/move-top.js'></script>
<script type="text/javascript" src='<?= Yii::$app->homeUrl ?>/movie/js/easing.js'></script>

<script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
                });
            });
</script>
 <script type="text/javascript">
                        $(document).ready(function() {
                            /*
                            var defaults = {
                                containerID: 'toTop', // fading element id
                                containerHoverID: 'toTopHover', // fading element hover id
                                scrollSpeed: 1200,
                                easingType: 'linear' 
                            };
                            */
                            
                            $().UItoTop({ easingType: 'easeOutQuart' });
                            
                        });
                    </script>
<!--end-smooth-scrolling-->
    <script src='<?= Yii::$app->homeUrl ?>/movie/js/bootstrap.js'></script>

 

</body>
</html>
<?php $this->endPage() ?>
