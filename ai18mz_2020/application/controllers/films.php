<?php

class Films extends CI_Controller{
   public function __construct(){
        parent::__construct();
        
        $this->load->model('films_model');
       
    }
    public function index(){
       
       $records = $this->films_model->get_list(); 
        
       $view_params = [
           'films'  =>  $records
       ];
       $this->load->helper('url');
      
       $this->load->view('films/list', $view_params);
    }
    public function insert(){
        
        if($this->input->post('submit')){
           
            $this->load->library('form_validation');
           
            
            $this->form_validation->set_rules('address','address','required');
            $this->form_validation->set_rules('type_of','type_of','required');
            $this->form_validation->set_rules('time','time','required');

            if($this->form_validation->run() == TRUE){
               
                $this->films_model->insert($this->input->post('address'),
                                           $this->input->post('type_of'),
										   $this->input->post('time'));            
                $this->load->helper('url');              
                redirect(base_url('films/index'));
            }
        }

        $this->load->helper('form');
        $this->load->view('films/insert');        
    }

    public function edit($id = NULL){  
        
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->films_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
       
        $this->form_validation->set_rules('address','address','required');
        $this->form_validation->set_rules('type_of','type_of','required');
        $this->form_validation->set_rules('time','time','required');
         
        
        if($this->form_validation->run() == TRUE){
          
            $this->films_model->update($id,
                                               $this->input->post('address'),
                                               $this->input->post('type_of'),
											   $this->input->post('time'));
            $this->load->helper('url');
            redirect(base_url('films'));
        }
        else{
            
            $view_params = [
                'film'    =>  $record
            ];
            

            $this->load->helper('form'); 
            $this->load->view('films/edit',$view_params);
        }
            
    }
    
   
    public function delete($id = NULL){
        
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        
        $record = $this->films_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        
        $this->films_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('films/index'));
    }
}
