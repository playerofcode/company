<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function about()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function team()
	{
		$this->load->view('header');
		$this->load->view('team');
		$this->load->view('footer');
	}
	public function portfolio()
	{
		$this->load->view('header');
		$this->load->view('portfolio');
		$this->load->view('footer');
	}
	public function services()
	{
		$this->load->view('header');
		$this->load->view('services');
		$this->load->view('footer');
	}
	public function blog()
	{
		$this->load->view('header');
		$this->load->view('blog');
		$this->load->view('footer');
	}
	public function blog_single()
	{
		$this->load->view('header');
		$this->load->view('blog-single');
		$this->load->view('footer');
	}
	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
}
