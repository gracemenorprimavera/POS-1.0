<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller {

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

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
       /* if(! $this->session->userdata('validated')){
            redirect('pos');
        } */
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || $user!='admin')
		{
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as Manager');	
			die();		
		}		
    }

   function index() {

		$data['header'] = 'Manager';
		
		$data['page'] = 'manager_home';
		//$data['subpage'] = 'dummy';

		$this->load->view('template', $data);
	}

	function outgoing() {

		$data['header'] = 'Manager';
		
		//$data['page'] = 'manager_home';
		$data['page'] = 'manager/outgoing_main';

		$this->load->view('template', $data);
	}

	function incoming() {

		$data['header'] = 'Manager';
		//$data['page'] = 'manager_home';
		$data['page'] = 'manager/incoming_main';
		$data['supplier'] = $this->pos_model->getAll_supplier();
		$this->load->view('template', $data);
	}

}

/* End of file pos.php */
/* Location: ./application/controllers/pos.php */