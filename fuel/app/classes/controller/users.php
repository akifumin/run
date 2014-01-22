<?php
class Controller_Users extends Controller_Index {

        public function action_index ()
        {

                $this->template->title = '一覧';
                $this->template->content = Response::forge(ViewModel::forge('users/index'));
        }
                        
                        
        public function action_update ()
        {


                $user_id = Input::post('user_id');
                $user_name = Input::post('user_name');
                $password = Input::post('password');

                $val = Validation::forge();
                $val->add('user_id', 'ユーザID')
                        ->add_rule('required')
                        ->add_rule('max_length', 20);

                $val->add('user_name', 'ユーザ名')
                        ->add_rule('required');
                $val->add('password', 'パスワード')
                        ->add_rule('required');
                if($val->run())
                {

                        Log::debug('user_id:'.$user_id,' password:'.$password.' userName:'.$user_name);
                
                        list($insert_id, $rows_affected) = DB::insert('users')->set(array(
                                                                                            'user_id' => $user_id,
                                                                                            'password' => $password,
                                                                                            'user_name' => $user_name
                                                                                            ))->execute();
                }
                else
                {
                        Log::debug('validationError::'. implode('; ', $val->error()));
//                   Log::debug(var_dump($vuser_id));
                }

                $this->action_index();
                
//                $this->template->set_global('val', $val);
                
                
        }

        public function action_delete () {

                $user_id = Input::post('user_id');

                $result = DB::delete('users')->where('user_id', '=', $user_id)->execute();

                $this->action_index();
    
        }
 
}
