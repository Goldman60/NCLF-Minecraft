<?php
class Statistics extends CI_Controller {
	
	public function __construct() {
		parent::__construct();		
		define("DATE_TIME", 'M j\, Y\, h:i:s a \(T\)');
		$this->load->model('server_stats_model');
	}
	
	public function index() {
		$this->load->model('MC_stats_model');
				
		$data['serverStats']['maxPlayers'] = $this->server_stats_model->getMaxPlayersEverOnline();
		$data['serverStats']['maxPlayersDate'] = $this->server_stats_model->getMaxPlayersEverOnlineTimeWhenOccured();
		$data['serverStats']['totalJoins'] = $this->server_stats_model->getNumberOfLoginsTotal();
		$data['serverStats']['totalPlayers'] = $this->server_stats_model->getAllPlayers();
		$data['serverStats']['upTime'] = $this->server_stats_model->getUptimeInSeconds();
		$data['serverStats']['startupTime'] = $this->server_stats_model->getStartupTime();
		$data['serverStats']['lastShutdown'] = $this->server_stats_model->getLastShutdownTime();
		$data['serverStats']['playTime'] = $this->server_stats_model->getNumberOfSecondsLoggedOnTotal();
		$data['serverStats']['totalDistanceTravelled'] = $this->server_stats_model->getDistanceTraveledTotal();
		$data['serverStats']['totalDistanceMinecart'] = $this->server_stats_model->getDistanceTraveledByMinecartTotal();
		$data['serverStats']['totalDistanceBoat'] = $this->server_stats_model->getDistanceTraveledByBoatTotal();
		$data['serverStats']['totalDistancePig'] = $this->server_stats_model->getDistanceTraveledByPigTotal();
		$data['serverStats']['totalDistanceWalk'] = $this->server_stats_model->getDistanceTraveledByFootTotal();
		$data['serverStats']['totalBlocksDestroyed'] = $this->server_stats_model->getBlocksDestroyedTotal();
		$data['serverStats']['totalBlocksPlaced'] = $this->server_stats_model->getBlocksPlacedTotal();
		$data['serverStats']['totalKills'] = $this->server_stats_model->getTotalKills();
		$data['serverStats']['totalPvP'] = $this->server_stats_model->getTotalPVPKills();
		$data['serverStats']['allPlayers'] = $this->server_stats_model->getPlayersTable();

		$data['title'] = "Statistics";
		
		//Uses MC_Stats_models
		$data['ServerConn'] = $this->MC_stats_model->GetDataForPages();
				
		$data['style'] = array('SiteWide','Header','Navigation','Body','Footer','RightSide','Pages/stats');
		$data['script'] = array();
		
		echo '<!-- DEBUG ARRAY'."\r\n";
		var_dump($data);
		echo '-->'."\r\n";

		//Header
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navigation',$data);
		//Load up the body
		$this->load->view('templates/body/start');
				
		if(!$data['ServerConn']['connection']) { 
			$this->load->view('templates/Error/Body-NoServer');
		} else {
			$this->load->view('stats/index', $data);
		}
		
		//End the body
		$this->load->view('templates/body/end', $data);
		//footer
		$this->load->view('templates/footer', $data);
		
	}
	
	public function player($uuid) {	
		$this->load->model('player_stats_model');
		
		$data['playerData'] = $this->server_stats_model->getPlayer($uuid);
		
		//Does player exsist?
		if(!$data['playerData']->getName()) {
			show_404();
		}
		
		$data['title'] = $data['playerData']->getName()."'s Statistics";

		$data['style'] = array('SiteWide','Header','Navigation','Body','Footer','RightSide','Pages/stats','Pages/PlayerStats');
		$data['script'] = array();
		
		//Pre formatting player stats to reduce code in view
		$data['playerPre']['online'] = $this->stats_utilities->formatSecs($data['playerData']->getNumberOfSecondsLoggedOn());
		
		//var_dump($data);
		
		//Header
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navigation',$data);
		//Load up the body
		$this->load->view('templates/body/start');

		$this->load->view('stats/player', $data);
		
		//End the body
		$this->load->view('templates/body/end');
		//footer
		$this->load->view('templates/footer', $data);
	}
}