<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <!-- Bootstrap core CSS -->
    <?php echo Asset::css('bootstrap.min.css'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo Asset::js('html5shiv.js'); ?>
    <?php echo Asset::js('respond.min.js'); ?>
    <![endif]-->
    
  </head>

  
  <body>

    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collase">
            <span class=icon-bar"></span>
            <span class=icon-bar"></span>
            <span class=icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo Uri::base();?>">Run</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul span="nav navbar-nav">
            <li ><a href="<?php echo Uri::create('/users') ?>">ユーザ管理</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo Uri::create('/index/logout');?>">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?=$content?>
      </div>
    </div>
    

  </body>


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <?php echo Asset::js('jquery.js'); ?>
  <?php echo Asset::js('jquery.json-2.4.min.js'); ?>
  <?php echo Asset::js('bootstrap.min.js'); ?>
  <?php echo Asset::js('site.js'); ?>
  <script type="text/javascript">
   $(function() {
     $(".dropdown-toggle").dropdown();
     $(".alert").alert();
   });
  </script>
  <?php echo Asset::render('add_js'); ?>
</html>
