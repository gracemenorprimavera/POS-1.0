<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cashier extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='cashier') {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Cashier');	
			die();
		}		
    }
    function view_help() {
    	$data['message'] = " ";
			$data['header'] = 'Cashier';
			$data['customer'] = $this->pos_model->getAll_customers();
			$data['page'] = 'help';
			$data['searchMode'] = 'Barcode';
			$data['flag'] = 4;
			$this->load->view('template3', $data);
    }

    function new_cashier() {
    	$is_open = $this->session->userdata('open');
    	if($is_open != true) {
			$data['message']='Cashier is not yet open.<br> To open, <span>'.anchor('#', 'Register Opening Amount','class="dialogThis2" id="startDialog"').'</span>';	
			//die();
			$data['header'] = 'Cashier Close';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			//$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template3', $data);
		}
		else {
			$data['message'] = " ";
			$data['header'] = 'Cashier';
			$data['customer'] = $this->pos_model->getAll_customers();
			$data['page'] = 'forms/sales_form';
			$data['searchMode'] = 'Barcode';
			$data['flag'] = 4;
			$this->load->view('template3', $data);
		}
	}

/* CASHIER */

    function index() {
		$data['header'] = 'Cashier';
		$data['flag'] = 0;
		
		$data['page'] = 'cashier_home';
		$this->load->view('template2', $data);
		
	}

	function open_amount() {
		$is_open = $this->session->userdata('open');
		$user= $this->session->userdata('role');
		if($is_open == true) {
			$data['message']='Cashier is already open.<br> To close, <span>'.anchor('cashier/close_amount', 'Record Closing Amount').'</span>';	
			//die();
			$data['header'] = 'Opening Amount';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			//$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template2', $data);
		}
		else {
			$data['header'] = 'Bills & Coins Form';
			$data['flag'] = 2;	
			$data['page'] = 'forms/bills_form';
			$this->load->view('template2', $data);
		}
	}

	function close_amount() {
		$is_open = $this->session->userdata('open');
		$user= $this->session->userdata('role');
		if(!isset($is_open) || $is_open != true) {
			$data['message']='Cashier is not yet open.<br> To open, <span>'.anchor('cashier/open_amount', 'Record Opening Amount').'</span>';	
			//die();
			$data['header'] = 'Closing Amount';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			//$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template2', $data);
		}
		else {
			$data['header'] = 'Bills & Coins Form';
			$data['flag'] = 2;	
			$data['page'] = 'forms/closing_form';
			$this->load->view('template2', $data);
		}
	}

	function register_amount() {

		$mode =  $this->input->post('registerMode');
		$bills = $this->input->post('billsTotal');
		$coins = $this->input->post('coinsTotal');
		$date = $this->input->post('amountDate');
		
		//echo $date;
		if($mode == 'opening'){
			$this->pos_model->register_amount($mode,$bills + $coins,$bills,$coins, $date);
			redirect('cashier/new_cashier');
		}
		else if($mode == 'closing'){
			$this->pos_model->register_amount($mode,$bills + $coins,$bills,$coins, $date);
			redirect('cashier/new_cashier');
		}	
	}

	function record_report() {
		$this->pos_model->record_report();
		$this->session->unset_userdata('open');
		$data['header'] = 'Closing Amount';
		$data['flag'] = 2;	
		$data['page'] = 'success';
		//$this->load->view('template2', $data);
		redirect('cashier/reports');
	}

	function close_store() {
		
		$this->session->sess_destroy();
		redirect('pos');
	}


/* SALES */

	// refer to Sales Controller


/* CREDITS */

	// refer to Credits Controller


/* OUTGOING */




