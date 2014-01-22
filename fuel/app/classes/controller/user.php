<?php

class Controller_User extends Controller_Rest {


    // 常にJSONで返す
    // REST リクエストで、返す結果のフォーマットを判定する際に、HTTP_ACCEPT ヘッダー        
    // パースするかどうか。                                                                 
    // trueにすると$rest_formatの形式で返すようになる
    //  'ignore_http_accept' => false,

    public $rest_format = "json";
    
    public function get_list () {



        return $this->response(array(
                                     'foo' => Input::get('foo'),
                                     'baz' => array(
                                                    1, 50, 219
                                                    ),
            'empty' => null
                                     ));


        /*
        $user = Model_User::get($id);



        $array = array('name' => $user->name);
        retrun $this->response($array);
        retrun $this->response(array(
                                     'name' => $user->name,
                                     'email' => $user->mail,
        ));
        */
    }

}