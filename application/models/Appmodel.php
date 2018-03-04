<?php

class Appmodel extends CI_Model{
    
    function getListdd($table,$key){
        //$this->db->where(array('status_aktif'=>'Y'));
        $this->db->like($key);
        $a = $this->db->get($table);
        return $a->row();
    }
    
    function delete($table,$key){
         $this->db->delete($table,$key);   
        }
        
    function update($table,$data,$where){
        $this->db->update_string($table, $data, $where);
    }
    function insert($table,$data){
        $this->db->insert_string($table, $data);
    }
    
    function gettable($table){
        $ambil = $this->db->get($table);
         if($ambil->num_rows() > 0)
        {
        foreach($ambil->result() as $baris)
        {
    
            $hasil[] = $baris;
	
	}
	
            return $hasil;
	
        }
     }
     
     function _option($table = null,$key = null ,$nilai = null,$id = null) {
         if(empty($id)){
             
         }else{
         $this->db->where($id);
         }
        $result = $this->db->get($table);
        $d = array();
        foreach($result->result_array() as $row) {
        $d[$row[$key]] = $row[$nilai];
        }
            return $d;
        }

     function jumlahData($table){
        return $this->db->get($table)->num_rows();
     }



     function data($table,$number,$offset){
        return $query = $this->db->get($table,$number,$offset)->result();       
    }

     
    function value($id = null, $field = null , $table = null){
        $this->db->where($id);
        $q = $this->db->get($table);
        return $q->row($field); 
    }
    
     private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($d = null)
    {
        //$this->_get_datatables_query();
        $query = $this->db->get($d);
        return $query->num_rows();
    }
 
    public function count_all($d = null)
    {
        $this->db->from($d);
        return $this->db->count_all_results();
    }

    function hitung( $table = null, $id = null){
        $this->db->where($id);
        return $this->db->get($table)->num_rows();
    }   

     public function GetRow($keyword,$table,$order,$field) {        
        $this->db->order_by($order, 'DESC');
        $this->db->like($field, $keyword);
        return $this->db->get($table)->result_array();
    }

    function get_autocomplete($q,$field,$table,$label,$value){
    $this->db->select('*');
    $this->db->like($field, $q);
    $query = $this->db->get($table);
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row[$label]));
        $new_row['value']=htmlentities(stripslashes($row[$value]));

        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }

}