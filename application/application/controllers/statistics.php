<?php
class Statistics extends CI_Controller {
	
	public function __construct() {
		parent::__construct();		
		$this->load->model('MC_stats_model');
	}
	
	public function index() {
		$this->load->model('server_stats_model');
		
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
		
		
		//Uses MC_Stats_models
		$data["ServerConn"] = $this->MC_stats_model->GetDataForPages();
		
		var_dump($data);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
	
	public function player($uuid) {	
		echo 'Player stats uuid ';
		echo $uuid;
		$this->load->model('server_stats_model');
		$this->load->model('player_stats_model');
		
		$data['playerData'] = $this->server_stats_model->getPlayer($uuid);
		
		var_dump($data);
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
}