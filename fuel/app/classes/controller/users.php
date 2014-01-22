<?php
class Controller_Users extends Controller_Hybrid {

        public function action_index ()
        {
                
                //$result = DB::query('SELECT * FROM `users`')->execute();
                //$result = DB::select('id', 'name', 'email')->from('users')->execute()->as_array();
                
                //  $view = );
		//    $view->results = $result;
                                $this->template->title = '一覧';
                $this->template->content = Response::forge(ViewModel::forge('users/index'));
        }
                        
                        
        public function action_update ()
        {

                $email = Input::post('email');
                $name = Input::post('name');
    

                //    return $id." : ".$name;

                //    DB::insert('users')->columns(array('id', 'name'))->values(array($id, $name))-execute();
                list($insert_id, $rows_affected) = DB::insert('users')->set(array(
                                                                                    'email' => $email,
                                                                                    'name' => $name))->execute();
                $this->action_index();
        }

        public function action_delete () {

                $id = Input::post('id');

                $result = DB::delete('users')->where('id', '=', $id)->execute();

                $this->action_index();
    
        }
 
}
