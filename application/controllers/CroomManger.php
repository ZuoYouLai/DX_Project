<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CroomManger extends My_Controller {

	public function __construct()
	{
		parent::__construct();
	
	}

	public function index()
	{
		$this->load->view('CroomManger/list');
	}

	public function add()
	{
		p($this->session->set_userdata('user'));
		p($this->session->all_userdata());
		die();
		$this->load->view('CroomManger/add');
	}

}