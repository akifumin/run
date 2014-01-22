<?php

class Controller_Sample extends Controller {

    public function action_index () {
        // Viewクラスのforgeメソッドでオブジェクト化する
        // 引数にはViewsディレクトリからの相対パスでファイル名を指定
        $view = View::forge("sample");

        // テンプレート変数の割当はメソッドのプロパティとして割り当てる*他にも方法はある
        $view->message = "hello there";

        // ViewクラスはtoString が実装されているのでそのまま文字列として利用可能
        return $view;

    } 

    public function action_2 () {
    
        // forgeメソッドの第二引数に連想配列
        $view = View::forge("sample", array (
                                             "name" => "nishimura"
        ));
      
        // setメソッドを使用
        $view->set("tel", "090-xxxx-xxxx");

        // オブジェクトのプロパティを使用
        $view->message = "hello there";

        return $view;
    }

    public function action_3 () {
    
        $view = View::forge('sample');

        // 第三引数にfalse
        $view-> set("link", "<a href='http://google.com.jp'>link</a>", false);
        $view->set_safe ("link", "<a href='http://google.com'>link</a>");
        return $view;

    }


}
