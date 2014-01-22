<?php


class Controller_Templatelevel extends Controller_Template {

    public function action_index (){
 
        // グローバル値を設定
        // 利用される全てのViewオブジェクトに対して変数を割り当てる
        // そのため静的に割り当てる
        View::set_global("user_name", "nishimura");

        
        // 親テンプレートの生成
        $main_view = View::forge("layout");
        $main_view->site_title = "MY SITE";
  
        // 子テンプレートの生成
        $sub_view = View::forge("page");
        $sub_view->blog_title = "ようこそ";
        $sub_view->blog_content = "ようこそ、私のサイトへ！！";

        // 親テンプレートに子テンプレートを割り当てる
        $main_view->content = $sub_view;

        return $main_view;
    }

    public function action_error () {

        $view = View::forge("error/notfound");
  
        $headers = array (
        
                          'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate', 
                          'Expires' => 'Mon, 26 Jul 1997 05:00:00 GMT',
                          'Pragma' => 'no-cache',
        );

        $response = new Response($view, 404, $headers);
 
        return $response;

    }

}