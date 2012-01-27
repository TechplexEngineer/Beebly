<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Template 
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	
	public function action_index()
	{
		$view = View::forge('welcome/index');

		//$view->posts = Model_Post::find('all');

		$this->template->ptitle = 'FuelPHP Framework';
		$this->template->content = $view;
		//return Response::forge(View::forge('welcome/index'));
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
		return Response::forge(ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		$view = View::forge('404');
		$view->title = 'Error 404 - Page not found';
		$view->subTitle = static::view();
		return Response::forge($view, 404);
	}
	protected static function view()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		return $messages[array_rand($messages)];
	}
}
