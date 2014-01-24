<?php
class Controller_Users extends Controller_Index {

        public function action_index ()
        {

                $this->template->title = '一覧';
                $this->template->content = Response::forge(ViewModel::forge('users/index'));
        }

        public function action_new ()
        {

                $this->template->title = '利用者新規作成';
                $this->template->content = Response::forge(ViewModel::forge('users/new'));
                
        }

        public function action_edit()
        {
                $this->template->title = '利用者編集';
                $this->template->content = Response::forge(ViewModel::forge('users/edit'));
        }


        public function action_delete () {

                $this->template->title = 'user list';
                $this->template->content = Response::forge(ViewModel::forge('users/index'));

                
                $user = Model_User::find(Input::post('user_id'));
                if($user->delete())
                {

                        $session = Session::instance();
                        $session->set_flash('success', true);
                        $session->set_flash('message', "削除しました");
                }
                else
                {
                        $session = Session::instance();
                        $session->set_flash('error', true);
                        $session->set_flash('message', "削除に失敗しました");
                        
                }
        }
 
}
