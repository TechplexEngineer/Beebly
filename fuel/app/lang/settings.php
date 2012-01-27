<?php

/*
 *    Document   : settings.php
 *    Created on : Jan 27, 2012, 9:45:47 AM
 *    Author     : Techplex Engineer <Techplex.Engineer@gmail.com>
 *    Description: Purpose of the document as follows.
 */

class Controller_settings extends Controller_Template
{

    public function action_index()
    {
	$view = View::forge('settings/index');

	$view->posts = Model_settings::find('all');

	$this->template->title = 'My settings';
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

}