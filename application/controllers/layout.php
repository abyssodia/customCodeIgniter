<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class layout extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//$this->load->helper('url');

		$this->_init();
		
		$this->output->set_template('blank');
	}

	private function _init()
	{
		//$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

	public function index()
	{
		$this->load->view('inside_layout');
	}
}
