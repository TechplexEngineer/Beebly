<?php
class Controller_Admin_Widgetpage extends Controller_Admin 
{

	public function action_index()
	{
		$data['widgetpages'] = Model_Widgetpage::find('all');
		$this->template->title = "Widgetpages";
		$this->template->content = View::forge('admin/widgetpage/index', $data);

	}

	public function action_view($id = null)
	{
		$data['widgetpage'] = Model_Widgetpage::find($id);

		$this->template->title = "Widgetpage";
		$this->template->content = View::forge('admin/widgetpage/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Widgetpage::validate('create');
			
			if ($val->run())
			{
				$widgetpage = Model_Widgetpage::forge(array(
					'widget_id' => Input::post('widget_id'),
					'page_id' => Input::post('page_id'),
				));

				if ($widgetpage and $widgetpage->save())
				{
					Session::set_flash('success', 'Added widgetpage #'.$widgetpage->id.'.');

					Response::redirect('admin/widgetpage');
				}

				else
				{
					Session::set_flash('error', 'Could not save widgetpage.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Widgetpages";
		$this->template->content = View::forge('admin/widgetpage/create');

	}

	public function action_edit($id = null)
	{
		$widgetpage = Model_Widgetpage::find($id);
		$val = Model_Widgetpage::validate('edit');

		if ($val->run())
		{
			$widgetpage->widget_id = Input::post('widget_id');
			$widgetpage->page_id = Input::post('page_id');

			if ($widgetpage->save())
			{
				Session::set_flash('success', 'Updated widgetpage #' . $id);

				Response::redirect('admin/widgetpage');
			}

			else
			{
				Session::set_flash('error', 'Could not update widgetpage #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$widgetpage->widget_id = $val->validated('widget_id');
				$widgetpage->page_id = $val->validated('page_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('widgetpage', $widgetpage, false);
		}

		$this->template->title = "Widgetpages";
		$this->template->content = View::forge('admin/widgetpage/edit');

	}

	public function action_delete($id = null)
	{
		if ($widgetpage = Model_Widgetpage::find($id))
		{
			$widgetpage->delete();

			Session::set_flash('success', 'Deleted widgetpage #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete widgetpage #'.$id);
		}

		Response::redirect('admin/widgetpage');

	}


}