<?php defined('BASEPATH') or exit('No direct script access allowed');


class Clinic_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id');
        if ($session_id == null) {
            redirect('logout');
        }
        
        $user_type = $this->session->userdata('user_type');
        if ($user_type!=1) {
            redirect('logout');
        }

        $this->load->model('admin/Clinic_model', 'clinic_model');
    }
    
    public function index()
    {
        $data['title'] = 'Clinics List';
        $data['clinics'] = $this->clinic_model->clinics_list();
        $this->load->view('admin/_header',$data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_clinic_list');
        $this->load->view('admin/_footer');
    }


    public function clinic_create()
    {
        $this->form_validation->set_rules('clinic_name','Clinic Name ,','required');
        $this->form_validation->set_rules('clinic_phone','Clinic Phone ,','required');
        $this->form_validation->set_rules('clinic_address','Clinic Address ,','required');

        if($this->form_validation->run()){
            $data = [
                'clinic_name' => $this->input->post('clinic_name'),
                'phone_number' => $this->input->post('clinic_phone'),
                'clinic_address' => $this->input->post('clinic_address'),
            ];

            $this->clinic_model->clinic_create($data);
            $this->session->set_flashdata('message', display('clinic_creaded'));
        }
        
        $da['old'] = (object) @$_POST;
        $this->load->view('admin/_header',$da);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_clinic_create');
        $this->load->view('admin/_footer');
    }


    public function clinic_edit($clinic_id)
    {
        $data['title'] = 'edit clinic';
        $data['clinic'] = $this->clinic_model->get_clinic($clinic_id);

        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_clinic_edit');
        $this->load->view('admin/_footer');
    }


    public function save_edit_clinic()
    {
        $this->form_validation->set_rules('clinic_name','Clinic Name ,','required');
        $this->form_validation->set_rules('clinic_phone','Clinic Phone ,','required');
        $this->form_validation->set_rules('clinic_address','Clinic Address ,','required');
        $clinic_id = $this->input->post('clinic_id');
        if($this->form_validation->run() == true){
            $data = [
                'clinic_name' => $this->input->post('clinic_name'),
                'phone_number' => $this->input->post('clinic_phone'),
                'clinic_address' => $this->input->post('clinic_address'),
            ];

           
        }
        $this->clinic_model->clinic_update($data,$clinic_id);
        $this->session->set_flashdata('message', display('update_msg'));

        redirect('admin/Clinic_controller');
    }
}
