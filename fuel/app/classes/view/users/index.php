<?php

class View_Users_Index extends ViewModel {
        
        public function view () {
                $this->title = 'view_model から設定';

                $this->all_count = Model_User::query()->order_by('user_id', 'desc')->count();
                $this->results = Model_User::find('all');
//givi                $this->resutls = Model_User::find('all', array('order_by' => array('user_name' => 'desc')));
                $sql = DB::last_query();
                Log::debug('SQL:【'.$sql.'】');
                foreach ($this->results as $user)
                {
                        Log::debug('user_id:'.$user->user_id);
                }

        }
}