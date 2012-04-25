<?php
/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */
//FIXME: Display errors
class Error_model extends CI_Model {
	public function insufficent_rights()  {
		echo 'You must be an administrator to complete this action';
	}
	public function not_logged_in() {
		echo 'You must be logged in';		
	}
	public function server_comm_error($sidebar = FALSE) {
		
		if($sidebar === FALSE) {
		}
		
		echo 'A server communication error has occured';
		
	}
}
