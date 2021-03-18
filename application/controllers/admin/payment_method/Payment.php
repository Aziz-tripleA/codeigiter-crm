<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{


    function  __construct() {
        parent::__construct();
        $this->load->model('web/Home_view_model','home_view_model');
        $this->load->library('paypal_lib');

    }
    

    public function index(){
        $data['title'] = "Payment";
        $data['info'] = $this->db->select('*')->from('payment_account_setup')->get()->row();

        $this->load->view('admin/_header',$data);
        $this->load->view('admin/_left_sideber');
        $this->load->view('admin/view_payment_form');
        $this->load->view('admin/_footer');

    }



    public function save_setup(){

        $savedata = array(
            'paypal_email'=>$this->input->post('paypal_email',TRUE),
            'amount'=>$this->input->post('amount',TRUE),
            'status'=>$this->input->post('status',TRUE)
        );

        $data = $this->db->select('*')->from('payment_account_setup')->get()->row();

        if($data!=NULL){
            $this->db->update('payment_account_setup',$savedata);
        }else{
            $this->db->insert('payment_account_setup',$savedata);
        }

        $this->session->set_flashdata("message","<div class='alert alert-success msg'>Setup Successfully</div>");
        redirect('admin/payment_method/Payment');

    }



    function pay_with_doctor($id){

        //Set variables for paypal form
        $returnURL = base_url().'admin/payment_method/Payment/success/'.$id; //payment success url
        $cancelURL = base_url().'admin/payment_method/Payment/cancel'; //payment cancel url
        $notifyURL = base_url().'admin/payment_method/Payment/ipn'; //ipn url
        //get particular product data
         
        $info = $this->db->select('*')->from('appointment_tbl')->where('appointment_id',$id)->get()->row();

        @$fee = $this->db->select('*')->from('payment_account_setup')->get()->row();
                    
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);

        $this->paypal_lib->add_field('item_name', $id);
        $this->paypal_lib->add_field('custom', $id);
        $this->paypal_lib->add_field('item_number', 1);
        $this->paypal_lib->add_field('amount',  $fee->amount);
        $this->paypal_lib->paypal_auto_form();


    }




    public function success($id){

        if(!empty($id)){

            $info = $this->db->select('*')->from('action_serial')->where('appointment_id',$id)->get()->row();
            $patient = $this->db->select('*')->from('patient_tbl')->where('patient_id',$info->patient_id)->get()->row();
            $paymentamount = $this->db->select('*')->from('payment_account_setup')->get()->row();



            $paydata= array(

                'appointment_id'=>$info->appointment_id,
                'patient_id'=>$info->patient_id,
                'doctor_id'=>$info->doctor_id,
                'amount'=>$paymentamount->amount,
                'payer_email'=>$patient->patient_email,
                'date_time'=>date('Y-m-d H:i:s'),
                'payment_status'=>1,
                'notes'=>'test'
            );

            $this->db->insert('payment_table',$paydata);

            $id = $this->db->insert_id();

            redirect('admin/payment_method/payment/payment_receipt/'.$id);

           
        }else{
            redirect('admin/payment_manage');
        }


    }

    public function payment_receipt($payment_id){

        $payment_info = $this->db->where('payment_id',$payment_id)->get('payment_table')->row();

        $data['title'] = "Payment info";

        $info = $this->db->select('*')->from('action_serial')->where('appointment_id',$payment_info->appointment_id)->get()->row();
        $patient = $this->db->select('*')->from('patient_tbl')->where('patient_id',$payment_info->patient_id)->get()->row();
        $data['info'] = $this->home_view_model->Home_satup();
        $data['appointment_info'] = $info;
        $data['patient'] = $patient;
        $data['payment_info'] = $payment_info;
        
        $this->load->view('public/payment_success',$data);
    }




    public function cancel(){
        $data['info'] = $this->home_view_model->Home_satup();
        $this->load->view('public/pay_error',$data);
    }



    public function ipn(){
       //paypal return transaction details array
        $paypalInfo    = $this->input->post();
        $id = $paypalInfo['custom'];

        $info = $this->db->select('*')->from('appointment_tbl')->where('appointment_id',$id)->get()->row();  

        $data['patient_id'] = $paypalInfo['custom'];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['doctor_id']    = $info->doctor_id;
        $data['amount']    = $paypalInfo["amount"];
        $data['payment_status']    = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
             $this->db->insert('payment_table',$data);
             echo "string";
             
        }

    }
}