/* SEARCH */

	function search() {

		$data['header'] = 'Search';
		$data['flag']=2;
		$data['page'] = 'cashier/search_main';
		
		$this->form_validation->set_rules('search','search item','');

		$search = $this->input->post('search');
		$searchin = $this->input->post('search_dropdown');

		if ($this->form_validation->run() == FALSE){
			$data['results'] = FALSE;
 			$this->load->view('template2', $data);
		}
		else {
			if ($searchin == 'ps' && $search != ' '){
				$data['results'] = $this->pos_model->get_search($search,$searchin);
			}else{
				$data['results'] = $this->pos_model->get_search($search,$searchin);
			}
				$data['search'] = $search;
				$this->load->view('template2', $data);
				//echo $this->input->get('last_url', $data);
				//redirect($this->input->get('last_url', $data));
		}		
	}
	function goto_search_items() {
		$search = $this->input->post('search'); // $supplier_name= $this->input->post('supplier_name');
		$searchin = $this->input->post('search_dropdown');
	
		$output="<div class='overlay-containter'>";
		if($this->pos_model->get_search($search,$searchin)) {
			$data['items'] = $this->pos_model->get_search($search,$searchin);	
			
			foreach($data['items'] as $row){
				$output .= $row->item_code;
			}			
		}
		$output .= "</div>";
		echo $output;	
	}



