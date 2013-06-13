<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){

        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='manager')
		{
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Manager');	
			die();		
		}		
    }

   function index() {

		$data['header'] = 'Manager';
		$data['page'] = 'manager_home';
		$data['flag'] = 3;

		$this->load->view('template2', $data);
	}

	function outgoing() {

		$data['header'] = 'Manager';
		$data['flag'] = 3;
		$data['page'] = 'outgoing/goto_outgoingForm';

		$this->load->view('template', $data);
	}

	function incoming() {

		$data['header'] = 'Manager';
		$data['flag'] = 3;
		$data['page'] = 'incoming/goto_incomingForm';
		$data['supplier'] = $this->pos_model->getAll_supplier();
		$this->load->view('template', $data);
	}

}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */