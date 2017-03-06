<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\data\User;

use common\models\datamaster\Anime;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>AnimeList <?= Html::encode($this->title) ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= Yii::$app->homeUrl ?>/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?= Yii::$app->homeUrl ?>/static/dist/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- CKEDITOR -->
<script src='<?= Yii::$app->homeUrl ?>/static/plugins/ckeditor/ckeditor.js'></script>
    <!-- Ionicons -->
    <link href="<?= Yii::$app->homeUrl ?>/static/dist/css/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?= Yii::$app->homeUrl ?>/static/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?= Yii::$app->homeUrl ?>/static/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?= Yii::$app->homeUrl ?>/static/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= Yii::$app->homeUrl ?>/static/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= Yii::$app->homeUrl ?>/static/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <!-- ChartJS 1.0.1 -->
    <script src="<?= Yii::$app->homeUrl ?>/static/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
      <!-- jQuery 2.1.3 -->
    <script src="<?= Yii::$app->homeUrl ?>/static/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
    <script src="<?= Yii::$app->homeUrl ?>/static/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
      <header class="main-header">
    <!--PENTING!!-->
    <!--<img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava.png" class=" img-responsive" >-->
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">AL</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>AnimeList</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navigasi</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>uploads/img/ava/<?=Yii::$app->user->identity->USER_AVATAR;?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=Yii::$app->user->identity->USER_NAMA;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?= Yii::$app->urlManagerFrontEnd->createUrl('/');?>/uploads/img/ava/<?=Yii::$app->user->identity->USER_AVATAR;?>" class="img-circle" alt="User Image" />
                    <p>
                      <?=Yii::$app->user->identity->USER_NAMA;?>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?= Yii::$app->homeUrl ?>/user/profile" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= Yii::$app->homeUrl ?>/site/logout" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>

     
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form -->
          <form action="<?= Yii::$app->homeUrl ?>/search" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Main Menu</li>
      
      <li class="treeview <?php if($this->params['menu']=='dasbor'){ echo 'active'; } ?>">
              <a href="<?= Yii::$app->homeUrl ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
      
            
      <li class="treeview <?php if($this->params['menu']=='data'){ echo 'active'; } ?>">
              <a href="">
                <i class="fa fa-book"></i> <span>Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
        <ul class="treeview-menu">
                <li><a href="<?= Yii::$app->homeUrl ?>/anime"><i class="fa fa-circle-o"></i>Anime</a></li>
        <li><a href="<?= Yii::$app->homeUrl ?>/genre"><i class="fa fa-circle-o"></i>Genre</a></li>
                <li><a href="<?= Yii::$app->homeUrl ?>/review"><i class="fa fa-circle-o"></i>Review</a></li>
              </ul>
            </li>
       <?php if((Yii::$app->user->identity->ROLE_ID)=='1'){ ?>
      <li class="treeview <?php if($this->params['menu']=='user'){ echo 'active'; } ?>">
        <a href=""> 
                <i class="fa fa-group"></i> <span>User Data</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
                <li><a href="<?= Yii::$app->homeUrl ?>/user"><i class="fa fa-circle-o"></i>Data User</a></li>

        <li><a href="<?= Yii::$app->homeUrl ?>/admin"><i class="fa fa-circle-o"></i> Admin Data</a></li>
                <li><a href="<?= Yii::$app->homeUrl ?>/member"><i class="fa fa-circle-o"></i> Member Data</a></li>
        </ul>
            </li>
      
        <?php } ?>
      <li class="treeview <?php if($this->params['menu']=='transaksi'){ echo 'active'; } ?>">
              <a href="">
                <i class="fa fa-book"></i> <span>Manajemen</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
        <ul class="treeview-menu">
                <li><a href="<?= Yii::$app->homeUrl ?>/manajemen-genre"><i class="fa fa-circle-o"></i>Manajemen Genre Anime</a></li>
        <li><a href="<?= Yii::$app->homeUrl ?>/manajemen-rating"><i class="fa fa-circle-o"></i>Manajemen Rating Anime</a></li>
              </ul>
            </li>
      
      
      
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
    <?=$content;?>
        </section><!-- /.content -->
      </div>

<?php $this->endBody() ?>
<footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>AnimeList</strong>  - M.Ramasatria F - 2110165007
      </footer>
      <div class='control-sidebar-bg'></div>

    </div><!-- ./wrapper -->
    <!-- FastClick -->
    <script src='<?= Yii::$app->homeUrl ?>/static/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?= Yii::$app->homeUrl ?>/static/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= Yii::$app->homeUrl ?>/static/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
  

</body>
</html>
<?php $this->endPage() ?>
