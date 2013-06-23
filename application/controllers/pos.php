<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos extends CI_Controller {

function pdf() {
     $this->load->helper(array('dompdf', 'file'));
     // page info here, db calls, etc.     
     $html = $this->load->view('forms/expense_form');
     pdf_create($html, 'filename');
    // or
    // $data = pdf_create($html, '', false);
    // write_file('name', $data);
     //if you want to write it to disk and/or send it as an attachment    
}
	function createPDF() {
		$this->load->library('pdf');
		$this->pdf->load_view('forms/item_form');
		$this->pdf->render();
		$this->pdf->stream("item.pdf");
	}

	function create_PDF() {
		$data['message'] = " ";
		$data['header'] = 'P.O.S.';
		$data['subheader'] = 'Point of Sale';
		$data['page'] = 'sample_pdf';
		$data['flag'] = 1;
		
		$this->load->view('template2', $data);
	}

	public function download() {
			$this->load->helper('download');
			$this->load->view('download_PDF');
		}
/* ------------------------------- */	
	public function index()
	{
		$data['message'] = " ";
		$data['header'] = 'P.O.S.';
		$data['subheader'] = 'Point of Sale';
		$data['page'] = 'forms/login_form';
		
		$this->load->view('template', $data);
	}

    function do_logout() {

		$data['message'] = " ";
		$data['header'] = 'P.O.S.';
		$data['subheader'] = 'Point of Sale';

		$this->session->unset_userdata('validated');
		//$this->session->sess_destroy();
        redirect('pos');
		
		//$data['page'] = 'forms/login_form';
		//$this->load->view('template', $data);
	}

	public function user_login() {
		
		$this->form_validation->set_rules('password','Password','required');

		// password is invalid
		if ($this->form_validation->run() == FALSE) {
			$data['message'] = "* Invalid password";
			$data['header'] = 'P.O.S.';
			$data['subheader'] = 'Point of Sale';
			$data['page'] = 'forms/login_form';
			$this->load->view('template', $data);
		}
		else {
			
			$password = $this->input->post('password');
			
			$valid_user = $this->pos_model->check_user($password);

				
			if($valid_user) {
				$account = $this->session->userdata('role');
						
				if($account=='cashier') {
					redirect('cashier');
				}
				else if($account=='admin') {
					redirect('admin');
				}
				else if($account=='manager'){
					redirect('manager');
				}
			}
			else {
				$data['message'] = "* Invalid password";
				$data['header'] = 'P.O.S.';
				$data['subheader'] = 'Point of Sale';
				$data['page'] = 'forms/login_form';
			
				$this->load->view('template', $data);			
			}
		}		
	}

	public function closing() {
		$data['header'] = 'Cashier';
		
		$data['page'] = 'forms/closing_form';
		$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}	

	public function admin_home() {

		$data['header'] = 'Administrator';
		
		$data['page'] = 'admin_home';
		//$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}	



	public function manager_home(){
		$data['header'] = 'Manager';
		
		$data['page'] = 'manager_home';
		$data['subpage'] = 'dummy';
		
		$this->load->view('template', $data);
	}

	/* Nicole */
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

	public function get_all_items2($mode) {
		
		if($this->pos_model->getAll_items3($mode)) {
			$data = $this->pos_model->getAll_items3($mode);
		}
		echo json_encode($data);
	}

	function goto_view_items_byId() {

		$item_id= $this->input->post('item_id');
		$output = "";
		if($this->pos_model->get_item_byId($item_id)) {
			$data = $this->pos_model->get_item_byId($item_id);				
		}
		echo json_encode($data); //get item by item code
		
	}

}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */