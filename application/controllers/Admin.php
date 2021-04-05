<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('Admin_model','model');
    }
    public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$check=$this->model->login($email,$password);
		if($check)
		{
			$this->session->set_userdata('admin',$email);
			return redirect(base_url('admin/welcome'));
			
		}
		else
		{
			$this->session->set_flashdata('msg','Credential not matched');
			return redirect(base_url('admin/index'));
		}
	}
	public function welcome()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	public function check_login()
	{
		if(!$this->session->userdata('admin'))
		{
			$this->session->set_flashdata('msg','Session Expired. Login again to continue...');
			return redirect(base_url('admin/index'));
		}
	}
	public function logout()
	{
	$this->session->unset_userdata('admin');
	$this->session->set_flashdata('msg','Logout successful');
	redirect(base_url('admin/index'));	
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
	public function blog()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog');
		$this->load->view('admin/footer');
	}
	public function editors()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editors');
		$this->load->view('admin/footer');
	}
	public function add_blog()
	{
		//start work from here
	}
	



}