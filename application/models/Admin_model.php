<?php

class Admin_model extends CI_model{

	public function login($email,$password)
	{	
		
		return $this->db->get_where('admin',array('email'=>$email,'password'=>$password))->result();
	}
	public function add_blog($data)
	{
		return $this->db->insert('blog',$data);
	}
	public function get_blog($id='')
	{
		if($id)
		{
			return $this->db->get_where('blog',array('id'=>$id))->result();
		}
		else
		{
			return $this->db->get('blog')->result();
		}
	}
	public function delete_blog($id)
	{
		return $this->db->delete('blog',array('id'=>$id));
	}
	public function update_blog($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('blog',$data);
	}
	public function get_contact()
	{
		$this->db->order_by('id','DESC');
		return $this->db->get('contact')->result();
	}
	public function delete_contact($id)
	{
		if(!empty($id))
		{
			return $this->db->delete('contact',array('id'=>$id));
		}
	}
	public function add_team($data)
	{
		return $this->db->insert('team',$data);
	}
	public function getTeam($id='')
	{
		if($id)
		{
			return $this->db->get_where('team',array('id'=>$id))->result();
		}
		$this->db->order_by('id','DESC');
		return $this->db->get('team')->result();
	}
	public function delete_team( $id)
	{
		return $this->db->delete('team',array('id'=>$id));
	}
	public function update_team($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('team',$data);
	}

}

?>