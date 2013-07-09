<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Credits extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || ($user!='cashier' && $user!='admin')) {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as '.$user);	
			die();
		}		
    }

	function index() {
		$is_open = $this->session->userdata('open');
		$user = $this->session->userdata('role');
	

		if($user=='cashier')
			$data['flag'] = 2;
		else if($user=='admin') 
			$data['flag'] = 1;
			
		$data['customer_flag'] = false;
		$data['trans_flag'] = false;
		
		if($this->pos_model->getAll_customers()) {
			$data['customers'] = $this->pos_model->getAll_customers();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Customers Found';
	 		
		$data['header'] = 'Customers';			
		$data['page'] = 'lists/customer_list';
		$this->load->view('template2', $data);		
	}

/* CUSTOMER FORM */
	function goto_customerForm($msg = NULL) {
		if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Customer successfully added!';
		else $data['msg'] = 'Customer not successfully added';
		
		$data['header'] = 'Customer Form';
		$data['flag'] = 1;
		$data['page'] = 'forms/customer_form';
		$this->load->view('template2', $data);
	}

	function add_customer() {

		$name = $this->input->post('customerName');
		$contact = $this->input->post('customerNum');
		$add = $this->input->post('customerAdd');

		$this->db->insert('customers', array('customer_id'=>NULL,
				'customer_name'=>$name,
				'balance'=>0
			));
		$msg = true;
		redirect('credits/goto_customerForm/'.$msg);
	}



	function pay_credit() {
		
		$amount = $this->input->post('customerCash');
		$customer_id = $this->input->post('customerName');
		$this->pos_model->record_payment($customer_id, $amount);	// record payment_details
		//$this->pos_model->update_credit($customer_id, $amount);
		//redirect('credits/view_customerDetails/'.$customer_id);
		if($this->session->userdata('role')=='admin') {
			$uri1= $this->uri->segment(1);
			$uri2= $this->uri->segment(2);
			$uri3= $this->uri->segment(3);
			redirect('admin/view_customers');
		}

		else 	
			redirect('cashier/new_cashier');
	}

	function view_customers() {
		$is_open = $this->session->userdata('open');
		$user = $this->session->userdata('role');
	
		if($user=='cashier')
			$data['flag'] = 2;
		else if($user=='admin') 
			$data['flag'] = 1;
			
		$data['customer_flag'] = false;
		$data['trans_flag'] = false;
		
		if($this->pos_model->getAll_customers()) {
			$data['customers'] = $this->pos_model->getAll_customers();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Customers Found';
	 		
		$data['header'] = 'Customers';			
		$data['page'] = 'lists/customer_list';
		$this->load->view('template2', $data);		
	}

	function view_customerDetails($customer_id) {
		$user = $this->session->userdata('role');

		if($user=='admin') 
			$data['flag'] = 1;
		else
			$data['flag'] = 2;
		$data['customer_flag'] = true;
		$data['trans_flag'] = false;
		$data['customers'] = $this->pos_model->getAll_customers();
		
		if($this->pos_model->get_customerDetails($customer_id)) {
			$data['customers_det'] = $this->pos_model->get_customerDetails($customer_id);
			$data['message1'] = '';
			$data['message'] = '';
		}
		else 
			$data['message1'] = 'No Details Found';
			$data['message'] = '';
 		
		$data['header'] = 'Customers';
		$data['page'] = 'lists/customer_list';
		
		$this->load->view('template2', $data);
	}

	function view_transDetails($trans_id, $customer_id) {
		$user = $this->session->userdata('role');
		if($user=='admin') 
			$data['flag'] = 1;
		else
			$data['flag'] = 2;
		$data['customer_flag'] = true;
		$data['trans_flag'] = true;
		$data['customers'] = $this->pos_model->getAll_customers();
		$data['customers_det'] = $this->pos_model->get_customerDetails($customer_id);
		
		if($this->pos_model->get_transDetails($trans_id)) {
			$data['transactions'] = $this->pos_model->get_transDetails($trans_id);
			$data['message1'] = '';
			$data['message2'] = '';
			$data['message'] = '';
		}
		else 
			$data['message2'] = 'No Transactions Found';
			$data['message1'] = '';
			$data['message'] = '';
 		
		$data['header'] = 'Credits';
		$data['page'] = 'lists/customer_list';
		
		$this->load->view('template2', $data);
	}

	function goto_customerPage() {

		$data['header'] = 'Credits';
		$data['flag']=1;
		$data['subnav'] = 2; // sub-navigation for items
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}

	/* Nicole */
	function view_customerDetails2() {
		
		$customer_id = $this->input->post('customer_id');
		$data = '';
		if($this->pos_model->get_customerDetails2($customer_id)){
			$data = $this->pos_model->get_customerDetails2($customer_id);
			//echo 'true';
		}
		echo json_encode($data);
	}

}

?>