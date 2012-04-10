<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */

class Migration_Ion_Auth extends CI_Migration {
	public function up() {
		//Create Table groups
		$this->dbforge->drop_table('groups');
		
		$this->dbforge->add_field("`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("`name` varchar(20) NOT NULL");
		$this->dbforge->add_field("`description` varchar(100) NOT NULL");
		$this->dbforge->add_key('id',TRUE);
		
		$this->dbforge->create_table('groups');
		
		//create Table users
		$this->dbforge->drop_table('users');
		
		$this->dbforge->add_field("`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("`ip_address` int(10) unsigned NOT NULL");
		$this->dbforge->add_field("`username` varchar(100) NOT NULL");
		$this->dbforge->add_field("`password` varchar(40) NOT NULL");
		$this->dbforge->add_field("`salt` varchar(40) DEFAULT NULL");
		$this->dbforge->add_field("`email` varchar(100) NOT NULL");
		$this->dbforge->add_field("`activation_code` varchar(40) DEFAULT NULL");
		$this->dbforge->add_field("`forgotten_password_code` varchar(40) DEFAULT NULL");
		$this->dbforge->add_field("`remember_code` varchar(40) DEFAULT NULL");
		$this->dbforge->add_field("`created_on` int(11) unsigned NOT NULL");
		$this->dbforge->add_field("`last_login` int(11) unsigned DEFAULT NULL");
		$this->dbforge->add_field("`active` tinyint(1) unsigned DEFAULT NULL");
		$this->dbforge->add_field("`first_name` varchar(50) DEFAULT NULL");
		$this->dbforge->add_field("`last_name` varchar(50) DEFAULT NULL");
		$this->dbforge->add_field("`company` varchar(100) DEFAULT NULL");
		$this->dbforge->add_field("`phone` varchar(20) DEFAULT NULL");
		$this->dbforge->add_key('id',TRUE);
		
		$this->dbforge->create_table('users');
		
		//Create Table users_groups
		$this->dbforge->drop_table('users_groups');
		
		$this->dbforge->add_field("`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("`user_id` mediumint(8) unsigned NOT NULL");
		$this->dbforge->add_field("`group_id` mediumint(8) unsigned NOT NULL");
		$this->dbforge->add_key('id',TRUE);
		
		$this->dbforge->create_table('users_groups');
		
		//Populate default values
		$query = $this->db->query("INSERT INTO `ci_groups` (`id`, `name`, `description`) VALUES (1,'admin','Administrator'),(2,'members','General User');");
		if($query) {
			echo 'groups populated successfully<br />';
		} else {
			echo 'ERROR: Groups population failure'."<br />";
		}
		
		$query = $this->db->query("INSERT INTO `ci_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('1',INET_ATON('127.0.0.1'),'administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','ADMIN','0');");
		if($query) {
			echo 'users populated successfully<br />';
		} else {
			echo 'ERROR: Users population failure'."<br />";
		}
		
		$query = $this->db->query("INSERT INTO `ci_users_groups` (`id`, `user_id`, `group_id`) VALUES (1,1,1), (2,1,2);");		
		if($query) {
			echo 'users_groups populated successfully'."<br />";
		} else {
			echo 'ERROR: users_groups population failure'."<br />";
		}
	}

	public function down() {
		$this->dbforge->drop_table('users_groups');
		$this->dbforge->drop_table('users');
		$this->dbforge->drop_table('groups');
	}
}