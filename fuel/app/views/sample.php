<?php
// fuel/app/views/sample.php
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>MY SITE</title>
</head>

<body>
  <h1>HELLO WORLD</h1>
     <?php if(isset($message)):?>
     <p><?=$message?></p>
     <?php else:?>
     <p>IT WORKS!!</p>
     <?php endif;?>

     <?php if(isset($name)):?>
         <p>name:<?=$name?></p>
     <?php endif;?>

     <?php if(isset($tel)):?>
         <p>tel:<?=$tel?></p>
     <?php endif;?>

     <?php if(isset($message)):?>
         <p>message:<?=$message?></p>
     <?php endif;?>

     <?php if(isset($link)):?>
         <p>message:<?=$link?></p>
     <?php endif;?>
</body>
</html>
     
  