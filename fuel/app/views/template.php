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

    <div class="container">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Run!Run!Run!</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo Uri::create('/users'); ?>">User</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo Uri::create('/index/logout');?>">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
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
