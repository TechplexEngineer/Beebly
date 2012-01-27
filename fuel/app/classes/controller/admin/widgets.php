<?php
class Controller_Admin_Widgets extends Controller_Admin 
{

	public function action_index()
	{
		$data['widgets'] = Model_Widget::find('all');
		$this->template->title = "Widgets";
		$this->template->content = View::forge('admin/widget/index', $data);

	}

	public function action_view($id = null)
	{
		$data['widget'] = Model_Widget::find($id);

		$this->template->title = "Widget";
		$this->template->content = View::forge('admin/widget/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Widget::validate('create');
			
			if ($val->run())
			{
				$widget = Model_Widget::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'code' => Input::post('code'),
				));

				if ($widget and $widget->save())
				{
					Session::set_flash('success', 'Added widget #'.$widget->id.'.');

					Response::redirect('admin/widget');
				}

				else
				{
					Session::set_flash('error', 'Could not save widget.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}
		$view = View::forge('admin/widget/create');
		$view->set_global('pages', Arr::assoc_to_keyval(Model_Page::find('all'), 'id', 'title'));
		$this->template->title = "Widgets";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$widget = Model_Widget::find($id);
		$val = Model_Widget::validate('edit');

		if ($val->run())
		{
			$widget->name = Input::post('name');
			$widget->description = Input::post('description');
			$widget->code = Input::post('code');

			if ($widget->save())
			{
				Session::set_flash('success', 'Updated widget #' . $id);

				Response::redirect('admin/widget');
			}

			else
			{
				Session::set_flash('error', 'Could not update widget #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$widget->name = $val->validated('name');
				$widget->description = $val->validated('description');
				$widget->code = $val->validated('code');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('widget', $widget, false);
		}

		$this->template->title = "Widgets";
		$this->template->content = View::forge('admin/widget/edit');

	}

	public function action_delete($id = null)
	{
		if ($widget = Model_Widget::find($id))
		{
			$widget->delete();

			Session::set_flash('success', 'Deleted widget #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete widget #'.$id);
		}

		Response::redirect('admin/widget');

	}


}