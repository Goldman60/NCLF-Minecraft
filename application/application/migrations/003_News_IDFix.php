<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */

//Fixes auto increment issues

class Migration_News_idfix extends CI_Migration {
	
	public function up() {
		$change = array(
						'id' => array(
									'type' => 'INT',
									'constraint' => 11,
									'unsigned' => TRUE,
									'auto_increment' => TRUE
								),
	 	);
		
		$this->dbforge->modify_column('news',$change);
	}
	
	public function down() {
		$change = array(
						'id' => array(
									'type' => 'INT',
									'constraint' => 11,
									'unsigned' => TRUE,
									'auto_increment' => FALSE
								),
		);
		
		$this->dbforge->modify_column('news',$change);
	}
}