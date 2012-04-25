<?php
/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */
class Siteman extends CI_Controller {
	
	public function index() {
		echo 'OH HI THERE';
	}
	
	public function updatedb() {
		$this->load->library('migration');
		
		if(!$this->migration->current()) {
			show_error($this->migration->error_string());
		} else {
			echo 'Database is current!<br />';
		}
	}
}