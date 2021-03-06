<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf8">
    <title>ログイン</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <?php echo Asset::css('bootstrap.min.css'); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo Asset::js('html5shiv.js'); ?>
    <?php echo Asset::js('respond.min.js'); ?>
    <![endif]-->
    <style type="text/css">
     body {
       padding-top: 40px;
       padding-bottom: 40px;
       background-color: #eee;
     }

     .form-signin {
       max-width: 330px;
       padding: 15px;
       margin: 0 auto;
     }
     .form-signin .form-signin-heading,
     .form-signin .checkbox {
       margin-bottom: 10px;
     }
     .form-signin .checkbox {
       font-weight: normal;
     }
     .form-signin .form-control {
       position: relative;
       font-size: 16px;
       height: auto;
       padding: 10px;
       -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
       box-sizing: border-box;
     }
     .form-signin .form-control:focus {
       z-index: 2;
     }
     .form-signin input[type="text"] {
       margin-bottom: -1px;
       border-bottom-left-radius: 0;
       border-bottom-right-radius: 0;
     }
     .form-signin input[type="password"] {
       margin-bottom: 10px;
       border-top-left-radius: 0;
       border-top-right-radius: 0;
     }
    </style>
  </head>
  <body>

    <div class="container">
      <?php if (Session::get_flash('success')): ?>
        <div class="alert alert-success">
          <a class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
          <span>
            <?php echo implode('</span><span>', e((array) Session::get_flash('success'))); ?>
          </span>
        </div>
      <?php endif ?>
      
      <?php if (Session::get_flash('error')): ?>
        <div class="alert alert-danger">
          <a class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
          <span>
            <?php echo implode('</span><span>', e((array) Session::get_flash('error'))); ?>
          </span>
        </div>
      <?php endif ?>

      <?php echo Form::open(array('action' => 'index/login', 'class' => 'form-signin', 'method' => 'POST')); ?>
      <h2 class="form-signin-heading">ログインしてください</h2>
      <input type="text" name="user_id" class="form-control" placeholder="Uer ID" autofocus>
      <input type="password" name="password" class="form-control" placeholder="パスワード">
      <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
      <?php echo Form::close(); ?>

    </div>

    
