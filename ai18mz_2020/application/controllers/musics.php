<?php

class musics extends CI_Controller{
 public function __construct(){
        parent::__construct();
        
        $this->load->model('musics_model');
    }
  
    public function index(){

       $records = $this->musics_model->get_list(); 

       $view_params = [
           'musics'  =>  $records
       ];
       $this->load->helper('url'); 

       $this->load->view('music/list', $view_params);
       
    }
    
   public function insert(){

		 if($this->input->post('submit')){
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('performer','performer','required');
            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('time','time','required');

            
            if($this->form_validation->run() == TRUE){
                    
                    $upload_config['allowed_types'] = 'jpg|jpeg|png';            
                    $upload_config['max_size'] = 23000;  
                    $upload_config['min_width'] = 250;
					$upload_config['max_width'] = 1980;
                    $upload_config['min_height'] = 250; 
					$upload_config['max_height'] = 1980;
                    $upload_config['file_name'] = $this->input->post('title') . '_001';
                    $upload_config['upload_path'] = './uploads/';
                    $upload_config['file_ext_tolower'] = TRUE;
                    $upload_config['overwrite'] = FALSE;
                    $this->load->library('upload'); 
                    $this->upload->initialize($upload_config);
                
               if($this->upload->do_upload('photo')){
                       
					   $photo_data = $this->upload->data();

					   $this->musics_model->insert($this->
                                               $this->input->post('performer'),
											   $this->input->post('title'),
                                               $this->input->post('time'),
                                               $photo_data['file_name']);
					   $this->load->helper('url');
                       redirect(base_url('music/index'));  
                }else{
					   $view_params = [    
                          'errors' => $this->upload->display_errors()
                              ];
                       $this->load->helper('form');
                       return $this->load->view('music/insert',$view_params);					 
                    } 
	            }
         }else{
		 $this->load->helper('form');
         $this->load->view('music/insert');
		} 
    }

    public function edit($id = NULL){  

        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->musics_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
		 $this->load->library('form_validation');
        // lemásolom az insertből a validációs szabályokat
        $this->form_validation->set_rules('performer','performer','required');
        $this->form_validation->set_rules('title','title','required');
        $this->form_validation->set_rules('time','time','required');
        
        if($this->form_validation->run() == TRUE){
            $this->musics_model->update($id, 
                                           $this->input->post('performer'),
                                           $this->input->post('title'),
                                           $this->input->post('time'));
            $this->load->helper('url');
            redirect(base_url('musics/index'));
        }
        else{
            $view_params = [
                'mus'    =>  $record
            ];

            $this->load->helper('form'); 
            $this->load->view('music/edit',$view_params);
        }           
    }

    public function delete($id = NULL){

        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        } 
        $record = $this->musics_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        $this->musics_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('musics/index'));
    }
	public function cover($id= null){
        
        if($id == null){
            show_error('Hiányzó rekord azonosító!');
        }
        $record = $this->musics_model->select_by_id($id);

        if($record == null){
            show_error('Ilyen id számmal nincs rekord!');
        }

        $view_params = [
            'cover' => $record
        ];
        
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->view('music/cover', $view_params);
    }
}
	
	
	
