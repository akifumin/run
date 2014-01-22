<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title><?=$site_title?></title>
</head>

<body>
   <!-- ここにView::forge('example/index', $data)の内容が入る-->
   <?=$content?>

    
     <div><?= View::get('user_name');?></div>
</body>
</html>