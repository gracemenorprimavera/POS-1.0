<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incoming extends CI_Controller {

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
/* INCOMING */

	function goto_incomingPage() {
		$is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='admin') {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Administrator');	
			die();
		}
		$data['header'] = 'Administrator';
		$data['flag']=1;
		$data['subnav'] = 4; // sub-navigation for items
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}

	function goto_incomingForm() {
		$user= $this->session->userdata('role');
		$data['header'] = 'Incoming';
		if($user=='manager')
			$data['flag'] = 3;
		else if($user=='admin') 
			$data['flag'] = 1;
		$data['page'] = 'forms/incoming_form';		
		$data['supplier'] = $this->pos_model->getAll_supplier();
		$this->load->view('template2', $data);
	}

	function goto_supplierForm() {
		$user= $this->session->userdata('role');
		$data['header'] = 'Supplier Form';
		if($user=='manager')
			$data['flag'] = 3;
		else if($user=='admin') 
			$data['flag'] = 1;
		$data['page'] = 'forms/supplier_form';		
		$this->load->view('template2', $data);
	}



	function add_incoming(){
		$user = $this->session->userdata('role');
		$this->form_validation->set_rules('invoiceDate', 'Date', 'required');				//require date
		$this->form_validation->set_rules('outgoing' ,'Supplier name', 'required|callback_supplier_check');					//require supplier
		$this->form_validation->set_rules('invoiceItem', 'Item code' , 'required');					//require item code
		$this->form_validation->set_rules('invoiceQty', 'Item quantity' , 'required');				//require item quantity
		$this->form_validation->set_rules('invoicePrice', 'Item price' , 'required');				//require	item price
		$this->form_validation->set_rules('invoiceAmt', 'Item amount' , 'required');				//require item amount

		if ($this->form_validation->run() === FALSE)
		{
			$data['header'] = 'Incoming';
			$data['flag'] = 2;
			$data['page'] = 'forms/incoming_form';
			$data['supplier'] = $this->pos_model->getAll_supplier();
			$this->load->view('template2', $data);
		}
		else
		{	
			$supplier = $this->input->post('outgoing');
			$desc = $this->input->post('in_desc');
			$item = $this->input->post('invoiceItem');
			$qty = $this->input->post('invoiceQty');
			$amount = $this->input->post('invoiceAmt');
			$price = $this->input->post('invoicePrice');
 			$total = $this->input->post('totalPrice');
			$date = $this->input->post('invoiceDate');	

			$id = $this->pos_model->get_supplierID($supplier); // get supplier id 
				
				// create delivery 
			$this->db->insert('delivery', array('supplier_id'=>$id, 
				'delivery_id'=>NULL, 
				'date_delivered'=>$date,
				'description'=>$desc,
				'total_amount'=>$total
				));
						
			$delivery_id = $this->db->insert_id();	// get delivery ID 

				// insert delivered_items 
			$i = 0;
			foreach($item as $d): 
				$this->pos_model->store_deliveredItem($delivery_id, $item[$i], $qty[$i], $amount[$i], $price[$i]);
				$this->pos_model->add_item($item[$i], $qty[$i]);
				$i++;

			endforeach;

        	if($user=='admin') // return to admin home
        		redirect('incoming/goto_incomingPage');
       	 	else 	// return to manager home
        		redirect('manager');
        	
		}
	}

    function view_incoming() {
		$data['detail_flag'] = false; 
		if($this->pos_model->getAll_incoming()) {
			$data['incoming'] = $this->pos_model->getAll_incoming();
			$data['message'] ='';
		}
		else
			$data['message'] = 'No Record of Delivery';

		$data['header'] = 'Delivery Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/incoming_list';
		$this->load->view('template2', $data);
	}

	function view_incomingDetails($date) {
		$data['detail_flag'] = true; 
		$data['incoming'] = $this->pos_model->getAll_incoming();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_incoming_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Incoming Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/incoming_list';
		$this->load->view('template2', $data);
	}	

	function goto_view_delivery() {

		if($this->pos_model->getAll_delivery()) {
			$data['delivery'] = $this->pos_model->getAll_delivery();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Delivery Found';
 		
		$data['header'] = 'Delivery';
		$data['flag'] = 1;
		$data['page'] = 'lists/incoming_list';
		
		$this->load->view('template2', $data);	
	}

	function add_supplier() {

		$data = array(
				'supplier_id'=>NULL,
				'supplier_name'=>$this->input->post('supplierName'),
				'manufacturer'=>$this->input->post('manufacturer')
			);
		$this->db->insert('supplier', $data);
		redirect('incoming/goto_incomingPage');
	}

}

?>