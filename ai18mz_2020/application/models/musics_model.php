<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees_model
 *
 * @author szabb
 */
class musics_model extends CI_Model{
    
	public function __construct(){
        parent::__construct();
        
        $this->load->database();
      
    }

    public function get_list(){
        $this->db->select('*');
        $this->db->from('musics'); 
        $this->db->order_by('performer','ASC'); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result;
    }
    
    public function update($id, $performer, $title, $time){
        $record = [
            'performer'  =>  $performer, 
            'title'   =>  $title,
            'time'   =>  $time

        ];
        $this->db->where('id',$id);
        return $this->db->update('musics',$record);
    }
    
    public function select_by_id($id){

        $this->db->select("*");
        $this->db->from('musics');
        $this->db->where('id',$id); 
        
        return $this->db->get() 
                        ->row(); 
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('musics');
    }
	public function insert($performer, $title, $time, $photo_path){
        
        $record = [ 
            'performer'   =>  $performer,
            'title'   =>  $title,
			'time' => $time,
			'photo_path' => $photo_path
        ];
        
        return $this->db->insert('musics',$record);
        
        
    }
	

}
