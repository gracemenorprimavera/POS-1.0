<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cashier extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
       /* if(! $this->session->userdata('validated')){
            redirect('pos');
        } */
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='cashier')
		{
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Cashier');	
			die();

		}		
    }

   function index() {

		$data['header'] = 'Cashier';
		$is_open = $this->session->userdata('open');
		if(!isset($is_open) || $is_open != true)
		{
			echo 'You don\'t have permission to access this page.'.anchor('pos/opening', 'Register Opening Bills');	
			die();

		}	
		else {
			$data['page'] = 'cashier_home';
			//$data['subpage'] = 'dummy';

			$this->load->view('template', $data);
		}
	}

	function grace() {

	}

	function purchase() {
		$data['message'] = "";
		$data['header'] = 'New Transaction';
		
		//$data['page'] = 'cashier_home';
		//$data['subpage'] = 'cashier/purchase_main';
		$data['page'] = 'cashier/purchase_main';
		$data['customer'] = $this->pos_model->getAll_customers();
		//$data['subpage'] = 0;

		$this->load->view('template', $data);
	}

	function add_item() {

		$bar_code = $this->input->post('search_item');
		$qty = $this->input->post('quantity');

		$this->form_validation->set_rules('search_item','Bar Code', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
		

		if($this->form_validation->run() == FALSE) {
			$data['message'] = 'All fields are required!';

			$data['header'] = 'New Transaction';
		
			//$data['page'] = 'cashier_home';
			//$data['subpage'] = 'cashier/purchase_main';
			$data['page'] = 'cashier/purchase_main';
			$data['subpage'] = 0;
			$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template', $data);
		}
		else {
			$this->db->from('item');
			$this->db->where('bar_code', $bar_code);
			$result = $this->db->get();


			if($result->num_rows() == 1) {
				foreach($result->result() as $r) {

					$flag = TRUE;
			       
			        foreach ($this->cart->contents() as $item) {
			            if ($item['id'] == $r->item_id) {
			                //echo "Found Id so updatig quantity";
			                $item['qty']=$item['qty']+$qty;
			                $this->cart->update($item);
			                $flag = FALSE;
			                break;
			            }
			        }
			        if($flag) {

						$data = array(
			               'id'      => $r->item_id,
			               'qty'     => $qty,
			               'price'   => $r->retail_price,
			               'name'    => $r->desc1
			            );
			            $this->cart->insert($data);
			        }
		        }
		    	$data['message'] = '';
		    }
		    else {
		    	$data['message'] = 'No item found!';		
		    }
		   
				$data['header'] = 'New Transaction';
		
				//$data['page'] = 'cashier_home';
				//$data['subpage'] = 'cashier/purchase_main';
				$data['page'] = 'cashier/purchase_main';
				$data['subpage'] = 0;
				$data['customer'] = $this->pos_model->getAll_customers();
				$this->load->view('template', $data);		
		}
	}

	function remove_item($rowid) {

		$data = array(
               'rowid' => $rowid,
               'qty'   => 0
            );

		$this->cart->update($data);
		$data['message'] = 'Item succesfully canceled!';		
		    
		$data['customer'] = $this->pos_model->getAll_customers();
		$data['header'] = 'New Transaction';
		
		//$data['page'] = 'cashier_home';
		//$data['subpage'] = 'cashier/purchase_main';
		$data['page'] = 'cashier/purchase_main';
		$data['subpage'] = 0;

		$this->load->view('template', $data);	
	}

	function do_purchase() {

		$mode = $this->input->post('paymentChoice');

		$total = $this->cart->total();
		
		if($mode=='cash') {	
				// insert transactions 
			$this->db->insert('transactions', array('trans_id'=>NULL,  
				'trans_date'=>date('y-m-d'),
				'total_amount'=>$total
				));
						
			$trans_id = $this->db->insert_id();	/* get last transaction id */

				// insert trans_details 
			$i = 1;
			foreach ($this->cart->contents() as $items):
				$this->pos_model->store_transDetails($trans_id, $items['id'], $items['qty'], $items['subtotal']);
					// decrease item in the stocks 
				$this->pos_model->subtract_item($items['id'], $items['qty']);
				$i++;
			endforeach;
		}
		else {
			$customer_id = $this->input->post('customerName');
				// insert credits 
			$this->db->insert('credits', array('credit_id'=>NULL,  
				'customer_id'=>$customer_id,
				'credit_date'=>date('y-m-d'),
				'total_amount'=>$total
				));

			$credit_id = $this->db->insert_id();	/* get last credit id*/

				// insert credit_details 
			$i = 1;
			foreach ($this->cart->contents() as $items):
				$this->pos_model->store_creditDetails($credit_id, $items['id'], $items['qty'], $items['subtotal']);
					// decrease item in the stocks 
				$this->pos_model->subtract_item($items['id'], $items['qty']);
				$i++;
			endforeach;

				// update balance 
			$this->pos_model->update_balance($customer_id, $total);

		}
			
		$this->cart->destroy();
		redirect('cashier');
	}



	function cancel_trans() {
		$this->cart->destroy();
		redirect('cashier');

	}

	function createDelivery(){
		//$this->load->helper('form');
		//$this->load->library('form_validation');
		
		$this->form_validation->set_rules('invoiceDate', 'Date', 'required');				//require date
		$this->form_validation->set_rules('outgoing' ,'Supplier name', 'required|callback_supplier_check');					//require supplier
		$this->form_validation->set_rules('invoiceItem', 'Item code' , 'required');					//require item code
		$this->form_validation->set_rules('invoiceQty', 'Item quantity' , 'required');				//require item quantity
		$this->form_validation->set_rules('invoicePrice', 'Item price' , 'required');				//require	item price
		$this->form_validation->set_rules('invoiceAmt', 'Item amount' , 'required');				//require item amount

		if ($this->form_validation->run() === FALSE)
		{
			$data['header'] = 'Cashier';
			$data['page'] = 'cashier/incoming_main';
			$data['supplier'] = $this->pos_model->getAll_supplier();
			$this->load->view('template', $data);
		}
		else
		{	
			$supplier = $this->input->post('outgoing');
			$desc = $this->input->post('in_desc');
			$item = $this->input->post('invoiceItem');
			$qty = $this->input->post('invoiceQty');
			$price = $this->input->post('invoiceAmt');
			$total = $this->input->post('totalPrice');
				
			$id = $this->pos_model->get_supplierID($supplier); // get supplier id 
				// create delivery 
			$this->db->insert('delivery', array('supplier_id'=>$id, 
				'delivery_id'=>NULL, 
				'date_delivered'=>date('y-m-d'),
				'description'=>$desc,
				'total_amount'=>$total
				));
						
			$delivery_id = $this->db->insert_id();	// get delivery ID 

				// insert delivered_items 
			$i = 0;
			foreach($item as $d): 
				$this->pos_model->store_deliveredItem($delivery_id, $item[$i], $qty[$i], $price[$i]);
				$this->pos_model->add_item($item[$i], $qty[$i]);
				$i++;

			endforeach;

			redirect('cashier/incoming');
		}
	}
	

	function createOutgoing(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['header'] = 'Cashier';
		
		$this->form_validation->set_rules('outgoingDate', 'Date', 'required');				//require date
		$this->form_validation->set_rules('outgoing' ,'Status', 'required');					//require supplier
		//$this->form_validation->set_rules('outgoing','Supplier name', 'callback_supplier_check');	//check if supplier is not ''
		$this->form_validation->set_rules('outgoingItem', 'Item code' , 'required');					//require item code
		$this->form_validation->set_rules('outgoingQty', 'Item quantity' , 'required');				//require item quantity
		$this->form_validation->set_rules('outgoingPrice', 'Item price' , 'required');				//require	item price
		$this->form_validation->set_rules('outgoingAmt', 'Item amount' , 'required');				//require item amount

		if ($this->form_validation->run() === FALSE)
		{
			$data['header'] = 'Cashier';
			$data['page'] = 'cashier/incoming_main';
			$data['subpage'] = 'cashier/incoming_main';
			$data['supplier'] = $this->pos_model->getAll_supplier();
			$this->load->view('template', $data);
		}
		else
		{	
			$status = $this->input->post('outgoing');
			$desc = $this->input->post('out_desc');
			$item = $this->input->post('outgoingItem');
			$qty = $this->input->post('outgoingQty');
			$price = $this->input->post('outgoingAmt');
			$total = $this->input->post('outTotalPrice');
				
				/* create outgoing */
			$this->db->insert('outgoing', array('outgoing_id'=>NULL, 
				'date_out'=>date('y-m-d'),
				'description'=>$desc,
				'amount'=>$total,
				'status'=>$status
				));
				
				/* get outgoing ID */
			$outgoing_id = $this->db->insert_id();
			//echo $delivery_id;

				/* insert out_items */
			$i = 0;
			foreach($item as $d): 
				
				$this->pos_model->store_outItem($outgoing_id, $item[$i], $qty[$i], $price[$i]);
				echo $item[$i].'<br>'.$qty[$i].'<br>'.$price[$i].'<br>';
				//$this->pos_model->subtract_item($items['id'], $items['qty']);
				//$this->pos_model->add_item($item[$i], $qty[$i]);
				$i++;

			endforeach;

			//redirect('cashier/outgoing');
		}
	}

	function createExpense() {
		$status = $this->input->post('expenses_dropdown');
		$date = $this->input->post('expenseDate');
		$desc = $this->input->post('exp_desc');
		$amount = $this->input->post('expense_amount');	
		
		$this->pos_model->store_expenses($status, $date, $desc, $amount);

		redirect('pos/cashier_home');
	}
	
	
	public function supplier_check($str)
	{
		if ($str == "")
		{
			$this->form_validation->set_message('supplier_check', 'The %s field can not be empty.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	


	function credit() {

		/*$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['subpage'] = 'cashier/credit_main';

		$this->load->view('template', $data);*/

		if($this->pos_model->getAll_customers()) {
			$data['customers'] = $this->pos_model->getAll_customers();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Customers Found';
 		
		$data['header'] = 'Credit';
		
		$data['page'] = 'view_list';
		$data['list_id'] = 2; // list id # 2 - list of customers
		//$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function outgoing() {

		$data['header'] = 'Outgoing';
		
		$data['page'] = 'cashier/outgoing_main';
		//$data['subpage'] = 'cashier/outgoing_main';

		$this->load->view('template', $data);
	}

	function incoming() {

		$data['header'] = 'Incoming';
		$data['page'] = 'cashier/incoming_main';
		//$data['subpage'] = 'cashier/incoming_main';
		$data['supplier'] = $this->pos_model->getAll_supplier();
		$this->load->view('template', $data);
	}

	function expenses() {

		$data['header'] = 'Expenses';
		
		$data['page'] = 'cashier/expenses_main';
		//$data['subpage'] = 'cashier/expenses_main';

		$this->load->view('template', $data);
	}

	function search() {

		$data['header'] = 'Search';
		
		$data['page'] = 'cashier/search_main';
		//$data['subpage'] = 'cashier/search_main';

		$this->form_validation->set_rules('search','search item','');

		$search = $this->input->post('search');

		if ($this->form_validation->run() == FALSE){

			$data['results'] = FALSE;
 
 			$this->load->view('template', $data);
 
		}
		else {

				$data['search'] = $search;

				$data['results'] = $this->pos_model->get_search($search);

				$this->load->view('template', $data);
		}		
	}

	function inventory() {

		$data['header'] = 'Inventory';
		
		$data['page'] = 'inventory_main';
		//$data['subpage'] = 'inventory_main';

		$this->load->view('template', $data);
	}

	function amount() {

		$data['header'] = 'Opening & Closing Amount';
		
		$data['page'] = 'forms/bills_form';
		//$data['subpage'] = 'forms/bills_form';

		$this->load->view('template', $data);
	}


	
	function pay_credit($customer_id) {
		$payment = 2;
		$this->pos_model->update_credit($customer_id, $payment);

		$this->load->view('cashier/success');
	}

	function view_customerDetails($customer_id) {
		if($this->pos_model->get_customerDetails($customer_id)) {
			$data['customers'] = $this->pos_model->get_customerDetails($customer_id);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Details Found';
 		
		$data['header'] = 'Cashier';
		
		//$data['page'] = 'cashier_home';
		$data['list_id'] = 4; // list id # 4 - list of customers' transactions
		$data['page'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function view_transDetails($trans_id) {
		if($this->pos_model->get_transDetails($trans_id)) {
			$data['transactions'] = $this->pos_model->get_transDetails($trans_id);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Transactions Found';
 		
		$data['header'] = 'Cashier';
		
		//$data['page'] = 'cashier_home';
		$data['list_id'] = 5; // list id # 5 - list of transactions' details
		$data['page'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function reports() {

		$data['header'] = 'Report';
		
		$data['page'] = 'cashier/reports_main';
		//$data['subpage'] = 'cashier/reports_main';

		$this->load->view('template', $data);
	}

	function close_store() {
		
		$this->pos_model->record_report();
		$this->session->sess_destroy();
		redirect('pos');
	}

	function view_reports() {

		if($this->pos_model->getAll_reports()) {
			$data['report'] = $this->pos_model->getAll_reports();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Reports Found';
 		
		$data['header'] = 'Reports';
		
		$data['page'] = 'report_list';
		
		//$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function view_daily_report($report_id, $report_date) {

		$data['report'] = $this->pos_model->get_dailyReport($report_id);
		$data['expenses'] = $this->pos_model->getAll_expenses_byDate($report_date);
		$data['message'] = '';
		$data['header'] = 'Daily Report';
		
		$data['page'] = 'forms/report_form';
		//print_r($data['expenses']);
		//$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);


	}

	function closing() {
		$data['header'] = 'Closing';
		
		$data['page'] = 'forms/closing_form';
		//$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}


}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */