<?php

class Controller_Admin_Users extends Controller_Admin
{

    public function action_index()
    {
	$data['users'] = Model_User::find('all');
	$this->template->title = "Users";
	$this->template->content = View::forge('admin/users/index', $data);
    }

    public function action_view($id = null)
    {
	if ($id == null)
	    Response::redirect('admin/users');
	else if(is_numeric($id))
	    $data['user'] = Model_User::find($id);
	else {
	    $data['user'] = Model_User::find($id);
	}

	$this->template->title = "User";
	$this->template->content = View::forge('admin/users/view', $data);
    }

    public function action_create($id = null)
    {
	if (Input::method() == 'POST') {
	    $val = Model_User::validate('create');

	    if ($val->run()) {
		$user = Model_User::forge(array(
			    'username' => Input::post('username'),
			    'group' => Input::post('group'),
			    'email' => Input::post('email'),
			));

		if ($user and $user->save()) {
		    Session::set_flash('success', 'Added user #' . $user->id . '.');

		    Response::redirect('admin/user');
		} else {
		    Session::set_flash('error', 'Could not save user.');
		}
	    } else {
		Session::set_flash('error', $val->show_errors());
	    }
	}
	$view = View::forge('admin/users/create');
	$view->set_global('pages', Arr::assoc_to_keyval(Model_Page::find('all'), 'id', 'title'));
	$this->template->title = "Users";
	$this->template->content = $view;
    }

    public function action_edit($id = null)
    {
	$user = Model_User::find($id);
	$val = Model_User::validate('edit');

	if ($val->run()) {
	    $user->username = Input::post('username');
	    $user->group = Input::post('group');
	    $user->email = Input::post('email');

	    if ($user->save()) {
		Session::set_flash('success', 'Updated user #' . $id);

		Response::redirect('admin/user');
	    } else {
		Session::set_flash('error', 'Could not update user #' . $id);
	    }
	} else {
	    if (Input::method() == 'POST') {
		$user->username = $val->validated('username');
		$user->group = $val->validated('group');
		$user->email = $val->validated('email');

		Session::set_flash('error', $val->show_errors());
	    }

	    $this->template->set_global('user', $user, false);
	}

	$this->template->title = "Users";
	$this->template->content = View::forge('admin/users/edit');
    }

    public function action_delete($id = null)
    {
	if ($user = Model_User::find($id)) {
	    $user->delete();

	    Session::set_flash('success', 'Deleted user #' . $id);
	} else {
	    Session::set_flash('error', 'Could not delete user #' . $id);
	}

	Response::redirect('admin/user');
    }

}