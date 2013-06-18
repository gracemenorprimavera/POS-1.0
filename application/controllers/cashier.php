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
		
		$data['page'] = 'forms/sales_form';
		$data['flag'] = 4;
		$this->load->view('template2', $data);
	}

/* CASHIER */

    function index() {
		$data['header'] = 'Cashier';
		$data['flag'] = 2;
		
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

	function search2($mode) {
		
		$search = $this->input->post('tag');

		if($this->pos_model->get_search2($search,$mode)){
			echo json_encode($this->pos_model->get_search2($search,$mode));
			//echo 'true';
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

/* INVENTORY */
	function inventory() {
		$data['header'] = 'Inventory';
		$data['flag']=2;

		$data['page'] = 'inventory_main';
	
		if($this->pos_model->get_itemsInventory()) {
			$data['items'] = $this->pos_model->get_itemsInventory();
			$data['message'] = '';

			$i=1;
			$price=$this->pos_model->get_inventory($i);
				foreach($price as $d)
					$data['price']=round($d->inventory);	

			$i=2;
			$cost=$this->pos_model->get_inventory($i);
				foreach($cost as $d)
					$data['cost']=round($d->inventory);			
		}
		else 
			$data['message'] = 'No Items Found';

		$this->load->view('template2', $data);
	}


/*REPORTS */

	function reports() {
		$is_open = $this->session->userdata('open');
		
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
		$data['page'] = 'forms/report_form';
		$this->load->view('template2', $data);
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

		//echo $network.$amount.$balance;
		$this->db->insert('eload',array(
				'load_id'=>NULL,
				'network'=>$network,
				'date'=>$date,
				'status'=>'eload',
				'eload'=>$amount,
				'wallet'=>0,
				//'load_balance'=>0,
				//'load_cash'=>0
			));
		$id = $this->db->insert_id();
		$query = "UPDATE eload set load_balance=$balance WHERE load_id=$id";
		$this->db->query($query);

		$query = "UPDATE eload set load_cash=load_cash+$amount WHERE load_id=$id";
		$this->db->query($query);

		redirect('cashier');
	}

	function expense_form(){
			include('forms/expense_form.php');
	}
}

/* End of file cashier.php */
/* Location: ./application/controllers/cashier.php */