<?php
class Pos_model extends CI_Model {


	function check_user($password) {

		$this->db->select('role');
		$this->db->from('accounts');
		$this->db->where('password', $password);
		$result = $this->db->get();

		if($result->num_rows() == 1)
			return $result->row(0)->role;
		else
			return false;
	}

	function change_password($role, $old_pwd, $new_pwd) {

		$this->db->where('role', $role);
		$this->db->where('password', $old_pwd);
		$this->db->update('accounts', array('password'=>$new_pwd)); 

		if($this->db->affected_rows() == 1)
			return true;
		else
			return false;
	}

	function getAll_items() {

		$result = $this->db->get('item');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_items_bySupplier($supplier_name) {

		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('supplier_code',$supplier_name);
		$result = $this->db->get();
		 if($result->num_rows() > 0) {
				foreach ($result->result() as $row) {
					$data[] = $row;
				}
				return $data;
		}
		else 
				return false;
	}

	function delete_item($item_code) {

		$this->db->delete('item', array('item_code' => $item_code));

	}

	function getAll_customers() {

		$this->db->from('customers');
		$this->db->join('transactions', 'customers.customer_id = transactions.customer_id');
		$this->db->join('trans_details', 'transactions.trans_id = trans_details.trans_id');

		$result = $this->db->get();

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_customerId($customer) {

		$this->db->select('customer_id');
		$this->db->from('customers');
		$this->db->where('customer_name', $customer);
		$result = $this->db->get();
		if($result->num_rows() == 1) {
			foreach ($result->result() as $r) {
				$id = $r->customer_id;
			}
		}

		return $id;
	}

	function getAll_delivery() {

		$this->db->from('supplier');
		$this->db->join('delivery', 'supplier.supplier_id = delivery.supplier_id');
		$this->db->join('delivered_item', 'delivery.delivery_id = delivered_item.delivery_id');

		$result = $this->db->get();

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_edit_item($edit) {

		$this->db->where('item_code',$edit);
		$this->db->from('item');

		$query = $this->db->get();

		return $query->result();
	}

	function update_item($data,$edit){
			
			//update item
			$this->db->where('item_code',$edit);
			$this->db->update('item',$data);
							
	}
	
	function get_group() {

		$this->db->from('item');
		$this->db->group_by('group');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_items_ingroup($group) {

		$this->db->where('group',$group);
		$this->db->from('item');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_class() {

		$this->db->from('item');
		$this->db->group_by('class1');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_items_inclass($class) {

		$this->db->where('class1',$class);
		$this->db->from('item');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_item_byCode($item_code){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item_code',$item_code);
		$result = $this->db->get();
		 if($result->num_rows() > 0) {
				foreach ($result->result() as $row) {
					$data = $row;
				}
				return $data;
		}
		else 
				return false;
	}
	
	
	function getAll_supplier() {

		$result = $this->db->get('supplier');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	
}
?>