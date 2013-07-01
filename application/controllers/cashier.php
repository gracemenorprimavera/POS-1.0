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

    function new_cashier() {
		$data['message'] = " ";
		$data['header'] = 'Cashier';
		$data['customer'] = $this->pos_model->getAll_customers();
		$data['page'] = 'forms/sales_form';
		$data['searchMode'] = 'Barcode';
		$data['flag'] = 4;
		$this->load->view('template3', $data);
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
			redirect('cashier');
		}
		else if($mode == 'closing'){
			$this->pos_model->register_amount($mode,$bills + $coins,$bills,$coins, $date);
			
			redirect('cashier/record_report');
		}	
	}

	function record_report() {
		$this->pos_model->record_report();
		$this->session->unset_userdata('open');
		$data['header'] = 'Closing Amount';
		$data['flag'] = 2;	
		$data['page'] = 'success';
		//$this->load->view('template2', $data);
		redirect('cashier');
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

		$data['report'] = $this->pos_model->get_dailyReport($report_id);
		$data['expenses'] = $this->pos_model->getAll_expenses_byDate($report_date);
		$data['message'] = '';
		$data['header'] = 'Daily Report';
		$data['flag'] = 2;
		$data['report_id'] = $report_id;
		$data['report_date'] = $report_date;
		$data['page'] = 'forms/report_form';
		$this->load->view('template2', $data);
	}
	
	function pdf($report_id,$report_date)	//fetch the report id and report date
	{

	    $this->load->helper(array('dompdf', 'file')); 		//load the pdf conversion helper
	    $this->load->helper('download');					//load download helper
	    $data['report'] = $this->pos_model->get_dailyReport($report_id);	//get report data
		$data['expenses'] = $this->pos_model->getAll_expenses_byDate($report_date);
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

	function add_load() {
		$network = $this->input->post('load_dropdown');
		$amount = $this->input->post('load_amount');
		$balance = $this->input->post('load_balance');
		$date = $this->input->post('loadDate');

		
		$prev_balance = $this->pos_model->getload_balance($network);
		
		$this->db->insert('eload',array(
				'load_id'=>NULL,
				'network'=>$network,
				'date'=>$date,
				'status'=>'sales',
				'prev_balance'=>$prev_balance,
				'load_balance'=>$balance,
				'amount'=>$amount,
				'load_cost'=>0,
				'profit'=>0			
				
			));
		
		$load_id = $this->db->insert_id();
		$query = "UPDATE eload set load_cost=($prev_balance-$balance) WHERE load_id=$load_id";
		$this->db->query($query);

		$query = "UPDATE eload set profit=amount-load_cost WHERE load_id=$load_id";
		$this->db->query($query);

		$query = "UPDATE eload_balance set balance=$balance WHERE network='$network'";
		$this->db->query($query);

		$this->db->insert('transactions', array('trans_id'=>NULL,  
				'trans_date'=>$date,
				'total_amount'=>$amount
				));

		$trans_id = $this->db->insert_id();
		$this->db->insert('trans_details', array('trans_id'=> $trans_id,
			'item_code'=>'load',
			'division'=>'load',
			'quantity'=>0,
			'price'=>$amount,
			'date'=>$date
			));

		redirect('cashier');
	}

	function view_dtrform() {
		$data['header'] = 'DTR';
			$data['flag'] = 2;	
			$data['employee'] =  $this->pos_model->getAll_employee();
			$data['page'] = 'forms/dtr_form';
			$this->load->view('template2', $data);
	}

	function employee_time() {
		if($this->input->post('username') != "") {
			$uname = $this->input->post('username');
			$pwd = $this->input->post('password');
			$this->pos_model->check_emp($uname, $pwd);
			$data['header'] = 'DTR';
			$data['flag'] = 2;	
			$data['employee'] =  $this->pos_model->getAll_employee();
			$data['page'] = 'forms/dtr_form';
			//$this->load->view('template2', $data);
			echo $this->load->view('forms/dtr_form',$data);
			//echo 'yes';
		}
		else { 
			//echo 'no';
			$data['header'] = 'DTR';
			$data['flag'] = 2;	
			$data['employee'] =  $this->pos_model->getAll_employee();
			$data['page'] = 'forms/dtr_form';
			//$this->load->view('template2', $data);
			echo $this->load->view('forms/dtr_form',$data);
		}

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
		if($mode == 'expenseDialog')
			echo $this->load->view('forms/expense_form.php');
		else if($mode == 'loadDialog')
			echo $this->load->view('forms/load_form.php');
		else if($mode == 'incomingloadDialog')
			echo $this->load->view('forms/load_form2.php');
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
		$user = $this->session->userdata('role');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('outgoingDate', 'Date', 'required');				//require date
		$this->form_validation->set_rules('outgoing' ,'Status', 'required');					//require supplier
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
			$this->load->view('template2', $data);
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
				
				// create outgoing 
			$this->db->insert('outgoing', array('outgoing_id'=>NULL, 
				'date_out'=>$date,
				'description'=>$desc,
				'amount'=>$total,
				'status'=>'return'
				));
				 
			$outgoing_id = $this->db->insert_id();	// get outgoing ID

				// insert out_items 
			$i = 0;
			foreach($item as $d): 
				$this->pos_model->store_outItem($outgoing_id, $item[$i], $qty[$i], $price[$i]);
				$this->pos_model->add_item($items['id'], $items['qty']);
				$this->pos_model->subtract_cash();
				$i++;

			endforeach;

			if($user=='admin') // return to admin home
        		redirect('outgoing/goto_outgoingPage');
       	 	else 	// return to manager home
        		redirect('manager');
		}
	}
}

/* End of file cashier.php */
/* Location: ./application/controllers/cashier.php */