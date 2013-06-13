<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    private function check_isvalidated(){
        $is_logged_in = $this->session->userdata('validated');
        $user= $this->session->userdata('role');
		if(!isset($is_logged_in) || $is_logged_in != true || ($user!='cashier' && $user!='admin')) {
			echo 'You don\'t have permission to access this page. '.anchor('pos', 'Login as '.$user);	
			die();
		}		
    }

    function goto_itemPage() {

        $data['header'] = 'Administrator';
        $data['flag']=1;
        $data['subnav'] = 1; // sub-navigation for items
        $data['page'] = 'admin/subnav';

        $this->load->view('template2', $data);
    }

    function goto_itemForm() {

        $data['header'] = 'Add Item';
        $data['flag'] = 1;
        $data['page'] = 'forms/item_form';
        $this->load->view('template2', $data);
    }

    function view_items() {

        if($this->pos_model->getAll_items()) {
            $data['items'] = $this->pos_model->getAll_items();
            $data['message'] = '';
        }
        else 
            $data['message'] = 'No Items Found';
        
        $data['header'] = 'Item List';
        $data['flag'] = 1;
        $data['page'] = 'lists/view_list';
        $this->load->view('template2', $data);
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
        redirect('items/goto_itemForm');
    }

    function goto_editItemForm($edit) {

        $data['header'] = 'Edit Item';
        $data['flag'] = 1;
        $data['page'] = 'forms/itemEdit_form';
        $data['edit'] = $edit;
        $this->load->view('template2', $data);
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
        $data['flag'] = 1;
        $data['page'] = 'admin/successEdit';
        $this->load->view('template2', $data);
    }

    function delete_item($item_code) {

        $this->pos_model->delete_item($item_code);
        redirect('items/view_items');
    }

    function get_view($view='all') {
        $view = $this->input->post('view_dropdown');

        if($view=='all') {
            $result = $this->pos_model->getAll_items();
            $data['page'] = 'lists/view_list';
        }
        else if($view=='group') {
            $result = $this->pos_model->get_group();
            $data['page'] = 'view_item_bygroup';
        }
        else if($view=='class') {
            $result = $this->pos_model->get_class();
            $data['page'] = 'view_item_byclass';
        }
        else if($view=='supplier') {
            $ctr = 0;
            $result = $this->pos_model->get_supply($ctr);
            $data['page'] = 'view_item_bysupplier';
        }
        else if($view=='out') {
            $ctr = 1;
            $result = $this->pos_model->get_supply($ctr);
            $data['page'] = 'view_item_byOutofStock';
        }
        else if($view=='reorder') {
            $ctr = 2;
            $result = $this->pos_model->get_supply($ctr);
            $data['page'] = 'view_item_bybelowReorder';
        }
        
        if($result) {
            $data['items'] = $result;
            $data['message'] = '';
        }
        else 
            $data['message'] = 'No Items Found';
        
        $data['header'] = 'Item List';
        $data['flag'] = 1;
        $this->load->view('template2', $data);
    }

    function importExcel() {

      $data['header'] = 'Import Excel';
      $data['flag']=1;
      $data['page'] = 'forms/import_excel';
      $this->load->view('template2', $data);
    }

    function import_excel(){

        echo $this->db->_error_message();
        if(isset($_POST["Import"]))
        {
          $filename=$_FILES["file"]["tmp_name"];
          $i = 0;
          //echo $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
           if($_FILES["file"]["size"] > 0)
           {
            $file = fopen($filename, "r");
            $this->db->trans_start();
                 while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
                 {
                if($emapData[1] == '') $emapData[1] = NULL;
                if($emapData[0] == '') $emapData[0] = NULL;
                   $data = array(
                     'item_code' => $emapData[1],
                     'bar_code' => $emapData[0],
                     'desc1' => $emapData[2],
                     'desc2' => $emapData[3],
                     'desc3' => $emapData[4],
                     'desc4' => $emapData[5],
                     'division' => $emapData[6],
                     'group' => $emapData[7],
                     'class1' => $emapData[8],
                     'class2' => $emapData[9],
                     'cost' => $emapData[10],
                     'retail_price' => $emapData[11],
                     'model_quantity' => $emapData[12],
                     'supplier_code' => $emapData[13],
                     'manufacturer' => $emapData[14],
                     'quantity' => 0,
                     'reorder_point' => 0
                  );
                  $this->db->insert('item', $data);
                 }
            $this->db->trans_complete();
            fclose($file);
            if ($this->db->trans_status() === FALSE){
              $data['message']="CSV File not Imported";
              $data['page'] = 'forms/import_excel';
            }
            else{
              $data['message']="CSV File has been successfully Imported";;
              $data['page'] = 'forms/import_excel';
            }
          }
          else{
          $data['message'] =  "Invalid File:Please Upload CSV File";
          }
          
        }
        $data['header'] = 'Import Excel';
        $data['flag']=1;
        $this->load->view('template2', $data);
  } //end of import_excel
    


}
?>