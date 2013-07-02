<?php
class Item_model extends CI_Model {

	function getAll_items() {

		$this->db->where('active', 1);
		$result = $this->db->get('item');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_items_bySupplier($supplier_name) {

		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('supplier_code',$supplier_name);
		$result = $this->db->get();
		 if($result->num_rows() > 0) {
				foreach ($result->result() as $row) {
					$data[] = $row;
				}
				return $data;
		}
		else 
				return false;
	}

	function delete_item($item_id) {
		$this->db->where('item_id',$item_id);
		$this->db->update('item', array('active'=>0));
		//$this->db->delete('item', array('item_code' => $item_code));
	}

	function get_edit_item($edit) {

		$this->db->where('item_id',$edit);
		$this->db->from('item');

		$query = $this->db->get();

		return $query->result();
	}

	function update_item($data,$edit){
			
			//update item
			$this->db->where('item_id',$edit);
			$this->db->update('item',$data);							
	}

	function get_item_byCode($item_code){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item_code',$item_code);
		$result = $this->db->get();
		 if($result->num_rows() > 0) {
				foreach ($result->result() as $row) {
					$data = $row;
				}
				return $data;
		}
		else 
				return false;
	}

	function get_item_byId($item_id){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('item_id',$item_id);
		$result = $this->db->get();
		 if($result->num_rows() > 0) {
				foreach ($result->result() as $row) {
					$data = $row;
				}
				return $data;
		}
		else 
				return false;
	}

	function subtract_item($item_code, $qty) {
		
		$query = "UPDATE item set quantity=quantity-$qty WHERE item_code='$item_code'";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
	}

	
	function get_group() {

		$this->db->from('item');
		$this->db->group_by('group');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_items_ingroup($group) {

		$this->db->where('group',$group);
		$this->db->from('item');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_division() {

		$this->db->from('item');
		$this->db->group_by('division');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_items_indivision($division) {

		$this->db->where('division',$division);
		$this->db->from('item');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_class() {

		$this->db->from('item');
		$this->db->group_by('class1');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_items_inclass($class) {

		$this->db->where('class1',$class);
		$this->db->from('item');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_supply($ctr) {

		if($ctr==1) $this->db->where('quantity <= reorder_point');
		if($ctr==2) $this->db->where('quantity < reorder_point');

		$this->db->from('item');
		$this->db->group_by('supplier_code');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_items_insupply($supply,$ctr) {

		$this->db->where('supplier_code',$supply);
		if($ctr==1) $this->db->where('quantity <= reorder_point');
		if($ctr==2) $this->db->where('quantity < reorder_point');

		$this->db->from('item');
		$result=$this->db->get();

		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_items2() {

		$this->db->select('concat(desc1," ",desc2," ",desc3," ",desc4) as label,item_code as item_code,item_id',false);
		$this->db->from('item');
		$result = $this->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_items3($mode) {

		if($mode == 'Barcode') $query = $this->db->query('select CONCAT(COALESCE(item.bar_code,"")," ",COALESCE(item.desc1,"")," ",desc2," ",desc3," ",desc4) as label, item.bar_code as value ,item.item_id from item');
		else if($mode == 'Itemcode') $query = $this->db->query('select CONCAT(COALESCE(item.desc1,"")," ",COALESCE(item.bar_code,"")," ",desc2," ",desc3," ",desc4) as label, item.desc1 as value ,item.item_id from item');

		//if($mode == 'Barcode') $this->db->select("CONCAT(COALESCE(item.bar_code,'None'),' ',COALESCE(item.desc1,'None') as label,item.bar_code as value ,item.item_id",false);
		//else if($mode == 'Itemcode')$this->db->select("CONCAT(COALESCE(item.desc1,'None'),' ',item.COALESCE(bar_code,'None') as label,item.desc1 as value,item.item_id",false);
		//$this->db->from('item');
		//$result = $this->db->get();
		//echo $result;
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function orderbyID($order) {

		$this->db->where('active', 1);

		if($order==1)		
		$this->db->order_by('item_id');
		elseif ($order==2)
		$this->db->order_by('item_code');
		elseif ($order==3)
		$this->db->order_by('bar_code');
		elseif ($order==4)
		$this->db->order_by('desc1');
		elseif ($order==5)
		$this->db->order_by('division');
		elseif ($order==6)
		$this->db->order_by('group');
		elseif ($order==7)
		$this->db->order_by('class1');
		elseif ($order==8)
		$this->db->order_by('class2');
		elseif ($order==9)
		$this->db->order_by('cost');
		elseif ($order==10)
		$this->db->order_by('retail_price');
		elseif ($order==11)
		$this->db->order_by('model_quantity');
		elseif ($order==12)
		$this->db->order_by('supplier_code');
		elseif ($order==13)
		$this->db->order_by('manufacturer');
		elseif ($order==14)
		$this->db->order_by('quantity');
		elseif ($order==15)
		$this->db->order_by('reorder_point');

		$result = $this->db->get('item');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}


}