/*REPORTS */
	function reports() {
		$data['detail_flag'] = false; 

		if($this->pos_model->getAll_reports()) {
			$data['report'] = $this->pos_model->getAll_reports();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Reports Found';
 		
		$data['header'] = 'Reports';
		$data['flag'] = 2;
		$data['page'] = 'lists/report_list';		
		$this->load->view('template2', $data);
	}

	function view_daily_report($report_id, $report_date) {
		$this->load->model('expenses_model');
		$data['detail_flag'] = true;
		$data['date'] = $report_date;
		$data['report'] = $this->pos_model->getAll_reports(); 
		$data['daily_report'] = $this->pos_model->get_dailyReport($report_id);
		$data['expenses'] = $this->expenses_model->getAll_cashout_byDate($report_date);
		$data['message'] = '';
		$data['header'] = 'Daily Report';
		$data['flag'] = 2;
		$data['report_id'] = $report_id;
		$data['report_date'] = $report_date;
		$data['page'] = 'lists/report_list';
		//$data['page'] = 'forms/genreport_form';
		$this->load->view('template2', $data);
		
	}
	
	function pdf($report_id,$report_date)	//fetch the report id and report date
	{
		$this->load->model('expenses_model');
	    $this->load->helper(array('dompdf', 'file')); 		//load the pdf conversion helper
	    $this->load->helper('download');					//load download helper
	    $data['report'] = $this->pos_model->get_dailyReport($report_id);	//get report data
		$data['expenses'] = $this->expenses_model->getAll_cashout_byDate($report_date);
		$data['report_date'] = $report_date;
		//$this->load->view('forms/report_form2',$data);
	   	$html =  $this->load->view('forms/report_form2',$data,true);	//put to html
	    $data = pdf_create($html, '', false);							//create pdf
	   	force_download($report_date.'_dsr.pdf', $data); 				//download pdf
	   	//write_file('name', $data);
	}

/* Load */

	function load() {
		$is_open = $this->session->userdata('open');
		$user= $this->session->userdata('role');
		if(!isset($is_open) || $is_open != true) {
			$data['message']='Cashier is not yet open. You won\'t be able to record e-load transactions.<br> To open, <span>'.anchor('cashier/open_amount', 'Record Opening Amount').'</span>';	
			//die();
			$data['header'] = 'E-load';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			//$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template2', $data);
		}
		else {
			$data['header'] = 'E-load';
			$data['flag'] = 2;	
			$data['page'] = 'forms/load_form';
			$this->load->view('template2', $data);
		}
	}

	function add_load_sales() {
		$network = $this->input->post('load_dropdown');
		$amount = $this->input->post('load_amount');
		$date = $this->input->post('loadDate');
		
		$this->db->insert('eload',array(
				'load_id'=>NULL,
				'network'=>$network,
				'date'=>$date,
				'status'=>'sales',
				'amount'=>$amount				
			));
		
		/*$load_id = $this->db->insert_id();
		$query = "UPDATE eload set load_cost=($prev_balance-$balance) WHERE load_id=$load_id";
		$this->db->query($query);

		$query = "UPDATE eload set profit=amount-load_cost WHERE load_id=$load_id";
		$this->db->query($query);

		$query = "UPDATE eload_balance set balance=$balance WHERE network='$network'";
		$this->db->query($query);
		*/

		$this->db->insert('transactions', array('trans_id'=>NULL, 
				'payment'=>'cash',
				'date'=>$date,
				'time'=>'',
				'amount'=>$amount
				)); 
		$id = $this->db->insert_id();	// take last id of the transaction
		$qtr = "UPDATE transactions SET time=(select curtime()) where trans_id=$id";
		$this->db->query($qtr);

			// insert cash transactions
		$this->db->insert('cash', array('trans_id'=>$id,
			'cash_id'=>NULL,  
			'trans_date'=>$date, //date('y-m-d'),
			'total_amount'=>$amount
				));

		$trans_id = $this->db->insert_id();
		
		$this->db->insert('trans_details', array('trans_id'=> $trans_id,
			'item_id'=>null,
			'division'=>'load',
			'cash_quantity'=>0,
			'cash_price'=>$amount,
			'date'=>$date
			));

		redirect('cashier/new_cashier');
	}

	function goto_eloadForm($msg = NULL) {		
		if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Load successfully updated!';
		else $data['msg'] = 'Load not successfully updated';

		$data['header'] = 'E-load';
		$data['flag'] = 2;	
		$data['page'] = 'forms/load_form2';
		$this->load->view('template2', $data);
	}
	
	function add_load() {
		$network = $this->input->post('load_dropdown');
		$balance = $this->input->post('load_balance'); // load wallet
		$date = $this->input->post('loadDate');
		
		if($this->db->insert('eload',array(
				'load_id'=>NULL,
				'network'=>$network,
				'date'=>$date,
				'status'=>'wallet',
				'amount'=>$balance,							
			)))
			$msg = true;
		else
			$msg = false;
		$load_id = $this->db->insert_id();
		redirect('cashier/new_cashier');
	}

 

/* EMPLOYEE */
	function view_dtrform() {
		$data['header'] = 'DTR';
			$data['flag'] = 2;	
			$data['employee'] =  $this->pos_model->getAll_employee();
			$data['page'] = 'forms/dtr_form';
			$this->load->view('template2', $data);
	}

	function employee_time() {
			//echo 'no';
			$data['header'] = 'DTR';
			$data['flag'] = 2;	
			$data['employee'] =  $this->pos_model->getAll_employee();
			$data['page'] = 'forms/dtr_form';
			//$this->load->view('template2', $data);
			echo $this->load->view('forms/dtr_form',$data);
		

		/*$data['header'] = 'DTR';
		$data['flag'] = 2;	
		$data['employee'] =  $this->pos_model->getAll_employee();
		$data['page'] = 'forms/dtr_form';
		$this->load->view('template2', $data);*/
	}

	function employee_logout() {
		$this->session->unset_userdata('emp_login');
		$this->session->unset_userdata('empname');
		$this->session->unset_userdata('empid');

		//redirect('cashier/employee_time');

	}

	function view() {
		$data['header'] = 'Return Item';
		$data['flag'] = 2;	
		//$data['employee'] =  $this->pos_model->getAll_employee();
		$data['page'] = 'forms/return_form';
		$this->load->view('template2', $data);
	}

	function search2($mode) {
		
		$search = $this->input->post('tag');

		if($this->pos_model->get_search2($search,$mode)){
			echo json_encode($this->pos_model->get_search2($search,$mode));
			//echo 'true';
		}
		
				
	}
	function dialog_show($mode){
		if($mode == 'custPayDialog') {
			echo $this->load->view('forms/payment_form.php');
		}
		if($mode == 'cashoutDialog') {
			$data['msg'] = '';
			echo $this->load->view('forms/cashout_form.php', $data);
		}
		else if($mode == 'loadDialog') {
			echo $this->load->view('forms/load_form.php');
		}
		else if($mode == 'incomingloadDialog') {
			$data['msg'] = '';
			echo $this->load->view('forms/load_form2.php', $data);
		}
		else if($mode == 'startDialog')
			echo $this->load->view('forms/bills_form.php');
		else if($mode == 'endDialog')
			echo $this->load->view('forms/closing_form.php');
		else if($mode == 'dtrDialog') 
			echo $this->load->view('forms/dtr_form.php');
		else if($mode == 'returnDialog') 
			echo $this->load->view('forms/return_form.php');
		else if($mode == 'cashDialog') 
			echo $this->load->view('forms/cash_form.php');
		else if($mode == 'discountDialog') 
			echo $this->load->view('forms/discount_form.php');
		else if($mode == 'customerDialog') {
			$data['customer_flag'] = false;
			$data['trans_flag'] = false;
			$data['message'] = '';
			$data['customers'] = $this->pos_model->getAll_customers();
			echo $this->load->view('lists/customer_list2.php', $data);
		}else if($mode == 'customer2Dialog') {
			$data['customer_flag'] = true;
			$data['trans_flag'] = false;
			$data['customers'] = $this->pos_model->getAll_customers();
			$data['message'] = '';
			echo $this->load->view('lists/customer_list2.php', $data);
		}

		else return false;	
	}

	function add_return(){
		$this->load->model('outgoing_model');
		$user = $this->session->userdata('role');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('outgoingDate', 'Date', 'required');				//require date
							
		$this->form_validation->set_rules('outgoingItem', 'Item code' , 'required');					//require item code
		$this->form_validation->set_rules('outgoingQty', 'Item quantity' , 'required');				//require item quantity
		$this->form_validation->set_rules('outgoingPrice', 'Item price' , 'required');				//require	item price
		$this->form_validation->set_rules('outgoingAmt', 'Item amount' , 'required');				//require item amount

		if ($this->form_validation->run() === FALSE)
		{
			$data['header'] = 'Outgoing';
			$data['flag'] = 2;
			$data['page'] = 'forms/return_form';
			//$data['supplier'] = $this->pos_model->getAll_supplier();
			$this->load->view('template3', $data);
		}
		else
		{	
			$status = $this->input->post('outgoing');
			$desc = $this->input->post('out_desc');
			$item = $this->input->post('outgoingItem');
			$qty = $this->input->post('outgoingQty');
			$price = $this->input->post('outgoingAmt');
			$total = $this->input->post('outTotalPrice');
			$date = $this->input->post('outgoingDate');
			$hItem = $this->input->post('houtgoingItem');
				
				// create outgoing 
			$this->db->insert('outgoing', array('outgoing_id'=>NULL, 
				'date_out'=>$date,
				'description'=>$desc,
				'amount'=>$total,
				'status'=>'Return'
				));
				 
			$outgoing_id = $this->db->insert_id();	// get outgoing ID
			$qtr = "UPDATE outgoing SET time=(select curtime()) where outgoing_id=$outgoing_id";
			$this->db->query($qtr);

				// insert out_items 
			$i = 0;
			foreach($item as $d): 
				echo "$outgoing_id, $hItem[$i], $item[$i], $qty[$i], $price[$i]"; 
				$this->outgoing_model->store_outItem($outgoing_id, $hItem[$i], $qty[$i], $price[$i]);
				$this->outgoing_model->add_item($hItem[$i], $qty[$i]);
				//$this->pos_model->subtract_cash();
				$i++;

			endforeach;

		if($user=='admin') // return to admin home
        		redirect('outgoing/goto_outgoingPage');
       	 	else 	// return to manager home
        		redirect('cashier/new_cashier');
		}
	}

}

/* End of file cashier.php */
/* Location: ./application/controllers/cashier.php */