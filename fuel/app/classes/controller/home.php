<?php

class Controller_Home extends Controller {

    public function action_index () { 

        $data = array();
        $data ['username'] = 'Joe14';
        $data ['title'] = 'Home';
    
        return View::forge('home/index', $data);

    }


}