<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {
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

    function index() {
    	$data['message'] = "";
    	$data['flag'] = 2;   	
		$data['header'] = 'New Transaction';		
		$is_open = $this->session->userdata('open');
		if(!isset($is_open) || $is_open != true) {
			echo 'You don\'t have permission to access this page. '.anchor('cashier/open_amount', 'Record Opening Bills');	
			die();
		}	
		else {
			$data['page'] = 'forms/sales_form';
			$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template', $data);
		}
			
    }

	function add_item() {
		$item_id = $this->input->post('hItemPurchase');
		$qty = $this->input->post('quantity');

		$this->form_validation->set_rules('search_item','Barcode/ Itemcode', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
		$data['customer'] = $this->pos_model->getAll_customers();

		if($this->form_validation->run() == FALSE) {
			$data['message'] = 'All fields are required!';

			$data['header'] = 'New Transaction';
			//$data['page'] = 'cashier/purchase_main';
			$data['page'] = 'forms/sales_form';
			$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template', $data);
		}
		else {
			$this->db->from('item');
			$this->db->where('item_id', $item_id);
			$result = $this->db->get();
			if($result->num_rows() == 1) {
				foreach($result->result() as $r) {

					$flag = TRUE;
			       
			        foreach ($this->cart->contents() as $item) {
			            if ($item['id'] == $r->item_id) {
			                //echo "Found Id so updatig quantity";
			                $item['qty']=$item['qty']+$qty;
			                $this->cart->update($item);
			                $flag = FALSE;
			                break;
			            }
			        }
			        if($flag) {

						$data = array(
			               'id'      => $r->item_id,
			               'qty'     => $qty,
			               'price'   => $r->retail_price,
			               'name'    => str_replace("'", "",$r->desc1)
			            );
			            $this->cart->insert($data);
			        }
		        }
		    	$data['message'] = '';
		    }
		    else {
		    	$data['message'] = 'No item found!';		
		    }
		   
			$data['header'] = 'New Transaction';
			//$data['page'] = 'cashier/purchase_main';
			$data['page'] = 'forms/sales_form';
			$data['customer'] = $this->pos_model->getAll_customers();
			$this->load->view('template', $data);
			
		}
	}

	function remove_item($rowid) {

		$data = array(
               'rowid' => $rowid,
               'qty'   => 0
            );

		$this->cart->update($data);
		$data['message'] = 'Item succesfully canceled!';		
		    
		$data['customer'] = $this->pos_model->getAll_customers();
		$data['header'] = 'New Transaction';
		$data['page'] = 'cashier/purchase_main';
		
		$this->load->view('template', $data);	
	}

	function do_purchase() {

		$mode = $this->input->post('paymentChoice');

		$total = $this->cart->total();
		
		if($mode=='cash') {	
				// insert transactions 
			$this->db->insert('transactions', array('trans_id'=>NULL,  
				'trans_date'=>date('y-m-d'),
				'total_amount'=>$total
				));
						
			$trans_id = $this->db->insert_id();	/* get last transaction id */

				// insert trans_details 
			$i = 1;
			foreach ($this->cart->contents() as $items):
				$this->pos_model->store_transDetails($trans_id, $items['id'], $items['qty'], $items['subtotal']);
					// decrease item in the stocks 
				$this->pos_model->subtract_item($items['id'], $items['qty']);
				$i++;
			endforeach;
		}
		else {
			$customer_id = $this->input->post('customerName');
				// insert credits 
			
			$this->db->insert('credit', array('credit_id'=>NULL,  
				'customer_id'=>$customer_id,
				'date'=>date('y-m-d'),
				'status'=>'credit',
				'amount_credit'=>$total,
				'amount_paid'=>0,
				'credit_balance'=>0
				));

			$credit_id = $this->db->insert_id();	// get last credit id

				// insert credit_details 
			$i = 1;
			foreach ($this->cart->contents() as $items):
				$this->pos_model->store_creditDetails($credit_id, $items['id'], $items['qty'], $items['subtotal']);
					// decrease item in the stocks 
				$this->pos_model->subtract_item($items['id'], $items['qty']);
				$i++;
			endforeach;

				// update balance 
			$this->pos_model->update_balance($customer_id, $total, $credit_id);

		}
			
		$this->cart->destroy();
		redirect('cashier');
	}

	function cancel_trans() {
		$this->cart->destroy();
		redirect('cashier');
	}


}

?>