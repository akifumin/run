<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{ 
		return Response::forge(View::forge('welcome/index'));
//		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
	  // adfaea
		return Response::forge(ViewModel::forge('welcome/hello'));
	}


    public function action_test () {
        return 'test';
    }


    
    public function action_aki () {
        return $this->action_test();
    }

    public function action_aki_err ($id ) {
        try {
  
            $data = Model_Data::get($id);
            return View::forge("post", ["data"=>$data]);
        } catch (Exception $d) { 
            Log::error("$e");
            return $this->action_error();
        }
    }
 
    public function action_error () {
        return "error!!";
    }



	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{       
	  
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
