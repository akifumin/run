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

                Log::debug('user_id:'.$user_id,' password:'.$password.' userName:'.$user_name);
                
                list($insert_id, $rows_affected) = DB::insert('users')->set(array(
                                                                                    'user_id' => $user_id,
                                                                                    'password' => $password,
                                                                                    'user_name' => $user_name
                                                                                    ))->execute();
                $this->action_index();
        }

        public function action_delete () {

                $user_id = Input::post('user_id');

                $result = DB::delete('users')->where('user_id', '=', $user_id)->execute();

                $this->action_index();
    
        }
 
}
