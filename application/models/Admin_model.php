<?php

class Admin_model extends CI_model{

	public function login($email,$password)
	{	
		
		return $this->db->get_where('admin',array('email'=>$email,'password'=>$password))->result();
	}
}

?>