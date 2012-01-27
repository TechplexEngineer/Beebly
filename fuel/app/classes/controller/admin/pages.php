<?php
class Controller_Admin_Pages extends Controller_Admin 
{

	public function action_index()
	{
		$data['pages'] = Model_Page::find('all');
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/index', $data);

	}

	public function action_view($id = null)
	{
		$data['page'] = Model_Page::find($id);

		$this->template->title = "Page";
		$this->template->content = View::forge('admin/pages/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Page::validate('create');
			
			if ($val->run())
			{
				$page = Model_Page::forge(array(
					'title' => Input::post('title'),
					'slug' => Input::post('slug'),
					'description' => Input::post('description'),
					'meta' => Input::post('meta'),
					'body' => Input::post('body'),
				));

				if ($page and $page->save())
				{
					Session::set_flash('success', 'Added page #'.$page->id.'.');

					Response::redirect('admin/pages');
				}

				else
				{
					Session::set_flash('error', 'Could not save page.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/create');

	}

	public function action_edit($id = null)
	{
		$page = Model_Page::find($id);
		$val = Model_Page::validate('edit');

		if ($val->run())
		{
			$page->title = Input::post('title');
			$page->slug = Input::post('slug');
			$page->description = Input::post('description');
			$page->meta = Input::post('meta');
			$page->body = Input::post('body');

			if ($page->save())
			{
				Session::set_flash('success', 'Updated page #' . $id);

				Response::redirect('admin/pages');
			}

			else
			{
				Session::set_flash('error', 'Could not update page #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$page->title = $val->validated('title');
				$page->slug = $val->validated('slug');
				$page->description = $val->validated('description');
				$page->meta = $val->validated('meta');
				$page->body = $val->validated('body');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('page', $page, false);
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/edit');

	}

	public function action_delete($id = null)
	{
		if ($page = Model_Page::find($id))
		{
			$page->delete();

			Session::set_flash('success', 'Deleted page #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete page #'.$id);
		}

		Response::redirect('admin/pages');

	}


}