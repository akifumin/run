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
                        $session = Session::instance();
                        if (! $session->get('user_id'))
                        {
                                Session::set_flash('ログインしてください');
                                Response::redirect('index/login');
                                exit;
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
                Log::debug('sql:'. DB::last_query());
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
                
                if (Input::method() == 'POST')
                {
                        $user_id = Input::post('user_id');
                        $password = Input::post('password');
                        if (empty($user_id))
                        {
                                Session::set_flash('error', 'ユーザIDを入力してください');
                        }
                        else if (empty($password))
                        {
                                Session::set_flash('error', 'パスワードを入力してください');
                        }       
                        else
                        {
                                
                                $user = Model_User::login(Input::post('user_id'), Input::post('password'));
                                if ($user)
                                {
                                        $session = Session::instance();
                                        $session->set('user_id', $user->user_id);
                                        return Response::redirect('index/index');
                                }
                                else
                                {
                                        Session::set_flash('error', 'ログインできませんでした' );
                                }
                        }
                }
                      
                return Response::forge(ViewModel::forge('index/login'));
        }

        public function get_logout()
        {
                Session::destroy();
                Session::set_flash('ログアウトしました');
                Response::redirect('index/login');

                
        }

}