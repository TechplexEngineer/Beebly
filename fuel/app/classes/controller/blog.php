<?php

/*
 *    Document   : blog.php
 *    Created on : Jan 25, 2012, 2:07:33 PM
 *    Author     : Techplex Engineer <Techplex.Engineer@gmail.com>
 *    Description: Purpose of the document as follows.
 */

class Controller_Blog extends Controller_Base
{
	public $template = 'template_page';
	public function action_index()
	{
		$view = View::forge('blog/index');

		$view->posts = Model_Post::find('all');

		$this->template->title = 'My Blog';
		$this->template->content = $view;
	}

	public function action_view($slug)
	{
		if (empty($slug))
			Response::redirect('blog');
		//$post = Model_Post::find_by_slug($slug);
		$post = Model_Post::find_by_slug($slug, array('related' => array('user', 'comments')));

		$this->template->title = $post->title;
		$this->template->content = View::forge('blog/view', array('post' => $post,));
	}

	public function action_comment($slug)
	{
		$post = Model_Post::find_by_slug($slug);

		// Lazy validation
		if (Input::post('name') AND Input::post('email') AND Input::post('message')) {
			// Create a new comment
			$post->comments[] = new Model_Comment(array(
				    'name' => Input::post('name'),
				    'website' => Input::post('website'),
				    'email' => Input::post('email'),
				    'message' => Input::post('message'),
				    'user_id' => $this->current_user->id,
				));

			// Save the post and the comment will save too
			if ($post->save()) {
				$comment = end($post->comments);
				Session::set_flash('success', 'Added comment #' . $comment->id . '.');
			} else {
				Session::set_flash('error', 'Could not save comment.');
			}

			Response::redirect('blog/view/' . $slug);
		}

		// Did not have all the fields
		else {
			// Just show the view again until they get it right
			$this->action_view($slug);
		}
	}

}

?>
