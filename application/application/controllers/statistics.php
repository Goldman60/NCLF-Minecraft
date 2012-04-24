<?php
class Statistics extends CI_Controller {
	
	public function __construct() {
		parent::__construct();		
		$this->load->library('stats_utilities');
		$this->load->model('MC_stats_model');
	}
	
	public function index() {
		$data["maxplayers"] = $this->server_stats_model->getMaxPlayersEverOnline();
		
		//Uses MC_Stats_models
		$data["ServerConn"] = $this->MC_stats_model->GetDataForPages();
		
		var_dump($data);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
	
	public function player($uuid) {		
		
		
		var_dump($data);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
}