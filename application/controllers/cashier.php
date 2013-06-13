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

/* CASHIER */

    function index() {
		$data['header'] = 'Cashier';
		$data['flag'] = 2;
		$is_open = $this->session->userdata('open');
		if(!isset($is_open) || $is_open != true) {
			echo 'You don\'t have permission to access this page.'.anchor('cashier/open_amount', 'Record Opening Bills');	
			die();
		}	
		else {
			$data['page'] = 'cashier_home';
			$this->load->view('template2', $data);
		}
	}

	function open_amount() {
		$data['header'] = 'Cashier';
		$data['flag'] = 2;

		$data['page'] = 'forms/bills_form';
		$this->load->view('template', $data);
	}

	function close_amount() {
		$data['header'] = 'Closing Amount';
		$data['flag'] = 2;	
		$data['page'] = 'forms/closing_form';
		$this->load->view('template2', $data);
	}

	function register_amount() {

		$mode =  $this->input->post('registerMode');
		$bills = $this->input->post('billsTotal');
		$coins = $this->input->post('coinsTotal');
		$date = $this->input->post('date');
		
		if($mode == 'opening'){
			$this->pos_model->register_amount($mode,$bills + $coins,$bills,$coins);
			redirect('cashier');
		}
		else if($mode == 'closing'){
			$this->pos_model->register_amount($mode,$bills + $coins,$bills,$coins);
			redirect('cashier/close_store');
		}	
	}

	function close_store() {
		
		$this->pos_model->record_report();
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
		$data['page'] = 'cashier'.$url;
		
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

				//his->load->view('template2', $data);
				redirect($this->input->get('last_url', $data));
		}		
	}


/* INVENTORY */
	function inventory() {

		$data['header'] = 'Inventory';
		$data['flag'] = 2;
		$data['page'] = 'inventory_main';
		$this->load->view('template2', $data);
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
		$data['page'] = 'forms/report_form';
		$this->load->view('template2', $data);
	}

}

/* End of file cashier.php */
/* Location: ./application/controllers/cashier.php */