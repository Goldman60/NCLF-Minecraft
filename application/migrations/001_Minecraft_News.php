<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */

/*
 * there is an error in this scrip corrected in migration 3
 */

class Migration_Minecraft_News extends CI_Migration {
	
	public function up() {
		$this->dbforge->add_field(array(
				'id' => array(
						'type' => 'INT',
						'constraint' => 11,
						'unsigned' => TRUE,
						'auto_incremement' => TRUE
				),
				'title' => array(
						'type' => 'VARCHAR',
						'constraint' => 128
				),
				'slug' => array(
						'type' => 'VARCHAR',
						'constraint' => 128												
				),
				'text' => array(
						'type' => 'TEXT'						
				),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key(array('slug'));
		$this->dbforge->create_table('news',TRUE);
	}
	
	public function down() {
		$this->dbforge->drop_table('blog');
	}
}