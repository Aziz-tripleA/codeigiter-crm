<?php
 defined('BASEPATH') or exit('No direct script access allowed');

class Surgeries_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id');
        if ($session_id == null) {
            redirect('logout');
        }
        $this->load->model('admin/Patient_model', 'patient_model');
        $this->load->model('admin/Procedure_model', 'procedure_model');
        $this->load->model('admin/Clinic_model', 'clinic_model');
        $this->load->model('admin/Surgeries_model', 'surgeries_model');
    }
    /**
     * list all surgeries
     */

    public function index()
    {
        $data['title'] = 'Surgeries List';
        $data['surgeries'] = $this->surgeries_model->surgeries_list();
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_surgeries_list');
        $this->load->view('admin/_footer');
    }

    /**
     * show create form
     */
    public function surgery_create()
    {
        $data['title'] = 'Surgeries List';
        $data['clinics'] = $this->clinic_model->clinics_list();
        $data['patients'] = $this->patient_model->get_all_patient();
        $data['procedures'] = $this->procedure_model->procedures_list();
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_surgeries_create');
        $this->load->view('admin/_footer');
    }


    public function surgery_store()
    {
        $this->form_validation->set_rules('patient_id', 'Patient ,', 'required');
        $this->form_validation->set_rules('procedure_id', 'procedure ,', 'required');
        $this->form_validation->set_rules('clinic_id', 'Clinic ,', 'required');
        $this->form_validation->set_rules('surgery_date', 'Date ,', 'required');
        if ($this->form_validation->run() == true) {
            $data = [
                'title' =>$this->input->post('surgery_title'),
                'patient_id'=>$this->input->post('patient_id'),
                'clinic_id'=>$this->input->post('clinic_id'),
                'procedure_id'=>$this->input->post('procedure_id'),
                'note'=>$this->input->post('surgery_note'),
                'date'=>$this->input->post('surgery_date'),
                ];

            $this->surgeries_model->surgeries_create($data);
            $this->session->set_flashdata('message', display('clinic_creaded'));
        }
       
        redirect('admin/Surgeries_controller');
       
    }
    /**
     * show edit form
     */
    public function surgery_edit($id = null)
    {
        $data['title'] = 'edit Surgery';
        $data['clinics'] = $this->clinic_model->clinics_list();
        $data['patients'] = $this->patient_model->get_all_patient();
        $data['procedures'] = $this->procedure_model->procedures_list();
        $data['surgery'] = $this->surgeries_model->get_surgery($id);

        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_surgeries_edit');
        $this->load->view('admin/_footer');
    }
    /**
     * update 
     */
    public function surgery_edit_store()
    {
        $this->form_validation->set_rules('patient_id', 'Patient ,', 'required');
        $this->form_validation->set_rules('procedure_id', 'procedure ,', 'required');
        $this->form_validation->set_rules('clinic_id', 'Clinic ,', 'required');
        $this->form_validation->set_rules('surgery_date', 'Date ,', 'required');
        if ($this->form_validation->run() == true) {
            $data = [
                'title' =>$this->input->post('surgery_title'),
                'patient_id'=>$this->input->post('patient_id'),
                'clinic_id'=>$this->input->post('clinic_id'),
                'procedure_id'=>$this->input->post('procedure_id'),
                'note'=>$this->input->post('surgery_note'),
                'date'=>$this->input->post('surgery_date'),
                ];
            }
        $this->surgeries_model-> surgery_update($data ,$this->input->post('surgery_id'));
        $this->session->set_flashdata('message', display('update_msg'));
        return redirect('admin/Surgeries_controller');
        
    }

    public function surgery_delete($id)
    {   
    
        $this->db->where('id',$id);
        $this->db->delete('surgeries');
        $this->session->set_flashdata('message', display('delete_msg'));
        redirect('admin/Surgeries_controller');
    }
}
