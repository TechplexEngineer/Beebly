<?php

class Controller_Page extends Controller_Base
{
	public $template = 'template_page';
	public function action_index()
	{
		$view = View::forge('page/page.index');
		$view->posts = Model_Page::find('all');
		
		$this->template->title = 'Index of pages';
		$this->template->content = $view;
	}
	public function action_view($slug)
	{
		if (empty($slug))
			Response::redirect('page');
		//$post = Model_Post::find_by_slug($slug);
		$post = Model_Page::find_by_slug($slug);//, array('related' => array('user', 'comments'))
		
		$this->template->description = $post->description;
		$this->template->meta = $post->meta;
		$this->template->title = $post->title;
		$this->template->id = $post->id;
		$this->template->content = View::forge('page/page.view', array('post' => $post,));
	}

}
