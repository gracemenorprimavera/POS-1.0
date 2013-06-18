<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outgoing extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || ($user!='manager' && $user!='admin')) {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as '.$user);	
			die();
		}		
    }

    function goto_outgoingPage() {
		$is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='admin') {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Administrator');	
			die();
		}
		$data['header'] = 'Administrator';
		$data['flag'] = 1;
		$data['subnav'] = 5; // sub-navigation for items
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}

	function goto_outgoingForm() {
		$user= $this->session->userdata('role');
		$data['header'] = 'Outgoing';
		if($user=='manager')
			$data['flag'] = 3;
		else if($user=='admin') 
			$data['flag'] = 1;	
		$data['page'] = 'forms/outgoing_form';
		$this->load->view('template2', $data);
	}

	function add_outgoing(){
		$user = $this->session->userdata('role');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('outgoingDate', 'Date', 'required');				//require date
		$this->form_validation->set_rules('outgoing' ,'Status', 'required');					//require supplier
		//$this->form_validation->set_rules('outgoing','Supplier name', 'callback_supplier_check');	//check if supplier is not ''
		$this->form_validation->set_rules('outgoingItem', 'Item code' , 'required');					//require item code
		$this->form_validation->set_rules('outgoingQty', 'Item quantity' , 'required');				//require item quantity
		$this->form_validation->set_rules('outgoingPrice', 'Item price' , 'required');				//require	item price
		$this->form_validation->set_rules('outgoingAmt', 'Item amount' , 'required');				//require item amount

		if ($this->form_validation->run() === FALSE)
		{
			$data['header'] = 'Outgoing';
			$data['flag'] = 2;
			$data['page'] = 'forms/outgoing_form';
			$data['supplier'] = $this->pos_model->getAll_supplier();
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
				'status'=>$status
				));
				 
			$outgoing_id = $this->db->insert_id();	// get outgoing ID

				// insert out_items 
			$i = 0;
			foreach($item as $d): 
				$this->pos_model->store_outItem($outgoing_id, $item[$i], $qty[$i], $price[$i]);
				$this->pos_model->subtract_item($items['id'], $items['qty']);
				$i++;

			endforeach;

			if($user=='admin') // return to admin home
        		redirect('outgoing/goto_outgoingPage');
       	 	else 	// return to manager home
        		redirect('manager');
		}
	}

	function view_outgoing() {
		$data['detail_flag'] = false;
		if($this->pos_model->getAll_outgoing()) {
			$data['outgoing'] = $this->pos_model->getAll_outgoing();
			$data['message'] = '';
		}
		else
			$data['message'] = 'No Record of Pull-out';

		$data['header'] = 'Pull-outs Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/outgoing_list';
		$this->load->view('template2', $data);
	}

	function view_outgoingDetails($date) {
		$data['detail_flag'] = true; 
		$data['outgoing'] = $this->pos_model->getAll_outgoing();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_outgoing_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Pull-outs Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/outgoing_list';
		$this->load->view('template2', $data);
	}



}
?>
