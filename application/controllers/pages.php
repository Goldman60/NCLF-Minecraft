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
		if(!file_exists('../application/views/pages/'.$page.'.php')) {
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
		$data['ServerConn'] = $this->MC_stats_model->GetDataForPages();
				
		//Header
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/navigation',$data);
		//Load up the body
		$this->load->view('templates/body/start');
				
		$this->load->view('pages/'.$page, $data);
		
		//load the sidebar
		$this->load->view('templates/sidebar');

		//End the body
		$this->load->view('templates/body/end', $data);
		//footer
		$this->load->view('templates/footer', $data);
		
	}
}