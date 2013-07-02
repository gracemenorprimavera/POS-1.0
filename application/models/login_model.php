<?php
class Login_model extends CI_Model {

	function check_user($password) {

		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->where('password', md5($password));
		$result = $this->db->get();

		if($result->num_rows() == 1) {
			$row = $result->row();
            $data = array(
                    'userid' => $row->account_id,
                    'role' => $row->role,
                    //'personnel' => $row->name,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
			//return $result->row(0)->role;
			return true;
		}
		else
			return false;
	}

	function check_emp($username, $password) {
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get();

		if($result->num_rows() == 1) {
			$row = $result->row();
            $data = array(
                    'empid' => $row->emp_id,
                    'empname'=>$row->name,
                    'emp_login'=>TRUE
                    );
            $this->session->set_userdata($data);
			//return $result->row(0)->role;
			return true;
		}
		else
			return false;
	}

	function change_password($role, $old_pwd, $new_pwd) {

		$this->db->where('role', $role);
		$this->db->where('password', md5($old_pwd));
		$this->db->update('accounts', array('password'=>md5($new_pwd))); 

		if($this->db->affected_rows() == 1)
			return true;
		else
			return false;
	}


}
