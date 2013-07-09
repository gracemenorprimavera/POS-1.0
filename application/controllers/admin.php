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
		//echo $role;
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

/* AJAX */	
	function goto_view_items_supplier() {

		$supplier_name= $this->input->post('supplier_name');
		$output="<option value='default'>Select one</option>";
		if($this->pos_model->getAll_items_bySupplier($supplier_name)) {
			$data['items'] = $this->pos_model->getAll_items_bySupplier($supplier_name);	
			
			foreach($data['items'] as $row){
				$output .= "<option value='".$row->item_id."'>".$row->desc1."</option>";
			}			
		}
		echo $output;	 //get item by supplier
	}
			
	function goto_view_items_byCode() {

		$item_id= $this->input->post('item_id');
		$output = "";
		if($this->pos_model->get_item_byCode($item_id)) {
			$data = $this->pos_model->get_item_byCode($item_id);				
		}
		echo json_encode($data); //get item by item code
		
	}

	function goto_view_items_byId() {

		$item_id= $this->input->post('item_id');
		$output = "";
		if($this->pos_model->get_item_byId($item_id)) {
			$data = $this->pos_model->get_item_byId($item_id);				
		}
		echo json_encode($data); //get item by item code
		
	}

	function reports() {
		$data['detail_flag'] = false; 

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
		$data['detail_flag'] = true;
		$data['date'] = $report_date;
		$data['report'] = $this->pos_model->get_dailyReport($report_id);
		$data['expenses'] = $this->pos_model->getAll_expenses_byDate($report_date);
		$data['message'] = '';
		$data['header'] = 'Daily Report';
		$data['flag'] = 1;
		$data['report_id'] = $report_id;
		$data['report_date'] = $report_date;
		$data['page'] = 'lists/report_list';
		//$data['page'] = 'forms/genreport_form';
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

/* AMOUNT FORM */
	function goto_amountForm($msg = NULL) {
		if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Amount successfully recorded!';
		else $data['msg'] = 'Failed to record amount!';
			
		$data['header'] = 'Amount Form';
		$data['flag']=1;
		$data['page'] = 'forms/amount_form';
		$this->load->view('template2', $data);
	}

	function add_amount() {
		$this->load->model('pos2_model');
		$open = $this->input->post('openSubTotal');
		$close = $this->input->post('closeSubTotal');
		$date = $this->input->post('amountDate');

		//echo $date;
		if($this->pos2_model->register_adminAmount($date, $open, $close))
			$msg = true;
		
		redirect('admin/goto_amountForm/'.$msg);

	}

	function register_amount() {

		$mode =  $this->input->post('registerMode');
		$bills = $this->input->post('billsTotal');
		$coins = $this->input->post('coinsTotal');
		$date = $this->input->post('date');
		
		if($mode == 'opening'){
			if($this->pos2_model->register_amount($mode,$bills + $coins,$bills,$coins,$date)) {
				$msg = true;	
				redirect('admin/goto_amountForm/'.$msg);
			}
		}
		else if($mode == 'closing'){
			$this->pos2_model->register_amount($mode,$bills + $coins,$bills,$coins,$date);
			redirect('cashier/close_store');
		}	
	}


	function close_store() {
		
		$this->pos_model->record_report();
		$this->session->sess_destroy();
		redirect('pos');
	}

	function view_sales() {
		$this->load->model('sales_model');
		$data['detail_flag'] = false; 
		$data['item_flag'] = false; 
		if($this->sales_model->getAll_sales()) {
			$data['sales'] = $this->sales_model->getAll_sales();
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
		$this->load->model('sales_model');
		$data['detail_flag'] = true; 
		$data['item_flag'] = false; 
		$data['sales'] = $this->sales_model->getAll_sales();
		$data['date'] = $date;
		$data['daily'] = $this->sales_model->getAll_sales_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Sales Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/sales_list';
		$this->load->view('template2', $data);
	}

	function view_salesItem($date, $trans_id) {
		$this->load->model('sales_model');
		$data['detail_flag'] = true;
		$data['item_flag'] = true;

		$data['date'] = $date;

		$data['sales'] = $this->sales_model->getAll_sales();
		$data['daily'] = $this->sales_model->getAll_sales_byDate($date);
		$data['items'] = $this->sales_model->getAll_salesItems_byId($trans_id);

		$data['message'] = '';
		$data['header'] = 'Sales Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/sales_list';
		$this->load->view('template2', $data);
	}

	function view_credits() {
		$data['detail_flag'] = false; 
		$data['item_flag'] = false;
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
		$data['item_flag'] = false; 
		$data['credits'] = $this->pos_model->getAll_credits();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_credits_byDate($date);
		$data['message'] = '';
		$data['header'] = 'Credit Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/credit_list';
		$this->load->view('template2', $data);
	}

	function view_creditDetailsbyId($date, $credit_id) {
		$data['detail_flag'] = true;
		$data['item_flag'] = true; 
		$data['credits'] = $this->pos_model->getAll_credits();
		$data['date'] = $date;
		$data['daily'] = $this->pos_model->getAll_credits_byDate($date);
		$data['credit'] = $this->pos_model->get_creditDetails_byId($credit_id);
		$data['message'] = '';
		$data['header'] = 'Credit Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/credit_list';
		$this->load->view('template2', $data);
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

	function delete_amount($id) {
		$this->db->delete('amount', array('amount_id'=>$id));

		redirect('admin/view_amountPage');
	}

/* E-LOAD FORM */
	function goto_eloadForm($msg = NULL) {		
		if($msg == NULL) $data['msg'] = '';
		else if($msg) $data['msg'] = 'Load successfully updated!';
		else $data['msg'] = 'Load not successfully updated';

		$data['header'] = 'E-load';
		$data['flag'] = 1;	
		$data['page'] = 'forms/load_form2';
		$this->load->view('template2', $data);
	}
	
	function add_load() {
		$network = $this->input->post('load_dropdown');
		$balance = $this->input->post('load_balance'); // load wallet
		$date = $this->input->post('loadDate');
		
		if($this->db->insert('eload',array(
				'load_id'=>NULL,
				'network'=>$network,
				'date'=>$date,
				'status'=>'wallet',
				'amount'=>$balance,							
			)))
			$msg = true;
		else
			$msg = false;
		$load_id = $this->db->insert_id();
		redirect('admin/goto_eloadForm/'.$msg);
	}

	function view_eload() {
		$this->load->model('load_model');
		$data['detail_flag'] = false; 
		$data['network_flag'] = false;

		if($this->load_model->getAll_load()) {
			$data['load'] = $this->load_model->getAll_load();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Load Record';
		$data['message1'] = '';
		$data['header'] = 'E-Load Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/eload_list';
		$this->load->view('template2', $data);
	}

	function view_loadDetails($date) {
		$this->load->model('load_model');
		$data['detail_flag'] = true;
		$data['network_flag'] = true; 
		$data['load'] = $this->load_model->getAll_load();
		$data['date'] = $date;
		//$data['daily'] = $this->load_model->getAll_load_byDate($date, $network);
		$data['message'] = '';
		$data['message1'] = '';
		$data['header'] = 'E-Load Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/eload_list';
		$this->load->view('template2', $data);
	}

	function view_loadnetwork($date, $network) {
		$this->load->model('load_model');
		$data['detail_flag'] = true; 
		$data['network_flag'] = true; 
		$data['load'] = $this->load_model->getAll_load();
		$data['date'] = $date;
		if( $this->load_model->getAll_load_byDate($date, $network)) {
			$data['message1'] = '';
			$data['daily'] = $this->load_model->getAll_load_byDate($date, $network);
		}
		else
			$data['message1'] = 'No Details Found!';
		$data['message'] = '';
		$data['header'] = 'E-Load Record';
		$data['flag'] = 1;
		$data['page'] = 'lists/eload_list';
		$this->load->view('template2', $data);
	}
	function goto_recordsPage() {
		$data['header'] = 'Records';
		$data['flag']=1;
		$data['subnav'] = 8; // sub-navigation for records
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}
	function goto_formsPage() {
		$data['header'] = 'Forms';
		$data['flag']=1;
		$data['subnav'] = 9; // sub-navigation for forms
		$data['page'] = 'admin/subnav';

		$this->load->view('template2', $data);
	}


	/* Employee */
	

	function goto_employeeForm() {
		$data['header'] = 'Employee Form';
		$data['flag']=1;
		$data['page'] = 'forms/employee_form';
		$data['message'] = '';

		$this->load->view('template2', $data);
	}

	/*function view_employee() {
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
	}*/

	function add_employee() {

		$emp_name = $this->input->post('name');
		$position = $this->input->post('role_dropdown');		
		$emp_pwd = $this->input->post('emp_password');

		$this->form_validation->set_rules('name', 'Name', 'required');		
		$this->form_validation->set_rules('emp_password', 'Password', 'required|md5');

		if($this->form_validation->run() == FALSE) $data['message'] = "";
		else{
			$this->pos_model->add_employee($emp_name,$position, $emp_pwd);
			$data['message'] = "<span>Employee $emp_name succesfully added.</span>";
		}

		$data['header'] = 'Employee Form';
		$data['flag']=1;
		$data['page'] = 'forms/employee_form';

		$this->load->view('template2', $data);
	}

	function pdf($report_id,$report_date)	//fetch the report id and report date
	{

	    $this->load->helper(array('dompdf', 'file')); 		//load the pdf conversion helper
	    $this->load->helper('download');					//load download helper
	    $data['report'] = $this->pos_model->get_dailyReport($report_id);	//get report data
		$data['expenses'] = $this->pos_model->getAll_expenses_byDate($report_date);
		$data['report_date'] = $report_date;
		//$this->load->view('forms/report_form2',$data);
	   	$html =  $this->load->view('forms/report_form2',$data,true);	//put to html
	    $data = pdf_create($html, '', false);							//create pdf
	   	force_download($report_date.'_dsr.pdf', $data); 				//download pdf
	   	//write_file('name', $data);
	}

	function view_reportForm2() {
		$this->load->view('forms/report_form2');
	}

    function view_emp() {

        if($this->pos_model->getAll_emp()) {
            $data['emp'] = $this->pos_model->getAll_emp();
            $data['message'] = '';
        }
        else 
            $data['message'] = 'No Employee Found';
        $data['msg'] = '';
        $data['header'] = 'Employees';
        $data['flag'] = 1;
        $data['page'] = 'lists/emp_list';
        $this->load->view('template2', $data);
    }

    function remove_emp($emp_id, $name) {
    	$this->db->delete('employee', array('emp_id' => $emp_id)); 
    	if($this->pos_model->getAll_emp()) {
            $data['emp'] = $this->pos_model->getAll_emp();
            $data['message'] = '';
        }
        else 
            $data['message'] = 'No Employee Found';
       
        $data['msg'] = "$name successfully removed!";
    	$data['header'] = 'Employees';
        $data['flag'] = 1;
        $data['page'] = 'lists/emp_list';
 		
        $this->load->view('template2', $data);

    }

    /* Nicole */
    function goto_add_category(){
			$cat_name =  $this->input->post('cat_name');
			$mode = $this->input->post('mode');
			if($mode == 'addSupplier')
				echo $this->pos_model->add_supplier($cat_name);
			else if($mode == 'addCashout')
				echo $this->pos_model->add_cashout($cat_name);
			
	}

	  function get_division_cat(){
    	$data = '';

    	if($this->pos_model->getAll_division_cat()) {
            $data = $this->pos_model->getAll_division_cat();
            
        }
		
		echo json_encode($data);

    }

     function get_supplier_cat(){
    	$data = '';

    	if($this->pos_model->getAll_supplier()) {
            $data = $this->pos_model->getAll_supplier();
            
        }
		
		echo json_encode($data);

    }

    function updateItem(){
    	$id =  $this->input->post('id');
    	$key =  $this->input->post('key');
    	$value =  $this->input->post('value');

    	echo $this->pos_model->updateItem($id,$key,$value);
    }

}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */