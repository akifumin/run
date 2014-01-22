<?php

//use \Model\Users;

class View_Users_Index extends ViewModel {
        
        public function view () {
                $this->title = 'view_model から設定';
//                $this->resutls = Model_User::find('all');
                $this->results = Model_User::find('all');
                $sql = DB::last_query();
                Log::debug('SQL:【'.$sql.'】');
//                $this->resutls = Model_Users::condition();
//                $this->results = array();
        }
}