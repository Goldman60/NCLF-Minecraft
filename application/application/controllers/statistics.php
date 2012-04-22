<?php
class Statistics extends CI_Controller {
	
	public function __construct() {
		parent::__construct();		
		$this->load->library('stats_utilities');
	}
	
	public function index() {
		$data["maxplayers"] = $this->server_stats_model->getMaxPlayersEverOnline();
		
		var_dump($data);
		$this->load->view('templates/header');
	}
}