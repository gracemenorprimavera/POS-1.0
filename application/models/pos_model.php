<?php
class Pos_model extends CI_Model {


	function check_user($password) {

		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->where('password', $password);
		$result = $this->db->get();

		if($result->num_rows() == 1) {
			$row = $result->row();
            $data = array(
                    'userid' => $row->account_id,
                    'role' => $row->role,
                    'validated' => true
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

	function store_transDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('trans_details', array('trans_id'=> $trans_id,
			'item_code'=>$item_id,
			'division'=>NULL,
			'quantity'=>$qty,
			'price'=>$subtotal
			));
		$query_str = "UPDATE trans_details set division=(select division from item where item_id=$item_id)";
		$this->db->query($query_str);

	}

	function store_creditDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('credit_details', array('credit_id'=> $trans_id,
			'item_code'=>$item_id,
			'division'=>NULL,
			'quantity'=>$qty,
			'price'=>$subtotal
			));
		$query_str = "UPDATE credit_details set division=(select division from item where item_id='$item_id')";
		$this->db->query($query_str);

	}


	function store_deliveredItem($delivery_id, $item_code, $qty, $price ) {
		$this->db->insert('delivered_item', array('delivery_id'=>$delivery_id,
			'item_code'=>$item_code,
			'quantity'=>$qty,
			'price'=>$price
			));
	}

	function store_outItem($outgoing_id, $item_code, $qty, $price ) {
		$this->db->insert('out_item', array('outgoing_id'=>$outgoing_id,
			'item_code'=>$item_code,
			'quantity'=>$qty,
			'price'=>$price
			));
	}

	function store_expenses($status, $date, $desc, $amount) {
		$this->db->insert('expenses', array('expense_id'=>NULL,
			'date_expense'=>date('y-m-d'),
			'amount' =>$amount,
			'description'=>$desc,
			'status'=>$status
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

	function getAll_items2() {

		$this->db->select('desc1 as label,item_code as item_code');
		$this->db->from('item');
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

	function getAll_customers2() {
	
		$this->db->select('customer_name as label,customer_id as customer_id');
		$this->db->from('customers');
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

	function getAll_items3() {

		$this->db->select("CONCAT(item.bar_code,' ',item.desc1) as label,item.bar_code as value",false);
		$this->db->from('item');
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

	function register_amount($mode,$amount,$bills,$coins) {
		/*$this->db->insert('amount', array('date'=>date('y-m-d'),
				'opening_bills'=>$amount,
				'opening_coins'=>$amount,
				'opening_total'=>$amount+$amount,
				'closing_bills'=>$amount,
				'closing_coins'=>$amount,
				'closing_total'=>$amount+$amount
			));*/
		if($mode == 'opening'){
			$this->db->insert('amount', array('date'=>date('y-m-d'),
					'opening_bills'=>$bills,
					'opening_coins'=>$coins,
					'opening_total'=>$amount,
					'closing_bills'=>0,
					'closing_coins'=>0,
					'closing_total'=>0
				));
			$this->session->set_userdata('open', true);
		}

		else if($mode  == 'closing'){
			$this->db->where('date', date('y-m-d'));
			$this->db->update('amount', array(
					'closing_bills'=>$bills,
					'closing_coins'=>$coins,
					'closing_total'=>$amount
				));
		}
	}

	function record_report() {

				
		$date = date('y-m-d');	// date

		$this->db->insert('daily_report', array('report_id'=>NULL,
			'date'=>$date
			));
		$id = $this->db->insert_id();

		$q="UPDATE daily_report set open_amt=(SELECT opening_total from amount where date='$date') where report_id=$id";
		$this->db->query($q);
		
		$q="UPDATE daily_report set close_amt=(SELECT closing_total from amount where date='$date') where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set cash_box=close_amt-open_amt where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set pos_sales=(SELECT SUM(total_amount) from transactions where trans_date='$date' group by trans_date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set discrepancy=cash_box-pos_sales where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set expenses=(SELECT SUM(amount) from expenses where date_expense='$date' group by date_expense) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set in_amount=(SELECT SUM(total_amount) from delivery where date_delivered='$date' group by date_delivered) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set out_amount=(SELECT SUM(amount) from outgoing where date_out='$date' group by date_out) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set credit=(SELECT SUM(total_amount) from credits where credit_date='$date' group by credit_date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set load_bal=0 where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set load_in=0 where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_grocery=(SELECT SUM(total_amount) from trans_details, transactions where transactions.trans_date='$date' and transactions.trans_id=trans_details.trans_id and trans_details.division ='grocery' group by division) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_poultry=(SELECT SUM(total_amount) from trans_details, transactions where transactions.trans_date='$date' and transactions.trans_id=trans_details.trans_id and trans_details.division ='poultry' group by division)  where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_pet=(SELECT SUM(total_amount) from trans_details, transactions where transactions.trans_date='$date' and transactions.trans_id=trans_details.trans_id and trans_details.division ='pet' group by division) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_load=(SELECT SUM(total_amount) from trans_details, transactions where transactions.trans_date='$date' and transactions.trans_id=trans_details.trans_id and trans_details.division ='load' group by division) where report_id=$id";
		$this->db->query($q);
	}

	function getAll_reports() {
		$result = $this->db->get('daily_report');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_incoming() {
		$this->db->select('*');
		$this->db->group_by('date_delivered');
		$result = $this->db->get('delivery');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_incoming_byDate($date) {
		$this->db->select('*');
		$this->db->where('date_delivered', $date);
		$result = $this->db->get('delivery');


		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_outgoing() {
		$this->db->select('*');
		$this->db->group_by('date_out');
		$result = $this->db->get('outgoing');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}
	function getAll_outgoing_byDate($date) {
		$this->db->select('*');
		$this->db->where('date_out', $date);
		$result = $this->db->get('outgoing');


		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_expenses() {
		$this->db->select('*');
		$this->db->group_by('date_expense');
		$result = $this->db->get('expenses');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_expenses_byDate($date) {
		$this->db->select('*');
		$this->db->where('date_expense', $date);
		$result = $this->db->get('expenses');


		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_dailyReport($report_id) {
		$this->db->select('*');
		$this->db->where('report_id', $report_id);
		$result = $this->db->get('daily_report');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function update_balance($customer_id, $total) {
		$query = "UPDATE customers set balance=balance+$total WHERE customer_id=$customer_id";
		$this->db->query($query);	
	}
	
}
?>