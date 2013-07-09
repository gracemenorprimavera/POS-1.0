<?php
class Pos_model extends CI_Model {


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
                    'name' => $row->name,
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

		$this->db->where('name', $role);
		$this->db->where('password', md5($old_pwd));
		$this->db->update('accounts', array('password'=>md5($new_pwd))); 

		if($this->db->affected_rows() == 1)
			return true;
		else
			return false;
	}

	function add_item($item_id, $qty) {	
		$query = "UPDATE item set quantity=quantity+$qty WHERE item_id=$item_id";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
	}

	function getAll_items() {

		$this->db->where('active', 1);
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

	function delete_item($item_id) {
		$this->db->where('item_id',$item_id);
		$this->db->update('item', array('active'=>0));
		//$this->db->delete('item', array('item_code' => $item_code));

	}

	function getAll_customers() {
		$this->db->select('*');
		$this->db->group_by('customer_name');
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

	function getAll_credits() {
		$this->db->select('*');
		$this->db->group_by('date');
		$result = $this->db->get('credit');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_credits_byDate($date) {
		/*$this->db->select('*');
		$this->db->where('date', $date);
		$result = $this->db->get('credit'); */
		$this->db->from('credit');
		$this->db->where('date', $date);
		$this->db->join('customers', 'customers.customer_id = credit.customer_id');
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

	function get_credit_byDate($date) {
		
		$this->db->from('credit');
		$this->db->where('date', $date);
		$this->db->where('status', 'credit');
		$this->db->join('customers', 'credit.customer_id = customers.customer_id');
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

	function get_creditDetails_byDate($date) {
		
		$this->db->from('credit_details');
		$this->db->where('date', $date);
		$this->db->join('item', 'credit_details.item_id = item.item_id');
		//$this->db->join('credit', 'credit_details.credit_id = credit.credit_id');
		//$this->db->join('customers', 'credit.customer_id = customers.customer_id');
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

	function get_creditDetails_byId($id) {
		
		$this->db->from('credit_details');
		$this->db->where('credit_id', $id);
		$this->db->join('item', 'credit_details.item_id = item.item_id');
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


	function get_customerDetails($customer_id) {
		
		$this->db->from('customers');
		$this->db->where('customers.customer_id', $customer_id);
		$this->db->join('credit', 'customers.customer_id = credit.customer_id');
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
		
		$this->db->join('credit', 'customers.customer_id = credit.customer_id');
		$this->db->join('credit_details', 'credit.credit_id = credit_details.credit_id');
		$this->db->join('item', 'item.item_id = credit_details.item_id');
		$this->db->where('credit.credit_id', $trans_id);
		
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

		$this->db->where('item_id',$edit);
		$this->db->from('item');

		$query = $this->db->get();

		return $query->result();
	}

	function update_item($data,$edit){
			
			//update item
			$this->db->where('item_id',$edit);
			$this->db->update('item',$data);
							
	}

/* AJAX */
	function get_item_byCode($item_id){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item_code',$item_id);
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

	function get_item_byId($item_id){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item_id',$item_id);
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
	
	function getAll_employee() {

		$result = $this->db->get('employee');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

/* for incoming */
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

	function get_search($search,$searchin)
	{
		if ($searchin == 'ps'){
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
		}else{
			$this->db->like($searchin,$search);
			$this->db->from('item');
		}

		$query = $this->db->get();

		return $query->result();
	}


	function store_transDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('trans_details', array('trans_id'=> $trans_id,
			'item_id'=>$item_id,
			'division'=>NULL,
			'cash_quantity'=>$qty,
			'cash_price'=>$subtotal,
			'date'=>date('y-m-d')
			));
		$id = $this->db->insert_id();
		$query_str = "UPDATE trans_details set division=(select division from item where item_id=$item_id) where trans_id=$trans_id and item_id=$item_id";
		$this->db->query($query_str);

	}

	function store_creditDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('credit_details', array('credit_id'=> $trans_id,
			'item_id'=>$item_id,
			'division'=>NULL,
			'credit_quantity'=>$qty,
			'price'=>$subtotal,
			'date'=>date('y-m-d')
			));
		$query_str = "UPDATE credit_details set division=(select division from item where item_id='$item_id') where credit_id=$trans_id and item_id=$item_id";
		$this->db->query($query_str);

	}

	function store_checkDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('check_details', array('check_id'=> $trans_id,
			'item_id'=>$item_id,
			'division'=>NULL,
			'quantity'=>$qty,
			'price'=>$subtotal,
			'date'=>date('y-m-d')
			));
		$query_str = "UPDATE check_details set division=(select division from item where item_id='$item_id') where check_id=$trans_id and item_id=$item_id";
		$this->db->query($query_str);

	}


	function store_outItem($outgoing_id, $item_id, $qty, $price ) {
		$this->db->insert('out_item', array('outgoing_id'=>$outgoing_id,
			'item_code'=>$item_id,
			'quantity'=>$qty,
			'price'=>$price
			));
	}

/*	
	function store_expenses($status, $date, $desc, $amount) {
		//echo $date;
		$this->db->insert('expenses', array('expense_id'=>NULL,
			'date_expense'=>$date,
			'amount' =>$amount,
			'description'=>$desc,
			'status'=>$status
			));

	}
*/

	function subtract_item($item_id, $qty) {
		
		$query = "UPDATE item set quantity=quantity-$qty WHERE item_id=$item_id";
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

	function get_division() {

		$this->db->from('item');
		$this->db->group_by('division');
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

	function get_items_indivision($division) {

		$this->db->where('division',$division);
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
	function getAll_items2() {

		$this->db->select('concat(desc1," ",desc2," ",desc3," ",desc4) as label,item_code as item_code,item_id',false);
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

	function getAll_items3($mode) {

		if($mode == 'Barcode') $query = $this->db->query('select CONCAT(COALESCE(item.bar_code,"")," ",COALESCE(item.desc1,"")," ",desc2," ",desc3," ",desc4) as label, item.bar_code as value ,item.item_id from item');
		else if($mode == 'Itemcode') $query = $this->db->query('select CONCAT(COALESCE(item.desc1,"")," ",COALESCE(item.bar_code,"")," ",desc2," ",desc3," ",desc4) as label, item.desc1 as value ,item.item_id from item');

		//if($mode == 'Barcode') $this->db->select("CONCAT(COALESCE(item.bar_code,'None'),' ',COALESCE(item.desc1,'None') as label,item.bar_code as value ,item.item_id",false);
		//else if($mode == 'Itemcode')$this->db->select("CONCAT(COALESCE(item.desc1,'None'),' ',item.COALESCE(bar_code,'None') as label,item.desc1 as value,item.item_id",false);
		//$this->db->from('item');
		//$result = $this->db->get();
		//echo $result;
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}



	function register_amount($mode,$amount,$bills,$coins,$date) {
		//$date = date('y-m-d');
		if($mode == 'opening'){
			$this->db->insert('amount', array('amount_id'=>NULL,
					'date'=>$date,
					'opening_bills'=>$bills,
					'opening_coins'=>$coins,
					'opening_total'=>$amount,
					'closing_bills'=>0,
					'closing_coins'=>0,
					'closing_total'=>0,
					'personnel'=>$this->session->userdata('name')
				));
			$this->session->set_userdata('open', true);
		}

		else if($mode  == 'closing'){
			//$id = $this->db->insert_id();
			$this->db->where('date', $date);
			//$this->db->where('amount_id', $id);
			$this->db->update('amount', array(
					'closing_bills'=>$bills,
					'closing_coins'=>$coins,
					'closing_total'=>$amount
				));
			$this->session->unset_userdata('open');
		}
	}

	function record_report() {

				
		$date = date('y-m-d');	// date
		//$date = '2013-06-21';
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
		
		$q = "UPDATE daily_report set pos_sales=(SELECT SUM(amount) from transactions where date='$date' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set discrepancy=cash_box-pos_sales where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set expenses=(SELECT SUM(amount) from cashout where date_cashout='$date' group by date_cashout) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set in_amount=(SELECT SUM(total_amount) from delivery where date_delivered='$date' group by date_delivered) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set out_amount=(SELECT SUM(amount) from outgoing where date_out='$date' group by date_out) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set credit=(SELECT SUM(amount_credit) from credit where date='$date' and status='credit' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set load_bal=(SELECT SUM(amount) from eload where date='$date' and status='sales' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set load_in=0 where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_grocery=(SELECT SUM(cash_price) from trans_details where date='$date' and division ='grocery' group by date)+(SELECT SUM(price) from credit_details where date='$date' and division ='grocery' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_poultry=(SELECT SUM(cash_price) from trans_details where date='$date' and division ='poultry' group by date)  where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_pet=(SELECT SUM(cash_price) from trans_details where date='$date' and division ='pet' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_load=(SELECT SUM(cash_price) from trans_details where date='$date' and division ='load' group by date) where report_id=$id";
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

	function getAll_amounts() {
		$result = $this->db->get('amount');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_sales() {
		$this->db->select('*');
		
		$this->db->group_by('trans_date');
		$result = $this->db->get('transactions');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_sales_byDate($date) {
		$this->db->select('*');
		$this->db->where('trans_date', $date);
		$result = $this->db->get('transactions');


		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	
/*	
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
		$this->db->from('delivery');
		$this->db->where('date_delivered', $date);
		$this->db->join('supplier', 'supplier.supplier_id = delivery.supplier_id');
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
*/

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

	function update_balance($customer_id, $total, $credit_id) {
		$query = "UPDATE customers set balance=balance+$total WHERE customer_id=$customer_id";
		$this->db->query($query);	


		$query1 = "UPDATE credit set credit_balance=(SELECT balance from customers WHERE customer_id=$customer_id) WHERE credit_id=$credit_id";
		$this->db->query($query1);
	}

	function record_payment($id, $amount) {

		$this->db->insert('credit', array('trans_id'=>NULL,
				'credit_id'=>NULL,  
				'customer_id'=>$id,
				'date'=>date('y-m-d'),
				'status'=>'payment',
				'amount_credit'=>0,
				'amount_paid'=>$amount,
				'credit_balance'=>0
				));

		$credit_id = $this->db->insert_id(); 
		//echo $credit_id;
			// update balance
		$query = "UPDATE customers set balance=balance-$amount WHERE customer_id=$id";
		$this->db->query($query);	

		$query1 = "UPDATE credit set credit_balance=(SELECT balance from customers WHERE customer_id=$id) WHERE credit_id=$credit_id";
		$this->db->query($query1);
	}

	function get_inventory($i){

		if($i==1) $this->db->select(' sum(quantity*retail_price) as inventory');
		elseif ($i==2) $this->db->select(' sum(quantity*cost) as inventory');
		
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

	function get_itemsInventory() {
		$this->db->select('item_code, bar_code, desc1, desc2, desc3, desc4, cost, retail_price, quantity');
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

	function add_supplier($supplier){
		$arr = array('supplier_id'=>NULL,
			'supplier_name'=>$supplier,
			'manufacturer'=>NULL
		);
		$this->db->insert('supplier',$arr);
		if($this->db->affected_rows() > 0)
		{	
		return true;
		}
		else return false;
	}
	
	function fetch_table($table_name){
		 return $result = $this->db->get($table_name);
		
	}

	function getload_balance($network) {
		$this->db->select('balance');
		$this->db->where('network', $network);
		$this->db->from('eload_balance');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->balance;
		}
		else
			$balance = 0;

		return $balance;
	}

	function get_search2($search,$mode)
	{
		if ($mode == 'itemDSearch'){
			$this->db->select('item_code, bar_code, desc1,desc2,desc3,desc4, quantity');
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
		}
		else if($mode == 'priceDSearch'){
			$this->db->select('desc1, bar_code, retail_price');
			$this->db->like('bar_code',$search);
			$this->db->or_like('desc1',$search);
			$this->db->from('item');
		}
		else if($mode == 'custDSearch'){
			$this->db->like('customer_id',$search);
			$this->db->or_like('customer_name',$search);
			$this->db->from('customers');
		}
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

	function getAll_eload() {

		$this->db->from('eload');
		$this->db->order_by('date');
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

	function getAll_load_byDate($date, $network) {
		$this->db->select('*');
		$this->db->where('date', $date);
		$this->db->where('network', $network);
		$result = $this->db->get('eload');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}


	function getAll_emp() {

		$this->db->select('*');
		$result = $this->db->get('employee');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_transID() {
		$this->db->select('trans_id');
		//$this->db->where('network', $network);
		$this->db->from('transactions');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->trans_id;
		}
		else
			$balance = 0;

		return $balance;
	}

	function get_customerBalance($customer) {
		$this->db->select('balance');
		$this->db->where('customer_id', $customer);
		$this->db->from('customers');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->balance;
		}
		else
			$balance = 0;

		return $balance;
	}

	function get_customerName($customer) {
		$this->db->select('customer_name');
		$this->db->where('customer_id', $customer);
		$this->db->from('customers');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->customer_name;
		}
		else
			$balance = 0;

		return $balance;
	}

	/* Returned */
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
		/*$this->db->select('*');
		$this->db->where('date_delivered', $date);
		$result = $this->db->get('delivery');*/
		$this->db->from('delivery');
		$this->db->where('date_delivered', $date);
		$this->db->join('supplier', 'supplier.supplier_id = delivery.supplier_id');
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

	/* Nicole */

	function getAll_expenses_cat(){
		$result = $this->db->get('expenses_category');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function getAll_cashout_cat(){
		$result = $this->db->get('cashout_category');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function getAll_expense_cat(){
		$result = $this->db->get('expenses_category');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function getAll_division_cat(){
		$result = $this->db->get('div_category');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function getAll_outgoing_cat(){
		$result = $this->db->get('outgoing_category');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function getAll_accounts(){
		$result = $this->db->get('accounts');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;

	}

	function get_customerDetails2($customer_id) {
		
		$this->db->from('credit');
		$this->db->where('customer_id', $customer_id);
		$this->db->order_by('date', 'asc');

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


	function add_cashout($cashout){
		$arr = array('cashout_id'=>NULL,
			'cashout'=>$cashout
		);
		$this->db->insert('cashout_category',$arr);
		if($this->db->affected_rows() > 0)
		{	
		return $this->db->insert_id();
		}
		else return false;
	}

	function add_expense($expense){
		$arr = array('expenses_id'=>NULL,
			'expenses'=>$expense
		);
		$this->db->insert('expenses_category',$arr);
		if($this->db->affected_rows() > 0)
		{	
		return $this->db->insert_id();
		}
		else return false;
	}

	function add_division($division){
		$arr = array('div_id'=>NULL,
			'division'=>$division
		);
		$this->db->insert('div_category',$arr);
		if($this->db->affected_rows() > 0)
		{	
		return $this->db->insert_id();
		}
		else return false;
	}

	function add_outgoing($outgoing){
		$arr = array('outgoing_id'=>NULL,
			'outgoing'=>$outgoing
		);
		$this->db->insert('outgoing_category',$arr);
		if($this->db->affected_rows() > 0)
		{	
		return $this->db->insert_id();
		}
		else return false;
	}

	
	function updateItem($id,$key,$value){

			$data = array(
               $key => $value,
            );

		$this->db->where('item_id', $id);
		$this->db->update('item', $data); 

		if($this->db->affected_rows() > 0) return true;
		else return false;
	}

	/* Graycie */
	function add_employee($emp_name,$position, $emp_pwd) {

		$this->db->insert('employee', array('emp_id'=>NULL,
			'name'=>$emp_name,
			'position'=>$position,
			'password'=>md5($emp_pwd)
			));

		if($position=='cashier'){
			$this->db->insert('accounts', array('account_id'=>NULL,
			'name'=>$emp_name,
			'role'=>$position,
			'password'=>md5($emp_pwd)
			));
		}

		if($this->db->affected_rows() == 1)
			return true;
		else
			return false;
	}
	

}
?>