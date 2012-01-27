<?php

namespace Fuel\Migrations;

class Create_widgetpages
{
	public function up()
	{
		\DBUtil::create_table('widgetpages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'widget_id' => array('constraint' => 11, 'type' => 'int'),
			'page_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('widgetpages');
	}
}