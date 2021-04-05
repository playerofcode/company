<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function welcome()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function data()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/data');
		$this->load->view('admin/footer');
	}
	public function calendar()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/calendar');
		$this->load->view('admin/footer');
	}
	public function form()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/form');
		$this->load->view('admin/footer');
	}
	public function editors()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editors');
		$this->load->view('admin/footer');
	}
	public function logout()
	{
	echo "Logout Code Will be Here";	
	}



}