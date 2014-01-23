<?php
class View_Users_new extends ViewModel
{
        public function view()
        {
                
                $user_fieldSet = Fieldset::forge(
                        'user',
                        array(
                                'form_attributes' => array(
                                        'role' => 'form'
//                                        'action' => Uri::create('users/insert')
                                        ),

                                )
                        );
                
                $user_fieldSet->add(
                        'user_id',
                        'userId',
                        array('class' => 'form-control', 'placeholder' => 'userID', 'id' => 'user_id', 'autocomplete' => 'off'),
                        array('required')
                        );
                $user_fieldSet->add(
                        'user_name',
                        'userName',
                        array('class' => 'form-control', 'placeholder' => 'userName', 'id' => 'user_name', 'autocomplete' => 'off'),
                        array('required')
                        );
                $user_fieldSet->add(
                        'password',
                        'password',
                        array('type' => 'password', 'class' => 'form-control', 'poaceholer' => 'password', 'id' => 'password', 'autocomplete' => 'off'),
                        array('required')
                        );
                $user_fieldSet->add(
                        'a',
                        '',
                        array('type' => 'submit', 'class' => 'btn btn-info', 'value' => 'submit')
                        );

                if (Input::method() == 'POST')
                {
                        $val = $user_fieldSet->validation();
                        if ($val->run())
                        {
                                $fields = $val->validated();
                                unset($fields['submit']);

                                $user = Model_User::forge();
                                $user->set($fields);
                                if($user->save())
                                {
                                        $session = Session::instance();
                                        $session->set_flash('success', true);
                                        $session->set_flash('message', "新規追加しました");
                                        Response::redirect('users/index');
                                }
                                        
                        }
                        else
                        {

                                $user_fieldSet->repopulate();
                        }
                        
                                
                }
                $this->_view->set_safe('fieldSet', $user_fieldSet->build());
                
        }
}