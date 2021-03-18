<?php defined('BASEPATH') or exit('No direct script access allowed');

class Patient_controller extends CI_Controller
{
    /*
      |--------------------------------------
      |   Constructor function
      |--------------------------------------
      */
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
        $this->load->model('admin/Patient_model', 'patient_model');
        $this->load->model('admin/Clinic_model', 'clinic_model');
        $this->load->model('admin/Procedure_model', 'procedure_model');
        $this->load->model('admin/Overview_model', 'overview_model');
        $this->load->model('admin/email/Email_model', 'email_model');
        $this->load->model('admin/Doctor_model', 'doctor_model');
    }

    /*
    |--------------------------------------
    |     view all patient list
    |--------------------------------------
    */
    public function patient_list()
    {
        $data['title'] = 'Patient list';
        $data['patient_info'] = $this->patient_model->get_all_patient();
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_patient_list');
        $this->load->view('admin/_footer');
    }
    /*
    |--------------------------------------
    |     Today patient list
    |--------------------------------------
    */
    public function today_patient_list()
    {
        $data['title'] = 'Patient list';
        $data['patient_info'] = $this->overview_model->today_patient();
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_today_patient_list');
        $this->load->view('admin/_footer');
    }
    /*
    |--------------------------------------
    |   Create a new patient view
    |--------------------------------------
    */
    public function create_new_patient()
    {
        $data['title'] = 'Create Patient';
        $this->load->view('admin/_header', ['lang'=>$this->lang,'clinics'=>$this->clinic_model->clinics_list(),'procedures'=>$this->procedure_model->procedures_list()]);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_create_patient');
        $this->load->view('admin/_footer');
    }
    /*
    |--------------------------------------
    |   patient id genaretor
    |--------------------------------------
    */


    public function randstrGen($mode=null, $len=null)
    {
        $result = "";
        if ($mode == 1):
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; elseif ($mode == 2):
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; elseif ($mode == 3):
                $chars = "abcdefghijklmnopqrstuvwxyz0123456789"; elseif ($mode == 4):
                $chars = "0123456789";
        endif;
        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .="".$charArray[$randItem];
        }
        return $result;
    }


    /*
    |--------------------------------------
    | save patient to patient_tbl
    |--------------------------------------
    */

    public function save_patient()
    {
        $this->form_validation->set_rules('national_id', 'National ID , ', 'required|min_length[14]|max_length[14]|is_unique[patient_tbl.national_id]');
        $this->form_validation->set_rules('patient_phone', 'Phone Number, ', 'trim|required|is_unique[patient_tbl.patient_phone]');
        $this->form_validation->set_rules('city', 'city, ', 'required');
        
        //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[log_info.email]');
        //$this->form_validation->set_rules('family_name', 'Family Name', 'trim|required');
   
        if ($this->form_validation->run()==true) {
            
          // get picture data
            if (@$_FILES['picture']['name']) {
                $config['upload_path']   = './assets/uploads/patient/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite']     = false;
                $config['max_size']      = 1024;
                $config['remove_spaces'] = true;
                $config['max_filename']   = 10;
                $config['file_ext_tolower'] = true;
              
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('picture')) {
                    $this->session->set_flashdata('exception', "<div class='alert alert-danger msg'>".$this->upload->display_errors()."</div>");
                    redirect('create_new_patient');
                } else {
                    $data = $this->upload->data();
                    $image = base_url($config['upload_path'].$data['file_name']);
                    #------------resize image------------#
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $config['upload_path'].$data['file_name'];
                    $config['create_thumb'] = false;
                    $config['maintain_ratio'] = false;
                    $config['width']     = 250;
                    $config['height']   = 200;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    #-------------resize image----------#
                }
            } else {
                $image = "";
            }

            #------------------------------------------------#
 
            $create_date = date('Y-m-d h:i:s');
            $birth_date = date('Y-m-d', strtotime($this->input->post('birth_date', true)));
            $patient_id = ("P".date('y').strtoupper($this->randstrGen(2, 4)));

            $savedata =  array(

                'title'             => $this->input->post('title', true),
                'patient_id'        => $patient_id,
                'national_id'       =>$this->input->post('national_id', true),
                'city_id'       => $this->input->post('city', true),
                'given_name'        => $this->input->post('given_name', true),
                'clinic_id'        => $this->input->post('patient_clinic', true),
                'procedure_id'        => $this->input->post('patient_procedure', true),
                //'patient_email'     => $this->input->post('email', true),
                'patient_phone'     => $this->input->post('patient_phone', true),
                'mobile_number'     => $this->input->post('mobile_number', true),
                
                //'suburb'            => $this->input->post('suburb', true),

                //'post_code' 1234        => $this->input->post('post_code', true),
                'emg_family_name'   => $this->input->post('emg_family_name', true),
                'emg_title'         => $this->input->post('emg_title', true),
                'emg_given_name'    => $this->input->post('emg_given_name', true),
                'emg_phone'         => $this->input->post('emg_phone', true),
                'emg_mobile'        => $this->input->post('emg_mobile', true),

                'birth_date'        => $birth_date,
                'sex'               => $this->input->post('gender', true),
                'blood_group'       => $this->input->post('blood_group', true),
                'address'           => $this->input->post('address', true),
                'picture'           => $image,
                'create_by'         => $this->session->userdata('log_id'),
                'create_date'       =>$create_date
            );
            
            $savedata = $this->security->xss_clean($savedata);
            $this->patient_model->save_patient($savedata);

            

            $madical['patient_id']           = $patient_id;
            $madical['dob']                  = $birth_date;
            $madical['food_allergies']       = $this->input->post('food_allergies', true);
            $madical['bleed_tendency']       = $this->input->post('bleed_tendency', true);
            $madical['heart_disease']        = $this->input->post('heart_disease', true);
            $madical['high_blood_pressure']  = $this->input->post('high_blood', true);
            $madical['surgeries']            = $this->input->post('surgeries', true);
            $madical['accidents']            = $this->input->post('accidents', true);
            $madical['diabetic']             = $this->input->post('diabetic', true);
            $madical['surgeries']            = $this->input->post('surgeries', true);
            $madical['others']               = $this->input->post('others', true);
            $madical['high_risk_diseases']   = $this->input->post('high_risk_diseases', true);
            $madical['family_history']       = $this->input->post('family_history', true);
            $madical['current_medication']   = $this->input->post('current_medication', true);
            $madical['others_msurance']      = $this->input->post('otheres_msrance', true);
            
            $gender = $this->input->post('gender', true);

            if ($gender=='Female') {
                $madical['female_pregnent']      = $this->input->post('female_pregnent', true);
                $madical['female_breast_feeding'] = $this->input->post('female_breast_feeding', true);
            } else {
                $madical['others_comcare']       = $this->input->post('others_comcare', true);
                $madical['others_tac']           = $this->input->post('others_tac', true);
                $madical['others_low_income']    = $this->input->post('others_low_income', true);
                $madical['others_reffer']        = $this->input->post('others_reffer', true);
                $madical['subscription']         = $this->input->post('subscription', true);
            }
                
            
            $this->db->insert('patient_medical_info', $madical);

            /* $email_config1 = $this->email_model->email_config();
            #-------------------------------
            if (@$email_config1->at_registration) {
                // gate email template
                $email_temp_info = $this->db->select("*")->from('email_template')->where('default_status', 1)->where('template_type', 1)->get()->row();


                if (!empty($email_temp_info)) {
                    $message = $this->template([
                           'patient_name'     => $this->input->post('name', true),
                           'patient_id'       => $this->input->post('patient_id', true),
                           'phone'       => $this->input->post('phone', true),
                           'date' => date("Y-m-d h:i:s"),
                           'message'          => $email_temp_info->email_template
                       ]);

                    #----------------------------
                    $config['protocol'] = $email_config1->protocol;
                    $config['mailpath'] = $email_config1->mailpath;
                    $config['charset'] = 'utf-8';
                    $config['wordwrap'] = true;
                    $config['mailtype'] = $email_config1->mailtype;
                    $this->email->initialize($config);

                    $this->email->from($email_config1->sender, "Doctor");
                    $this->email->to($this->input->post('email', true));
                    $this->email->subject("Registration");
                    $this->email->message($message);
                    $this->email->send();
                    #-----------------------------

                    // save email delivary data
                    $save_email = array(
                    'delivery_date_time '=> date("Y-m-d h:i:s"),
                    'reciver_email '=> $this->input->post('email'),
                    'message'     => $message
                  );

                    $this->db->insert('email_delivery', $save_email);
                }
            } */

            $da['pmessget']="Patient create successful, now get appointment";
            $da['info'] = $savedata;
            $da['doctor'] = $this->doctor_model->get_all_doctor();
            $this->load->view('admin/_header', $da);
            $this->load->view('admin/_left_sideber');
            $this->load->view('admin/view_create_patient_appointment');
            $this->load->view('admin/_footer');
        } else {
            $data['old'] = (object) @$_POST;
            $this->load->view('admin/_header', $data);
            $this->load->view('admin/_left_sideber');
            $this->load->view('admin/view_create_patient');
            $this->load->view('admin/_footer');
        }
    }

    #--------------------------------------
    public function template($config = null)
    {
        $newStr = $config['message'];
        foreach ($config as $key => $value) {
            $newStr = str_replace("%$key%", $value, $newStr);
        }
        
        return $newStr;
    }

    /*
    |--------------------------------------
    |   delete patient to patient_tbl
    |--------------------------------------
    */
    public function delete_patient($patient_id)
    {
        $this->db->where('patient_id', $patient_id);
        $this->db->delete('patient_tbl');
        $this->session->set_flashdata('message', "<div class='alert alert-success msg'>".display('delete_msg')."</div>");
        redirect('patient_list');
    }
  
    /*
    |--------------------------------------
    |    patient edit form view
    |--------------------------------------
    */
    public function patient_edit($patient_id)
    {
        $data['title'] = 'Edit Patient';
        $data['patient_info'] = $this->patient_model->get_patient_inde_info(@$patient_id);
        $data['madical_info'] = $this->patient_model->get_patient_madical_info(@$patient_id);

        $data['clinics'] = $this->clinic_model->clinics_list();
        $data['procedures'] = $this->procedure_model->procedures_list();

        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_edit_patient');
        $this->load->view('admin/_footer');
    }

    /*
    |--------------------------------------
    |    patient edit save to patient_tbl
    |--------------------------------------
    */
    public function edit_save_patient()
    {
        /* $this->form_validation->set_rules('family_name', 'family_name is already exist, ', 'trim|required'); */
       /*  $this->form_validation->set_rules('email', 'Email is already exist, ', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone is already exist, ', 'trim|required'); */
        $this->form_validation->set_rules('national_id', 'National ID , ', 'required|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('patient_phone', 'Phone Number, ', 'trim|required');
        $this->form_validation->set_rules('city', 'city, ', 'required');
        $patient_id = $this->input->post('patient_id');


        if ($this->form_validation->run()==true) {
            // get picture data
            if (@$_FILES['picture']['name']) {
                $ext = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
                $config['upload_path']          = './assets/uploads/patient/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite']     = false;
                $config['max_size']      = 1024;
                $config['remove_spaces'] = true;
                $config['max_filename']   = 5;
                $config['file_ext_tolower'] = true;
                
                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('picture')) {
                    $this->session->set_flashdata('exception', "<div class='alert alert-danger msg'>".$this->upload->display_errors()."</div>");
                    redirect('admin/Patient_controller/patient_edit/'.$patient_id);
                } else {
                    $data = $this->upload->data();
                    $image = base_url($config['upload_path'].$data['file_name']);
                    #------------resize image------------#
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $config['upload_path'].$data['file_name'];
                    $config['create_thumb'] = false;
                    $config['maintain_ratio'] = false;
                    $config['width']     = 250;
                    $config['height']   = 300;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    #-------------resize image----------#
                }
            } else {
                $image = $this->input->post('image', true);
            }
            $birth_date = date('Y-m-d', strtotime($this->input->post('birth_date', true)));

              

            $savedata =  array(


                'title'             => $this->input->post('title', true),
                'patient_id'        => $patient_id,
                'national_id'       =>$this->input->post('national_id', true),
                'city_id'       => $this->input->post('city', true),
                'given_name'        => $this->input->post('given_name', true),
                'clinic_id'        => $this->input->post('patient_clinic', true),
                'procedure_id'        => $this->input->post('patient_procedure', true),
                //'patient_email'     => $this->input->post('email', true),
                'patient_phone'     => $this->input->post('patient_phone', true),
                'mobile_number'     => $this->input->post('mobile_number', true),
                
                //'suburb'            => $this->input->post('suburb', true),

                //'post_code' 1234        => $this->input->post('post_code', true),
                'emg_family_name'   => $this->input->post('emg_family_name', true),
                'emg_title'         => $this->input->post('emg_title', true),
                'emg_given_name'    => $this->input->post('emg_given_name', true),
                'emg_phone'         => $this->input->post('emg_phone', true),
                'emg_mobile'        => $this->input->post('emg_mobile', true),

                'birth_date'        => $birth_date,
                'sex'               => $this->input->post('gender', true),
                'blood_group'       => $this->input->post('blood_group', true),
                'address'           => $this->input->post('address', true),
                'picture'           => $image,
                  
                    
                );



            $madical['patient_id']           = $patient_id;
            $madical['dob']                  = $birth_date;
            $madical['food_allergies']       = $this->input->post('food_allergies', true);
            $madical['bleed_tendency']       = $this->input->post('bleed_tendency', true);
            $madical['heart_disease']        = $this->input->post('heart_disease', true);
            $madical['high_blood_pressure']  = $this->input->post('high_blood', true);
            $madical['surgeries']            = $this->input->post('surgeries', true);
            $madical['accidents']            = $this->input->post('accidents', true);
            $madical['diabetic']             = $this->input->post('diabetic', true);
            $madical['surgeries']            = $this->input->post('surgeries', true);
            $madical['others']               = $this->input->post('others', true);
            $madical['high_risk_diseases']   = $this->input->post('high_risk_diseases', true);
            $madical['family_history']       = $this->input->post('family_history', true);
            $madical['current_medication']   = $this->input->post('current_medication', true);
            $madical['others_msurance']      = $this->input->post('otheres_msrance', true);
                
            $gender = $this->input->post('gender', true);

            if ($gender=='Female') {
                $madical['female_pregnent']      = $this->input->post('female_pregnent', true);
                $madical['female_breast_feeding'] = $this->input->post('female_breast_feeding', true);
            } else {
                $madical['others_comcare']       = $this->input->post('others_comcare', true);
                $madical['others_tac']           = $this->input->post('others_tac', true);
                $madical['others_low_income']    = $this->input->post('others_low_income', true);
                $madical['others_reffer']        = $this->input->post('others_reffer', true);
                $madical['subscription']         = $this->input->post('subscription', true);
            }

            $this->patient_model->save_edit_patient($savedata, $patient_id);
              
            $this->patient_model->save_edit_patient_madical_info($madical, $patient_id);
              
            $this->session->set_flashdata('message', "<div class='alert alert-success msg'>".display('update_msg')."</div>");
            redirect('patient_list');
        } else {
            $data['patient_info'] = $this->patient_model->get_patient_inde_info(@$patient_id);
            $data['madical_info'] = $this->patient_model->get_patient_madical_info(@$patient_id);

            $this->load->view('admin/_header', $data);
            $this->load->view('admin/_left_sideber');
            $this->load->view('admin/view_edit_patient');
            $this->load->view('admin/_footer');
        }
    }



    public function patient_info($patient_id=null)
    {
        $data['title'] = 'Patient info';
        $data['patient_info'] = $this->patient_model->get_patient_inde_info(@$patient_id);
        $data['madical_info'] = $this->patient_model->get_patient_madical_info(@$patient_id);
        $data['prescription'] = $p_data = $this->db->select('*')->from('prescription_data')->where('patient_id', $patient_id)->get()->result();
            
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_patient_info');
        $this->load->view('admin/_footer');
    }

    public function upload()

    {
        $file = $_FILES['file']['name'];
        $config['upload_path']   = './uploads/patient/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 5024;
        $config['remove_spaces'] = true;
       
        
        $config['file_name'] = $file;
      
        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')){
            var_dump($this->upload->data()); 
        }
          
    }
}
