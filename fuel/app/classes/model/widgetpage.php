<?php
class Model_Widgetpage extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'widget_id',
		'page_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('widget_id', 'Widget Id', 'required|valid_string[numeric]');
		$val->add_field('page_id', 'Page Id', 'required|valid_string[numeric]');

		return $val;
	}

}
