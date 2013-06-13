<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

/* ADMIN */
	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='admin') {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Administrator');	
			die();		
		}		
    }

    public function index() {
    	$data['flag']=1;
		$data['header'] = 'Administrator';
		
		$data['page'] = 'admin_home';
		$this->load->view('template2', $data);
	}

/* PASSWORD */

	function password() {
		$data['message'] = "";
		$data['header'] = 'Change Password';
		$data['flag'] = 1;		
		$data['page'] = 'forms/password_form';
		$this->load->view('template2', $data);
	}

	function change_password() {

		$role = $this->input->post('role_dropdown');
		$old_pwd = $this->input->post('old_password');
		$new_pwd = $this->input->post('new_password');

		$this->form_validation->set_rules('old_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'Password', 'required|matches[conf_password]|md5');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$data['message'] = "";
		}
		else {

			if($this->pos_model->change_password($role, $old_pwd, $new_pwd))
				$data['message'] = "Password of $role succesfully changed.";
			else
				$data['message'] = "Wrong combination of role and password.";
		}
		$data['header'] = 'Change Password';
		$data['flag'] = 1;
		$data['page'] = 'forms/password_form';
		$this->load->view('template2', $data);
	}

	
	function goto_view_items_supplier() {

		$supplier_name= $this->input->post('supplier_name');
		$output="<option value='default'>Select one</option>";
		if($this->pos_model->getAll_items_bySupplier($supplier_name)) {
			$data['items'] = $this->pos_model->getAll_items_bySupplier($supplier_name);	
			
			foreach($data['items'] as $row){
				$output .= "<option value='".$row->item_code."'>".$row->desc1."</option>";
			}			
		}
		echo $output;	 //get item by supplier
	}
			
	function goto_view_items_byCode() {

		$item_code= $this->input->post('item_code');
		$output = "";
		if($this->pos_model->get_item_byCode($item_code)) {
			$data = $this->pos_model->get_item_byCode($item_code);				
		}
		echo json_encode($data); //get item by item code
		
	}

	function reports() {

		$data['header'] = 'Report';
		$data['flag'] = 1;
		$data['page'] = 'admin/reports_main';
		$this->load->view('template2', $data);
	}

	function inventory() {

		$data['header'] = 'Inventory';
		$data['flag']=1;

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


	public function get_all_items() {
		
		if($this->pos_model->getAll_items2()) {
			$data = $this->pos_model->getAll_items2();
		}
		echo json_encode($data);
	}

	public function customers2() {
		
		if($this->pos_model->getAll_customers2()) {
			$data = $this->pos_model->getAll_customers2();
		}
		echo json_encode($data);
	}

	public function get_all_items2() {
		
		if($this->pos_model->getAll_items3()) {
			$data = $this->pos_model->getAll_items3();
		}
		echo json_encode($data);
	}

	



	function sales() {
		$data['header'] = 'Administrator';
		$data['flag']=1;
		$data['subnav'] = 7; // sub-navigation for amounts
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}


	function goto_amountPage() {
		$data['header'] = 'Administrator';
		$data['flag']=1;
		$data['subnav'] = 6; // sub-navigation for amounts
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}

	function goto_amountForm() {
		$data['header'] = 'Administrator';
		$data['flag']=1;
		
		$data['page'] = 'forms/amount_form';

		$this->load->view('template2', $data);
	}

	function view_amounts() {
		if($this->pos_model->getAll_amounts()) {
            $data['amounts'] = $this->pos_model->getAll_amounts();
            $data['message'] = '';
        }
        else 
            $data['message'] = 'No Items Found';
        
        $data['header'] = 'Amount List';
        $data['flag'] = 1;
        $data['page'] = 'lists/amounts_list';
        $this->load->view('template2', $data);
	}

	function open_amount() {
		$data['header'] = 'Cashier';
		$data['flag'] = 1;

		$data['page'] = 'forms/bills_form';
		$this->load->view('template', $data);
	}

	function close_amount() {
		$data['header'] = 'Closing Amount';
		$data['flag'] = 1;	
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
	
	function goto_add_category(){
			$cat_name =  $this->input->post('cat_name');
			$mode = $this->input->post('mode');
			if($mode == 'addSupplier')
				echo $this->pos_model->add_supplier($cat_name);
			
	}
}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */