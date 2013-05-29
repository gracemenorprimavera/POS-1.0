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
		$result = $this->db->get('customers');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_customerDetails($customer_id) {
		
		$this->db->from('customers');
		$this->db->where('customers.customer_id', $customer_id);
		$this->db->join('transactions', 'customers.customer_id = transactions.customer_id');
		//$this->db->join('trans_details', 'transactions.trans_id = trans_details.trans_id');
		
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

	function get_transDetails($trans_id) {
		
		$this->db->from('customers');
		
		$this->db->join('transactions', 'customers.customer_id = transactions.customer_id');
		$this->db->join('trans_details', 'transactions.trans_id = trans_details.trans_id');
		$this->db->where('transactions.trans_id', $trans_id);
		
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

	/*function getAll_customers() {

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
	}*/

	function get_customerID($customer) {

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

	function get_supplierID($customer) {

		$this->db->select('supplier_id');
		$this->db->from('supplier');
		$this->db->where('supplier_name', $customer);
		$result = $this->db->get();
		if($result->num_rows() == 1) {
			foreach ($result->result() as $r) {
				$id = $r->supplier_id;
			}
		}

		return $id;
	}

	function get_search($search)
	{
		$this->db->like('item_code',$search);
		$this->db->or_like('bar_code',$search);
		$this->db->or_like('desc1',$search);
		$this->db->or_like('desc2',$search);
		$this->db->or_like('desc3',$search);
		$this->db->or_like('desc4',$search);
		$this->db->or_like('group',$search);
		$this->db->or_like('class1',$search);
		$this->db->or_like('class2',$search);
		$this->db->or_like('cost',$search);
		$this->db->or_like('retail_price',$search);
		$this->db->or_like('model_quantity',$search);
		$this->db->or_like('supplier_code',$search);
		$this->db->or_like('manufacturer',$search);
		$this->db->or_like('quantity',$search);
		$this->db->or_like('reorder_point',$search);
		$this->db->from('item');

		$query = $this->db->get();

		return $query->result();
	}

	function store_transDetails($trans_id, $item_code, $qty, $subtotal) {
		$this->db->insert('trans_details', array('trans_id'=> $trans_id,
			'item_code'=>$item_code,
			'quantity'=>$qty,
			'price'=>$subtotal
			));
	}

	function store_deliveredItem($delivery_id, $item_code, $qty, $price ) {
		$this->db->insert('delivered_item', array('delivery_id'=>$delivery_id,
			'item_code'=>$item_code,
			'quantity'=>$qty,
			'price'=>$price
			));
	}

	function subtract_item($item_code, $qty) {
		
		$query = "UPDATE item set quantity=quantity-$qty WHERE item_code='$item_code'";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
	}

	function add_item($item_code, $qty) {
		
		$query = "UPDATE item set quantity=quantity+$qty WHERE item_code='$item_code'";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
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

		function get_supply($ctr) {

		if($ctr==1) $this->db->where('quantity <= reorder_point');
		if($ctr==2) $this->db->where('quantity < reorder_point');

		$this->db->from('item');
		$this->db->group_by('supplier_code');
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

	function get_items_insupply($supply,$ctr) {

		$this->db->where('supplier_code',$supply);
		if($ctr==1) $this->db->where('quantity <= reorder_point');
		if($ctr==2) $this->db->where('quantity < reorder_point');

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

	function update_credit($customer_id, $payment) {

		$query = "UPDATE customers set balance=balance-$payment WHERE customer_id='$customer_id'";
		$this->db->query($query);	
	}
	
}
?>