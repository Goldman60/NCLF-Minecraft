<?php
/*
 * NCLFMinecraft.org
 * Copyright (C) 2012  A.J. Fite
 */
class Pages extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('MC_stats_model');
	}
	
	public function view($page = 'home') {		
		if(!file_exists('../application/application/views/pages/'.$page.'.php')) {
			//Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); //Capitalize the first letter
		$data['style'] = array('SiteWide','Header','Navigation','Body','Footer','RightSide'); //$page is for a page specific CSS sheet
		$data['script'] = array();
		
		// Page specific CSS and scripts
		if(file_exists('../public/Assets/Scripts/Pages/'.$page.'.js')) {
			array_push($data['script'], 'Pages/'.$page);
		}
		
		if(file_exists('../public/CSS/Pages/'.$page.'.css')) {
			 array_push($data['style'], 'pages/'.$page);
		}
		// End page specifics
		
		$connection = $this->MC_stats_model->Connect('localhost');
		
		//Check server connection (NOTE: also implemented in news controller)
		if($connection === TRUE) {
			// Connection is good
			$data['PlayerList'] = $this->MC_stats_model->GetPlayers();
			$data['serverstats'] = $this->MC_stats_model->GetInfo();
			$data['connection'] = TRUE;
		} else {
			// Handles Connection errors
			$data['PlayerList'] = FALSE;
			$data['serverstats'] = FALSE;
			$data['connection'] = FALSE;
			switch($connection) {
				case(-3): {
					$data['Error'] = "Failed to receive challenge.";
				}
				case(-2): {
					$data['Error'] = "Failed to receive status.";
				}
				case(-1): {
					$data['Error'] = "Can't open connection.";
				}
			}
			$data['ErrorCode'] = $connection;
		}
		
		//Header
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navigation',$data);
		//Load up the body
		$this->load->view('templates/body/start');
		
		//If page is the stats page and there is no connection load error
		if($page == 'stats' && !$data['connection']) {
			$this->load->view('templates/Error/Body-NoServer');
		} else {
			$this->load->view('pages/'.$page, $data);
		}
		
		//If page is not the stats page then load the sidebar
		if($page != 'stats') {
			$this->load->view('templates/sidebar');
		}
		//End the body
		$this->load->view('templates/body/end', $data);
		//footer
		$this->load->view('templates/footer', $data);
		
	}
}