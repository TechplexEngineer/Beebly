<?php

class Model_Page extends \Orm\Model
{

    protected static $_has_many = array('widgets');
    protected static $_properties = array(
	'id',
	'title',
	'slug',
	'description',
	'meta',
	'body',
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
	$val->add_field('title', 'Title', 'required|max_length[255]');
	$val->add_field('slug', 'Slug', 'required|max_length[255]');
	$val->add_field('description', 'Description', 'required');
	$val->add_field('meta', 'Meta', '');
	$val->add_field('body', 'Body', 'required');

	return $val;
    }

}
