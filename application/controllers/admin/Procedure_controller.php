<?php defined('BASEPATH') or exit('No direct script access allowed');


class Procedure_controller extends CI_Controller
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

        $this->load->model('admin/Procedure_model','procedure_model');
    }
    
    public function index()
    {
        $data['title'] = 'procedures List';
        $data['procedures'] = $this->procedure_model->procedures_list();
        $this->load->view('admin/_header',$data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_procedures_list');
        $this->load->view('admin/_footer');
    }


    public function procedure_create()
    {
        $this->form_validation->set_rules('procedure_name','Procedure Name ,','required');
       

        if($this->form_validation->run()){
            $data = [
                'name' => $this->input->post('procedure_name'),
                
            ];

            $this->procedure_model->procedure_create($data);
            $this->session->set_flashdata('message', display('procedure_creaded'));
        }
        
        $da['old'] = (object) @$_POST;
        $this->load->view('admin/_header',$da);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_procedures_create');
        $this->load->view('admin/_footer');
    }

    /**
     * get data to edit procedure
     */
    public function procedure_edit($id = null)
    {
        $data['title'] = 'Edit Procedure';
        $data['procedure'] = $this->procedure_model->get_procedure(@$id);
       

        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_edit_procedure');
        $this->load->view('admin/_footer');
    }
    /**
     * 
     * update procedure
     */
    public function save_edit_procedure()
    {
        $this->form_validation->set_rules('procedure_name', 'Procedure Name, ', 'trim|required');
        if($this->form_validation->run()==true){
            $data['name'] = $this->input->post('procedure_name');
        }
        $procedure_id = $this->input->post('procedure_id');

        $this->procedure_model->save_edit_procedure($data , $procedure_id);
          
        $this->session->set_flashdata('message', "<div class='alert alert-success msg'>".display('update_msg')."</div>");

        redirect('admin/Procedure_controller');
    }

    public function procedure_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('procedures');
        $this->session->set_flashdata('message', "<div class='alert alert-success msg'>".display('delete_msg')."</div>");
        redirect('admin/Procedure_controller');
    }
}
