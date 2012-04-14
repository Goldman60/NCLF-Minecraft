<?php
class Error extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ion_auth');
	}
	
	public function index() {
		show_404();
	}
	
	public function notadmin() {
		echo 'You must be an administrator to view this page';
	}
}
