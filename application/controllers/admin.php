<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

/* PASSWORD */
	function password() {
		$data['message'] = " ";
		$data['header'] = 'Change Password';
		
		$data['page'] = 'forms/password_form';
		//$data['subpage'] = 'forms/password_form';

		$this->load->view('template', $data);
	}

	function change_password() {

		$role = $this->input->post('role_dropdown');
		$old_pwd = $this->input->post('old_password');
		$new_pwd = $this->input->post('new_password');


		//$this->form_validation->set_rules('', 'Password', 'required');
		$this->form_validation->set_rules('old_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'Password', 'required|matches[conf_password]|md5');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$data['message'] = "";
			$data['header'] = 'Change Password';
			
			$data['page'] = 'forms/password_form';
			//$data['subpage'] = 'forms/password_form';

			$this->load->view('template', $data);
		}
		else {

			if($this->pos_model->change_password($role, $old_pwd, $new_pwd))
				$data['message'] = "Password of $role succesfully changed.";
			else
				$data['message'] = "Wrong combination of role and password.";
			
			$data['header'] = 'Change Password';
			
			$data['page'] = 'forms/password_form';
			//$data['subpage'] = 'forms/password_form';


			$this->load->view('template', $data);
		}


	}

/* ITEMS */
	function items() {

		$data['header'] = 'Item';
		
		$data['page'] = 'admin/item_form';
		//$data['subpage'] = 'admin/item_form';

		$this->load->view('template', $data);
	}

	function goto_add_item() {

		$data['header'] = 'Add Item';
		
		$data['page'] = 'forms/item_form';
		//$data['subpage'] = 'forms/item_form';

		$this->load->view('template', $data);
	}

	function add_item() {

		$this->input->post('');

		$data = array(
               'item_code' => $this->input->post('itemcode'),
               'bar_code' => $this->input->post('barcode'),
               'desc1' => $this->input->post('desc1'),
               'desc2' => $this->input->post('desc2'),
               'desc3' => $this->input->post('desc3'),
               'desc4' => $this->input->post('desc4'),
               'group' => $this->input->post('group'),
               'class1' => $this->input->post('class1'),
               'class2' => $this->input->post('class2'),
               'cost' => $this->input->post('cost'),
               'retail_price' => $this->input->post('price'),
               'model_quantity' => $this->input->post('m_quantity'),
               'supplier_code' => $this->input->post('supplier_code'),
               'manufacturer' => $this->input->post('manufacturer'),
               'quantity' => $this->input->post('quantity'),
               'reorder_point' => $this->input->post('reorder_point')
            );

		$this->db->insert('item', $data); 

		redirect('admin/goto_add_item');
	}

	function goto_edit_item($edit) {

		$data['header'] = 'Edit Item';
		
		$data['page'] = 'forms/itemEdit_form';
		//$data['subpage'] = 'forms/itemEdit_form';
		$data['edit'] = $edit;

		$this->load->view('template', $data);
	}

	function edit_item() {

		$this->input->post('');
		$edit=$this->input->post('itemcode');

		$data = array(
               'item_code' => $this->input->post('itemcode'),
               'bar_code' => $this->input->post('barcode'),
               'desc1' => $this->input->post('desc1'),
               'desc2' => $this->input->post('desc2'),
               'desc3' => $this->input->post('desc3'),
               'desc4' => $this->input->post('desc4'),
               'group' => $this->input->post('group'),
               'class1' => $this->input->post('class1'),
               'class2' => $this->input->post('class2'),
               'cost' => $this->input->post('cost'),
               'retail_price' => $this->input->post('price'),
               'model_quantity' => $this->input->post('m_quantity'),
               'supplier_code' => $this->input->post('supplier_code'),
               'manufacturer' => $this->input->post('manufacturer'),
               'quantity' => $this->input->post('quantity'),
               'reorder_point' => $this->input->post('reorder_point')
            );

			
		$data['success'] = $this->pos_model->update_item($data,$edit);
		$data['edit']=$edit;

		$data['header'] = 'Edit Item';
		
		$data['page'] = 'admin/successEdit';
		//$data['subpage'] = 'admin/successEdit';
											
		$this->load->view('template', $data);

	}

	function delete_item($item_code) {

		$this->pos_model->delete_item($item_code);

		redirect('admin/goto_view_items');
	}

	function goto_view_items() {

		if($this->pos_model->getAll_items()) {
			$data['items'] = $this->pos_model->getAll_items();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Items Found';
 		
		$data['header'] = 'Item List';
		
		$data['page'] = 'view_list';
		//$data['subpage'] = 'view_list';
		$data['list_id'] = 1; // list id # 1 - list of items

		//$this->load->view('template', $data);
		$this->load->view('template', $data);
	}

		//get item by supplier
	function goto_view_items_supplier() {

		$supplier_name= $this->input->post('supplier_name');
		$output="<option value='default'>Select one</option>";
		if($this->pos_model->getAll_items_bySupplier($supplier_name)) {
			$data['items'] = $this->pos_model->getAll_items_bySupplier($supplier_name);	
			
			foreach($data['items'] as $row){
				$output .= "<option value='".$row->item_code."'>".$row->desc1."</option>";
			}
			
		}
		echo $output;
		
	}
	
	//get item by item code
	function goto_view_items_byCode() {

		$item_code= $this->input->post('item_code');
		$output = "";
		if($this->pos_model->get_item_byCode($item_code)) {
			$data = $this->pos_model->get_item_byCode($item_code);				
		}
		echo json_encode($data);
		
	}

	function reports() {

		$data['header'] = 'Report';
		
		$data['page'] = 'admin/reports_main';
		//$data['subpage'] = 'admin/reports_main';

		$this->load->view('template', $data);
	}

	function inventory() {

		$data['header'] = 'Inventory';
		
		$data['page'] = 'inventory_main';
		//$data['subpage'] = 'inventory_main';

		$this->load->view('template', $data);
	}

	function customers1() {

		$data['header'] = 'Administrator';
		
		$data['page'] = 'admin_home';
		$data['subpage'] = 'admin/customers_main';

		$this->load->view('template', $data);
	}

	function customers() {

		if($this->pos_model->getAll_customers()) {
			$data['customers'] = $this->pos_model->getAll_customers();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Customers Found';
 		
		$data['header'] = 'Customers';
		
		$data['page'] = 'view_list';
		$data['list_id'] = 2; // list id # 2 - list of customers
		//$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function delivery() {

		$data['header'] = 'Delivery';
		
		$data['page'] = 'admin/delivery_main';
		//$data['subpage'] = 'admin/delivery_main';

		$this->load->view('template', $data);		
	}

	function goto_view_delivery() {

		if($this->pos_model->getAll_delivery()) {
			$data['delivery'] = $this->pos_model->getAll_delivery();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Delivery Found';
 		
		$data['header'] = 'Delivery';
		
		$data['page'] = 'view_list';
		$data['list_id'] = 3; // list id # 3 - list of customers
		//$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);	
	}

	function logout() {

		$data['message'] = " ";
		$data['header'] = 'POS';
		
		$data['page'] = 'forms/login_form';
		
		$this->load->view('template', $data);
	}

	function get_item_bygroup() {

		if($this->pos_model->getAll_items()) {
			$data['group'] = $this->pos_model->get_group();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Items Found';
 		
		$data['header'] = 'Administrator';
		
		$data['page'] = 'view_item_bygroup';
		//$data['subpage'] = 'view_item_bygroup';

		$this->load->view('template', $data);
		//$this->load->view('view_item_bygroup', $data);
	}

	function get_item_byclass() {

		if($this->pos_model->getAll_items()) {
			$data['class'] = $this->pos_model->get_class();
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Items Found';
 		
		$data['header'] = 'Administrator';
		
		$data['page'] = 'view_item_byclass';
		//$data['subpage'] = 'view_item_byclass';

		$this->load->view('template', $data);
		//$this->load->view('view_item_byclass', $data);
	}

	function get_item_bysupplier() {
		$ctr=0;

		if($this->pos_model->getAll_items()) {
			$data['supply'] = $this->pos_model->get_supply($ctr);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Items Found';
 		
		$data['header'] = 'Administrator';
		
		$data['page'] = 'view_item_bysupplier';
		//$data['subpage'] = 'view_item_bysupplier';

		$this->load->view('template', $data);
		//$this->load->view('view_item_bysupplier', $data);
	}

	function get_item_byOutofStock() {
		$ctr = 1;

		if($this->pos_model->get_supply($ctr)) {
			$data['stock'] = $this->pos_model->get_supply($ctr);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Items Found';
 		
		$data['header'] = 'Administrator';
		
		//$data['page'] = 'admin_home';
		$data['page'] = 'view_item_byOutofStock';

		$this->load->view('template', $data);
		//$this->load->view('view_item_byOutofStock', $data);
	}

	function get_item_bybelowReorder() {
		$ctr = 2;

		if($this->pos_model->get_supply($ctr)) {
			$data['reorder'] = $this->pos_model->get_supply($ctr);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Items Found';
 		
		$data['header'] = 'Administrator';
		
		//$data['page'] = 'admin_home';
		$data['page'] = 'view_item_bybelowReorder';

		$this->load->view('template', $data);
		//$this->load->view('view_item_bybelowReorder', $data);
	}
	

	function get_all_items() {
		
		if($this->pos_model->getAll_items2()) {
			$data = $this->pos_model->getAll_items2();
		}
		echo json_encode($data);
	}

	function view_customerDetails($customer_id) {
		if($this->pos_model->get_customerDetails($customer_id)) {
			$data['customers'] = $this->pos_model->get_customerDetails($customer_id);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Details Found';
 		
		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['list_id'] = 4; // list id # 4 - list of customers' transactions
		$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);
	}

	function view_transDetails($trans_id) {
		if($this->pos_model->get_transDetails($trans_id)) {
			$data['transactions'] = $this->pos_model->get_transDetails($trans_id);
			$data['message'] = '';
		}
		else 
			$data['message'] = 'No Transactions Found';
 		
		$data['header'] = 'Cashier';
		
		$data['page'] = 'cashier_home';
		$data['list_id'] = 5; // list id # 5 - list of transactions' details
		$data['subpage'] = 'view_list';
		
		$this->load->view('template', $data);
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

	function goto_add_customers() {

		$data['header'] = 'Administrator';
		
		//$data['page'] = 'admin_home';
		$data['page'] = 'forms/customer_form';

		$this->load->view('template', $data);
	}

	function add_customer() {

		$name = $this->input->post('customerName');
		$contact = $this->input->post('customerNum');
		$add = $this->input->post('customerAdd');

		$this->db->insert('customers', array('customer_id'=>NULL,
				'customer_name'=>$name,
				'contact_number'=>$contact,
				'address'=>$add,
				'balance'=>0
			));
		redirect('pos/admin_home');
	}

}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */