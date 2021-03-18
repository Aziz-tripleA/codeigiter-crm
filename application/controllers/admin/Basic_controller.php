<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_controller extends CI_Controller {

/*
|--------------------------------------
|    constructor function
|--------------------------------------
*/ 
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');

		$session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ){
         redirect('logout');
        }

	    $this->load->model('admin/Basic_model','basic_model');
        $this->load->model('web/Home_view_model','home_view_model');
    }

/*
|--------------------------------------
|     view  print_appointment_info
|--------------------------------------
*/ 
    public function print_appointment_info()
    {
        $appointment_id = $this->session->userdata('appointment_id'); 
        $data['print'] = $this->basic_model->get_appointment_print_result($appointment_id);
        $data['info'] = $this->home_view_model->Home_satup();
    		
    		if($data){
             	$this->load->view('public/patient_appointment_info',$data); 
            } else {
                    if($this->session->userdata('log_id')) {
                    redirect('admin/Appointment_controller');
            } else {
    	            redirect("index");
    	        } 
            } 
    }
    
/*
|--------------------------------------
|    my_appointment view 
|--------------------------------------
*/ 
    public function my_appointment($appointment_id=NULL)
    {
    	if(isset($appointment_id)) {

            $query_result = $this->db->select("action_serial.*,
                patient_tbl.*,
                doctor_tbl.doctor_name,
                doctor_tbl.department,
                log_info.*")
                ->from('action_serial')
                ->join('patient_tbl', 'patient_tbl.patient_id = action_serial.patient_id','left')
                ->join('doctor_tbl', 'doctor_tbl.doctor_id = action_serial.doctor_id','left')
                ->join('log_info', ' log_info.log_id = doctor_tbl.log_id','left')
                ->where('action_serial.appointment_id',$appointment_id)
                ->get();
                $result = $query_result->row();

                $data['print'] = $result;
                $this->load->view('public/appointment_info',$data);

        } else {
              redirect("");
        }
    }



    public function profile(){

      $data['title'] = 'Profile';
        $doctor_id = $this->session->userdata('doctor_id');
        $data['doctor_info'] = $this->db->where('doctor_id',$doctor_id)->get('doctor_tbl')->row();


        $this->load->view('admin/_header',$data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/adminprofile');
        $this->load->view('admin/_footer');
    }   


    public function update_profile(){


        $this->form_validation->set_rules('name', 'Name', 'required');
    
        if($this->form_validation->run()==true) {
                # get picture data
              if (@$_FILES['picture']['name']) {
                $config['upload_path']   = './assets/uploads/doctor/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite']     = false;
                $config['max_size']      = 1024;
                $config['remove_spaces'] = true;
                $config['max_filename']   = 10;
                $config['file_ext_tolower'] = true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('picture'))
                {
                  $this->session->set_flashdata('execption','<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>'.$this->upload->display_errors().'</strong> .
              </div>');
                   
                   redirect('admin/Basic_controller/profile');
                } else {
                
                 $data = $this->upload->data();
                 $image = base_url($config['upload_path'].$data['file_name']);
                  #------------resize image------------#
                  $this->load->library('image_lib');
                  $config['image_library'] = 'gd2';
                  $config['source_image'] = $config['upload_path'].$data['file_name'];
                  $config['create_thumb'] = FALSE;
                  $config['maintain_ratio'] = FALSE;
                  $config['width']     = 250;
                  $config['height']   = 200;

                  $this->image_lib->clear();
                  $this->image_lib->initialize($config);
                  $this->image_lib->resize();
                  #-------------resize image----------#
                }

                } else {
                    $image = $this->input->post('image',TRUE);
                } 

                $savedata =  array(
                    'doctor_name' => $this->input->post('name',TRUE),
                    'doctor_exp' => $this->input->post('doctor_exp',TRUE),
                    'birth_date' => $this->input->post('birth_date',TRUE),
                    'sex' => $this->input->post('gender',TRUE),
                    'blood_group' => $this->input->post('blood_group',TRUE),
                    'doctor_phone' => $this->input->post('phone',TRUE),
                    'address' => $this->input->post('address',TRUE),
                    'picture' => $image
                );
               $doctor_id = $this->session->userdata('doctor_id');


              $this->db->where('doctor_id',$doctor_id)->update('doctor_tbl',$savedata);

              $this->session->set_flashdata('message','<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>'.display('update_msg').'</strong> .
              </div>');
              redirect('admin/Basic_controller/profile');

        } else {

            $id = $this->session->userdata('doctor_id');
            $data['doctor_info'] = $this->db->where('doctor_id',$id)->get('doctor_tbl')->row();

            $this->load->view('admin/_header',$data);
            $this->load->view('admin/_left_sideber');
            $this->load->view('admin/adminprofile');
            $this->load->view('admin/_footer');
        }
    }     

}