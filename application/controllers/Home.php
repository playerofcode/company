<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model','model');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function about()
	{
		$data['team']=$this->model->getTeam();
		$this->load->view('header');
		$this->load->view('about',$data);
		$this->load->view('footer');
	}
	public function team()
	{
		$data['team']=$this->model->getTeam();
		$this->load->view('header');
		$this->load->view('team',$data);
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
		$data['blog']=$this->model->get_blog();
		$data['recent_blog']=$this->model->recent_post();
		$this->load->view('header');
		$this->load->view('blog',$data);
		$this->load->view('footer');
	}
	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	public function blog_detail()
	{
		$id=$this->uri->segment(3);
		$data['blog']=$this->model->get_blog($id);
		$data['recent_blog']=$this->model->recent_post();
		$this->load->view('header');
		$this->load->view('blog_detail',$data);
		$this->load->view('footer');
	}
	public function get_contact()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run()) 
		{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$subject=$this->input->post('subject');
		$message=$this->input->post('message');
		$data=array(
			'name'=>$name,
			'email'=>$email,
			'subject'=>$subject,
			'message'=>$message
		);
		if($this->model->get_contact($data))
		{
			$this->session->set_flashdata('msg', 'Thank You for contacting with us. Our team will responde you soon.');
			return redirect(base_url('home/contact'));
		}
		else
		{
			$this->session->set_flashdata('msg', 'Something went wrong. Try again later');
			return redirect(base_url('home/contact'));
		}
		
		}
		else
		{
		$this->contact();	
		}
	
	}

}
