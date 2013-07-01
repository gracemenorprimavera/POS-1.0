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

/* EXPENSES FORM */
    function goto_expensesForm($msg = NULL) {
    	if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Expenses successfully recorded!';
		else $data['msg'] = 'Failed to record expenses!';

		$user= $this->session->userdata('role');
		$is_open = $this->session->userdata('open');
		if($user=='cashier' && (!isset($is_open) || $is_open != true)) {
			$data['message']='Cashier is not yet open. You won\'t be able to record expenses. <br>To open cashier, <span>'.anchor('cashier/open_amount', 'Record Opening Amount').'</span>';	
			//die();
			$data['header'] = 'Expenses';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			//$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template2', $data);
		}
		else {

	        $data['header'] = 'Expenses';
	        
	        if($user=='manager')
				$data['flag'] = 3;
			else if($user=='admin') 
				$data['flag'] = 1;

	        $data['page'] = 'forms/expense_form';
	        $this->load->view('template2', $data);
	    }
    }

    function add_expense() {
    	$this->load->model('expenses_model');
    	$user = $this->session->userdata('role'); 
    	$status = $this->input->post('expenses_dropdown');
        $date = $this->input->post('expenseDate');
        $desc = $this->input->post('exp_desc');
        $amount = $this->input->post('expense_amount');         
       
        if($this->expenses_model->store_expenses($status, $date, $desc, $amount))
        	$msg = true;
        else $msg = false;

       	if($user=='admin') // return to form
        	redirect('expenses/goto_expensesForm/'.$msg);
        else 	// return to form
        	redirect('manager/goto_expensesForm/'.$msg);
		
    }

/* CASHOUT FORM */
    function goto_cashoutForm($msg = NULL) {
    	if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Cash out successfully recorded!';
		else $data['msg'] = 'Failed to record cashout!';

		$user= $this->session->userdata('role');
		$is_open = $this->session->userdata('open');
		if($user=='cashier' && (!isset($is_open) || $is_open != true)) {
			$data['message']='Cashier is not yet open. You won\'t be able to record expenses. <br>To open cashier, <span>'.anchor('cashier/open_amount', 'Record Opening Amount').'</span>';	
			//die();
			$data['header'] = 'Cash Out';
			$data['page'] = 'dummy';
			$data['flag'] = 2;
			$this->load->view('template2', $data);
		}
		else {

	        $data['header'] = 'Cash Out';   
	        if($user=='manager')
				$data['flag'] = 3;
			else if($user=='admin') 
				$data['flag'] = 1;

	        $data['page'] = 'forms/cashout_form';
	        $this->load->view('template2', $data);
	    }
    }

    function add_cashout() {
    	$this->load->model('expenses_model');
    	$user = $this->session->userdata('role'); 
    	$status = $this->input->post('cashout_dropdown');
        $date = $this->input->post('cashoutDate');
        $desc = $this->input->post('cashout_desc');
        $amount = $this->input->post('cashout_amount');         
       	
       	//echo "$status, $date, $desc, $amount";
        if($this->expenses_model->store_cashout($status, $date, $desc, $amount))
        	$msg = true;
        else $msg = false;

       	if($user=='admin') // return to form
        	redirect('expenses/goto_cashoutForm/'.$msg);
        else 	// return to form
        	redirect('manager/goto_cashoutForm/'.$msg);
		
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


/* VIEW EXPENSES */
    function view_expenses() {
		$this->load->model('expenses_model');
		$data['detail_flag'] = false; 

		if($this->expenses_model->getAll_expenses()) {
			$data['expenses'] = $this->expenses_model->getAll_expenses();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Expenses';

		$data['header'] = 'Expenses Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/expenses_list';
		$this->load->view('template2', $data);
	}

	function view_expensesDetails($date) {
		$this->load->model('expenses_model');
		$data['detail_flag'] = true; 
		$data['expenses'] = $this->expenses_model->getAll_expenses();
		$data['date'] = $date;
		$data['daily'] = $this->expenses_model->getAll_expenses_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Expenses Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/expenses_list';
		$this->load->view('template2', $data);
	}

/* VIEW CASHOUT*/
    function view_cashout() {
		$this->load->model('expenses_model');
		$data['detail_flag'] = false; 

		if($this->expenses_model->getAll_cashout()) {
			$data['cashout'] = $this->expenses_model->getAll_cashout();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Cash Out Record Found';

		$data['header'] = 'Cash Out Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/cashout_list';
		$this->load->view('template2', $data);
	}

	function view_cashoutDetails($date) {
		$this->load->model('expenses_model');
		$data['detail_flag'] = true; 
		$data['cashout'] = $this->expenses_model->getAll_cashout();
		$data['date'] = $date;
		$data['daily'] = $this->expenses_model->getAll_cashout_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Cash Out Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/cashout_list';
		$this->load->view('template2', $data);
	}
}
?>