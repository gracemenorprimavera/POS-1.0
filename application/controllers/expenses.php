<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenses extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || ($user!='cashier' && $user!='admin')) {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as '.$user);	
			die();
		}		
    }

    function index() {

		$is_open = $this->session->userdata('open');
		$user= $this->session->userdata('role');
		if($user=='cashier' && (!isset($is_open) || $is_open != true)) {
			echo 'You don\'t have permission to access this page. '.anchor('cashier/open_amount', 'Record Opening Bills');	
			die();
		}

	}

    function goto_expensesPage() {
    	$is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='admin') {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Administrator');	
			die();
		}	

		$data['header'] = 'Administrator';
		$data['flag']=1;
		$data['subnav'] = 3; // sub-navigation for items
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}

    function goto_expensesForm() {
    	
		$user= $this->session->userdata('role');
		$is_open = $this->session->userdata('open');
		if($user=='cashier' && (!isset($is_open) || $is_open != true)) {
			$data['message']='Cashier is not yet open. You won\'t be able to record expenses. <br>To open cashier, <span>'.anchor('cashier/open_amount', 'Record Opening Amount').'</span>';	
			//die();
			$data['header'] = 'Cash out';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			//$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template2', $data);
		}
		else {

	        $data['header'] = 'Cash out';
	        
	        if($user=='cashier')
				$data['flag'] = 2;
		
			else if($user=='admin') 
				$data['flag'] = 1;
	        $data['page'] = 'forms/expense_form';
	        $this->load->view('template2', $data);
	    }
    }

    function add_expense($user) {
    	$status = $this->input->post('expenses_dropdown');
        $date = $this->input->post('expenseDate');
        $desc = $this->input->post('exp_desc');
        $amount = $this->input->post('expense_amount');         
       
        $this->pos_model->store_expenses($status, $date, $desc, $amount);

       	if($user=='admin') // return to admin home
        	redirect('expenses/goto_expensesPage');
        else 	// return to cashier home
        	redirect('cashier');
		
    }

    function view_expenses() {
		$data['detail_flag'] = false; 

		if($this->pos_model->getAll_expenses()) {
			$data['expenses'] = $this->pos_model->getAll_expenses();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Expenses';

		$data['header'] = 'Cash Out Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/expenses_list';
		$this->load->view('template2', $data);
	}

	function view_expensesDetails($date) {
		$data['detail_flag'] = true; 
		$data['expenses'] = $this->pos_model->getAll_expenses();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_expenses_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Cash Out Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/expenses_list';
		$this->load->view('template2', $data);
	}
}
?>