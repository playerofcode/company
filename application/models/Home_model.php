<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	
	public function get_blog($id='')
	{
		if($id)
		{
			return $this->db->get_where('blog',array('id'=>$id))->result();
		}
		else
		{
			$this->db->order_by('id','DESC');
			return $this->db->get('blog')->result();
		}
	}
	public function recent_post()
	{
		$this->db->limit(5,0);
		return $this->get_blog();
	}
	public function get_contact($data)
	{
		return $this->db->insert('contact',$data);
	}
	public function getTeam()
	{
		$this->db->order_by('id','DESC');
		return $this->db->get('team')->result();
	}
}

?>