<?php

/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */

/**
 * Additions per issue 9 on the issue tracker
 */

class Migration_News_addition_issue_9 extends CI_Migration {

	public function up() {
		$fields = array(
				'date' => array(
						'type' => 'TIMESTAMP',
						'default' => 'CURRENT_TIMESTAMP', //This may need to be set manually
						'attributes' => 'ON UPDATE CURRENT_TIMESTAMP' //This may need to be set manually
				),
				'author' => array(
						'type' => 'VARCHAR',
						'constraint' => 128
				),
		);

		$this->dbforge->add_column('news',$fields);
	}

	public function down() {
		$this->dbforge->drop_column('news', 'date');
		$this->dbforge->drop_column('news', 'author');
	}
}