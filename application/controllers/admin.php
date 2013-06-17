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
				$data['message'] = "<span>Password of $role succesfully changed.</span>";
			else
				$data['message'] = "<span>Wrong combination of role and password.</span>";
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

		if($this->pos_model->getAll_reports()) {
			$data['report'] = $this->pos_model->getAll_reports();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Reports Found';
 		
		$data['header'] = 'Reports';
		$data['flag'] = 1;
		$data['page'] = 'lists/report_list';		
		$this->load->view('template2', $data);
	}

	function view_daily_report($report_id, $report_date) {

		$data['report'] = $this->pos_model->get_dailyReport($report_id);
		$data['expenses'] = $this->pos_model->getAll_expenses_byDate($report_date);
		$data['message'] = '';
		$data['header'] = 'Daily Report';
		$data['flag'] = 1;
		$data['page'] = 'forms/report_form';
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


	function get_all_items() {
		
		if($this->pos_model->getAll_items2()) {
			$data = $this->pos_model->getAll_items2();
		}
		echo json_encode($data);
	}

	function customers2() {
		
		if($this->pos_model->getAll_customers2()) {
			$data = $this->pos_model->getAll_customers2();
		}
		echo json_encode($data);
	}

	function get_all_items2() {
		
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
            $data['message'] = 'No Record Found';
        
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

	function view_sales() {
		$data['detail_flag'] = false; 
		if($this->pos_model->getAll_sales()) {
			$data['sales'] = $this->pos_model->getAll_sales();
			$data['message'] ='';
		}
		else
			$data['message'] = 'No Record of Sales';
		
		$data['header'] = 'Sales Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/sales_list';
		$this->load->view('template2', $data);
	}

	function view_salesDetails($date) {
		$data['detail_flag'] = true; 
		$data['sales'] = $this->pos_model->getAll_sales();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_sales_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Sales Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/sales_list';
		$this->load->view('template2', $data);
	}

	function view_credits() {
		$data['detail_flag'] = false; 
		if($this->pos_model->getAll_credits()) {
			$data['credits'] = $this->pos_model->getAll_credits();
			$data['message'] ='';
		}
		else
			$data['message'] = 'No Record of Credit';
		
		$data['header'] = 'Credit Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/credit_list';
		$this->load->view('template2', $data);
	}

	function view_creditDetails($date) {
		$data['detail_flag'] = true; 
		$data['credits'] = $this->pos_model->getAll_credits();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_credits_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Credit Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/credit_list';
		$this->load->view('template2', $data);
	}

	function delete_amount($id) {
		$this->db->delete('amount', array('amount_id'=>$id));

		redirect('admin/view_amountPage');
	}

	function load() {
		
			$data['header'] = 'E-load';
			$data['flag'] = 1;	
			$data['page'] = 'forms/load_form';
			$this->load->view('template2', $data);
	}
	

	function add_load() {
		$network = $this->input->post('load_dropdown');
		$amount = $this->input->post('load_amount');
		//$balance = $this->input->post('load_balance');
		$date = $this->input->post('loadDate');

		//echo $network.$amount.$balance;
		$this->db->insert('eload',array(
				'load_id'=>NULL,
				'network'=>$network,
				'date'=>$date,
				'status'=>'wallet',
				'eload'=>0,
				'wallet'=>$amount
				//'load_balance'=>0,
				//'load_cash'=>0
			));
		$id = $this->db->insert_id();
		$query = "UPDATE eload set load_balance=load_balance+$amount WHERE load_id=$id";
		$this->db->query($query);

		//$query = "UPDATE eload set load_cash=load_cash+$amount WHERE load_id=$id";
		//$this->db->query($query);
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