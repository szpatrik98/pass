<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 *
 * @author szabb
 */
class films_model extends CI_Model{
    
	public function __construct(){
        parent::__construct();
        
        $this->load->database();
      
    }

    public function get_list(){
        $this->db->select('*');
        $this->db->from('films'); 
        $this->db->order_by('address','ASC'); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result;
    }
    
    public function update($id, $address, $type, $time){
        $record = [
            'address'  =>  $address, 
            'type'   =>  $type,
            'time'   =>  $time

        ];
        $this->db->where('id',$id);
        return $this->db->update('films',$record);
    }
    
    public function select_by_id($id){

        $this->db->select("*");
        $this->db->from('films');
        $this->db->where('id',$id); 
        
        return $this->db->get() 
                        ->row(); 
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('films');
    }
	public function insert($address, $type, $time){
        
        $record = [ 
            'address'  =>  $address, 
            'type'   =>  $type,
            'time'   =>  $time
        ];
        
        return $this->db->insert('films',$record);

    }
	

}
