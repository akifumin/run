
<form action="go">
<input type="text" name="name" />
<input type="hidden" name="<?php echo \Config::get('security.csrf_token_key');?>" value="<?php echo \Security::fetch_token();?>" />
   <input type="submit"/>
 </form>


   <!-- フォーム開始  -->
   <?= Form::open('csrf/go')?>
   <?= Form::input('run', '' , array());?>
   <?= Form::hidden(\Config::get('security.csrf_token_key'), \Security::fetch_token(), array('style' => 'border:2px'))?>
   <?= Form::submit('', '送信', array());?>
   <?= Form::close();?>

   <?= phpinfo()?>