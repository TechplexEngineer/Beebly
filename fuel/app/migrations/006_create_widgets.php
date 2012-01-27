<?php

namespace Fuel\Migrations;

class Create_widgets
{
	public function up()
	{
		\DBUtil::create_table('widgets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'code' => array('type' => 'text'),
			//'page_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('widgets');
	}
}