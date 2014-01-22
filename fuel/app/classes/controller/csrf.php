<?php
class Controller_Csrf extends Controller {

  public function action_index () {

    return View::forge("csrf/index");
    //    return \Form::csrf();       /*  */
  }

  public function action_go ()
  {
    if ($_POST)
      {
        // CSRF トークンが正しいかチェック
        if ( ! \Security::check_token())
          {
            // CSRF 攻撃または CSRF トークンの期限切れ
            return "token_invalidable";
          }
        else
          {
            // トークンは正しいので、フォームの入力を処理する
            return "token_valiable";
            

          }
      }
  
  }
 
}