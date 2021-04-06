<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('Admin_model','model');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $config=[
		 	'upload_path'=>'./upload/',
		 	'allowed_types'=>'gif|jpg|png|jpeg'
		 ];
		 $this->load->library('upload',$config);
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
	public function blog_list()
	{
		$this->check_login();
		$data['blog']=$this->model->get_blog();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/blog_list',$data);
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
		$this->check_login();
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
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() && $this->upload->do_upload('image'))
        {
        	$title=$this->input->post('title');
			$description=$this->input->post('description');
        	$img=$this->upload->data();
			$image="upload/".$img['raw_name'].$img['file_ext'];
            $data=array(
            	'title'=>$title,
            	'image'=>$image,
            	'description'=>$description
            );
            if($this->model->add_blog($data))
			{
				$this->session->set_flashdata('msg','Blog posted successfully');
				return redirect(base_url().'admin/blog');
			}
			else
			{
				$this->session->set_flashdata('msg','Something went wrong');
				return redirect(base_url().'admin/blog');	
			}
        }
        else
        {
        	$data['image']=$this->upload->display_errors('<p class="text-danger">', '</p>');
        	$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/blog',$data);
			$this->load->view('admin/footer');
        }
	}
	public function delete_blog()
	{
		$id=$this->uri->segment(3);
		$blog_info=$this->model->get_blog($id);
		echo $image=$blog_info[0]->image;
		if(!empty($image))
		{
			@unlink($image);
		}
		if($this->model->delete_blog($id))
		{
			$this->session->set_flashdata('msg','Blog deleted successfully');
			return redirect(base_url().'admin/blog_list');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/blog_list');
		}
	}
	public function edit_blog()
	{
		echo $id=$this->uri->segment(3);
		$data['blog']=$this->model->get_blog($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_blog',$data);
		$this->load->view('admin/footer');
	}
	public function update_blog()
	{
		$id=$this->uri->segment(3);
		$blog_info=$this->model->get_blog($id);
		$old_image=$blog_info[0]->image;
		if($this->upload->do_upload('image'))
		{
			if(!empty($old_image))
			{
				@unlink($old_image);
			}
			$img=$this->upload->data();
			$image="upload/".$img['raw_name'].$img['file_ext'];
		}
		else
		{
			$image=$old_image;
		}
		$title=$this->input->post('title');
		$description=$this->input->post('description');
		$data=array(
			'title'=>$title,
			'image'=>$image,
			'description'=>$description
		);
		if($this->model->update_blog($data,$id))
		{
			$this->session->set_flashdata('msg','Blog updated successfully');
			return redirect(base_url().'admin/blog_list');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/blog_list');
		}
	}
	public function enquiry()
	{
		$data['contact']=$this->model->get_contact();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/enquiry',$data);
		$this->load->view('admin/footer');
	}
	public function delete_contact()
	{
		echo $id=$this->uri->segment(3);
		if($this->model->delete_contact($id))
		{
			$this->session->set_flashdata('msg','Enquiry deleted successfully');
			return redirect(base_url().'admin/enquiry');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/enquiry');
		}
	}
	public function team()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/team');
		$this->load->view('admin/footer');
	}
	public function add_team()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('twitter', 'Twitter Link', 'trim|required|valid_url');
		$this->form_validation->set_rules('facebook', 'Facebook Link', 'trim|required|valid_url');
		$this->form_validation->set_rules('instagram', 'Instagram Link', 'trim|required|valid_url');
		$this->form_validation->set_rules('linkedin', 'LinkedIn Link', 'trim|required|valid_url');
		if ($this->form_validation->run() && $this->upload->do_upload('image') ) {
			$name=$this->input->post('name');
			$designation=$this->input->post('designation');
			$twitter=$this->input->post('twitter');
			$facebook=$this->input->post('facebook');
			$instagram=$this->input->post('instagram');
			$linkedin=$this->input->post('linkedin');
			$img=$this->upload->data();
			$image="upload/".$img['raw_name'].$img['file_ext'];
			$data=array(
				'name'=>$name,
				'image'=>$image,
				'designation'=>$designation,
				'twitter'=>$twitter,
				'facebook'=>$facebook,
				'instagram'=>$instagram,
				'linkedin'=>$linkedin
			);
			if($this->model->add_team($data))
			{
				$this->session->set_flashdata('msg','Team member added successfully');
				return redirect(base_url().'admin/team');
			}
			else
			{
				$this->session->set_flashdata('msg','Something went wrong');
				return redirect(base_url().'admin/team');	
			}
		} else {
			$data['image']=$this->upload->display_errors('<p class="text-danger">', '</p>');
        	$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/team',$data);
			$this->load->view('admin/footer');
	}
	}
	public function team_list()
	{
		$data['team']=$this->model->getTeam();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/team_list',$data);
		$this->load->view('admin/footer');
	}
	public function delete_team()
	{
		$id=$this->uri->segment(3);
		$team_info=$this->model->getTeam($id);
		$image=$team_info[0]->image;
		if(!empty($image))
		{
			@unlink($image);
		}
		if($this->model->delete_team($id))
		{
			$this->session->set_flashdata('msg','Team Member deleted successfully');
			return redirect(base_url().'admin/team_list');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/team_list');
		}
	}
	public function edit_team()
	{
		$id=$this->uri->segment(3);
		$data['team']=$this->model->getTeam($id);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_team',$data);
		$this->load->view('admin/footer');
	}
	public function update_team()
	{
		$id=$this->uri->segment(3);
		$team_info=$this->model->getTeam($id);
		$old_image=$team_info[0]->image;
		if($this->upload->do_upload('image'))
		{
			if(!empty($old_image))
			{
				@unlink($old_image);
			}
			$img=$this->upload->data();
			$image="upload/".$img['raw_name'].$img['file_ext'];
		}
		else
		{
			$image=$old_image;
		}
		$name=$this->input->post('name');
		$designation=$this->input->post('designation');
		$twitter=$this->input->post('twitter');
		$facebook=$this->input->post('facebook');
		$instagram=$this->input->post('instagram');
		$linkedin=$this->input->post('linkedin');
		$data=array(
			'name'=>$name,
			'image'=>$image,
			'designation'=>$designation,
			'twitter'=>$twitter,
			'facebook'=>$facebook,
			'instagram'=>$instagram,
			'linkedin'=>$linkedin
		);
		if($this->model->update_team($data,$id))
		{
			$this->session->set_flashdata('msg','team member updated successfully');
			return redirect(base_url().'admin/team_list');
		}
		else
		{
			$this->session->set_flashdata('msg','Something went wrong');
			return redirect(base_url().'admin/team_list');
		}
	}



}