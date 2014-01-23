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
                //$user_form = $user_fieldSet->form();
                
                $user_fieldSet->add(
                        'user_id',
                        'userId',
                        array('class' => 'form-control', 'placeholder' => 'userID', 'id' => 'user_id'),
                        array('required')
                        );
                $user_fieldSet->add(
                        'user_name',
                        'userName',
                        array('class' => 'form-control', 'placeholder' => 'userName', 'id' => 'user_name'),
                        array('required')
                        );
                $user_fieldSet->add(
                        'password',
                        'password',
                        array('type' => 'password', 'class' => 'form-control', 'poaceholer' => 'password', 'id' => 'password'),
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