<?php

class Controller_Index extends Controller_Hybrid {


        public function before ()
        {
                parent::before();
                // アクション名を取得
                $request_action = Request::active()->action;
                $request_controller = Request::active()->controller;
                if ($request_action != 'login')
                {
                        // セッションの
                        Log::debug('sessionの確認: '.$request_action.':'.$request_controller);
                        $session = Session::instance();
                        Log::debug('user_id:'.$session->get('user_id'));                        
                        if (! $session->get('user_id'))
                        {
                                /*                              
                                Session::set_flash('ログインしてください');
                                Response::redirect('index/login');
                                exit;
                                */
                        }
                        

                        if(is_object($this->template))
                        {
                                $this->template->user_name = $session->get('user_name');
                        }
                }


        }

        public function after ($response)
        {
                $response = parent::after($response);


                Log::debug('action:'.Request::active()->action.' param:'. implode(',', Input::all()));
//                Log::debug('sql:'. DB::last_query());
                return $response;
                
        }


        public function action_index()
        {
                $this->template->title = 'トップページ';
                $this->template->content =  Response::forge(ViewModel::forge('index/index'));
                
        }

        // ログイン
        public function action_login()
        {
                Log::debug('1:'.Input::method());                
                if (Input::method() == 'POST')
                {
                        Log::debug('2');
                        $user_id = Input::post('user_id');
                        $password = Input::post('password');
                        if (empty($user_id))
                        {
                                Log::debug('3'); 
                                Session::set_flash('error', 'ユーザIDを入力してください');
                        }
                        else if (empty($password))
                        {
                                Log::debug('4');
                                Session::set_flash('error', 'パスワードを入力してください');
                        }       
                        else
                        {
                                Log::debug('5');
                                $user = Model_User::login(Input::post('user_id'), Input::post('password'));
                                if ($user)
                                {
                                        Log::debug('6');
                                        $session = Session::instance();
                                        $session->set('user_id', $user->user_id);
                                        Log::debug('login_user_id:'.$session->get('user_id'));
                                        return Response::redirect('index/index');
                                        
                                }
                                else
                                {
                                        Log::debug('7');
                                        Session::set_flash('error', 'ログインできませんでした' );
                                }
                        }
                }
                Log::debug('8'); 
                      
                return Response::forge(ViewModel::forge('index/login'));
        }

        public function get_logout()
        {
                Session::destroy();
                Session::set_flash('ログアウトしました');
                Response::redirect('index/login');

                
        }

}