<?php

class View_Users_Index extends ViewModel {
        
        public function view () {

                $user_name = Input::get('user_name');
                $this->user_name = $user_name;
                Log::debug('userName:'.$user_name);
                // total_items
                $query = Model_User::query();
                if (isset($user_name) and !empty($user_name))
                {
                        $query->where('user_name', 'like', '%'.$user_name.'%');
                }
                $total_items = $query->count();

                // paging
                $pagination = null;
                if ($exists = Pagination::instance('users-index'))
                {
                        $pagination = $exists;
                }
                else
                {
                        $pagination = Pagination::forge('users-index', array(
                                                                'pagination_url' => Uri::create(
                                                                        '/users/index',
                                                                        array(),
                                                                        array(
                                                                                'user_name' => $user_name
                                                                                )),
                                                                'total_items' => $total_items,
                                                                'per_page' => 1,
                                                                'uri_segment' =>  'page',
                                                                ));
                }

                // search
                $model = Model_User::query()
                        ->limit($pagination->per_page)
                        ->offset($pagination->offset);
                if (isset($user_name) and !empty($user_name))
                {
                        $model->where('user_name', 'like', '%'.$user_name.'%');
                }

                
                // set
                $this->total_items = $total_items;
                $this->results = $model->get();
                $this->_view->set_safe('pager', $pagination->render());
        }
}