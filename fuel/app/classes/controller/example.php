<?php



class Controller_Example extends Controller_Template {

    // テンプレートの書き換え
    public $template = 'layout';

    public function action_index () {


        $data = array();
        $this->template->title = 'Example Page';
        $this->template->content = View::forge('example/index', $data);
        // retrun は必要ない afterで共通的にやっている
    }


    public function action_error() {
        $view = View::forge("error");
        return Response::forge($view, 500);
    }
}
