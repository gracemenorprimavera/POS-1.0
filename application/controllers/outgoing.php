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

/* OUTGOING FORM */
	function goto_outgoingForm($msg = NULL) {
		if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Outgoing successfully recorded!';
		else $data['msg'] = 'Failed to record delivery!';

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
		$this->load->model('outgoing_model');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$user = $this->session->userdata('role');
			
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
			$data['page'] = 'forms/outgoing_form';
			$this->load->view('template2', $data);
		}
		else
		{	
			$status = $this->input->post('outgoing');
			$desc = $this->input->post('out_desc');
			$date = $this->input->post('outgoingDate');

			$item = $this->input->post('outgoingItem');
			$qty = $this->input->post('outgoingQty');
			$price = $this->input->post('outgoingAmt');
			$total = $this->input->post('outTotalPrice');

			$hItem = $this->input->post('houtgoingItem');
			
				
				// create outgoing 
			$this->db->insert('outgoing', array('outgoing_id'=>NULL, 
				'date_out'=>$date,
				'time'=>'',
				'description'=>$desc,
				'amount'=>$total,
				'status'=>$status
				));
				 
			$outgoing_id = $this->db->insert_id();	// get outgoing ID
			$qtr = "UPDATE outgoing SET time=(select curtime()) where outgoing_id=$outgoing_id";
			$this->db->query($qtr);

				// insert out_items

			$i = 0;
			foreach($item as $d):
				//echo "$outgoing_id, $hItem[$i], $item[$i], $qty[$i], $price[$i]"; 
				$this->outgoing_model->store_outItem($outgoing_id, $hItem[$i], $qty[$i], $price[$i]);
				$this->outgoing_model->subtract_item($hItem[$i], $qty[$i]);
				$i++;
			endforeach;
			
			$msg = true;
			if($user=='admin') // return to admin home
        		redirect('outgoing/goto_outgoingForm/'.$msg);
       	 	else 	// return to manager home
        		redirect('manager');
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

/* VIEW OUTGOING */
	function view_outgoing() {
		$data['detail_flag'] = false;
		$data['item_flag'] = false;
		if($this->pos_model->getAll_outgoing()) {
			$data['outgoing'] = $this->pos_model->getAll_outgoing();
			$data['message'] = '';
		}
		else
			$data['message'] = 'No Record of Outgoing';

		$data['header'] = 'Outgoing Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/outgoing_list';
		$this->load->view('template2', $data);
	}

	function view_outgoingDetails($date) {
		$data['detail_flag'] = true; 
		$data['item_flag'] = false;
		$data['outgoing'] = $this->pos_model->getAll_outgoing();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_outgoing_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Outgoing Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/outgoing_list';
		$this->load->view('template2', $data);
	}

	function view_outgoingItems($date, $outgoing_id) {
		$this->load->model('outgoing_model');
		$data['detail_flag'] = true;
		$data['item_flag'] = true;

		$data['date'] = $date;

		$data['outgoing'] = $this->outgoing_model->getAll_outgoing();
		$data['daily'] = $this->outgoing_model->getAll_outgoing_byDate($date);
		$data['items'] = $this->outgoing_model->getAll_outgoingItems_byId($outgoing_id);

		$data['message'] = '';
		$data['header'] = 'Outgoing Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/outgoing_list';
		$this->load->view('template2', $data);
	}




}
?>
