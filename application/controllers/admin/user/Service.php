<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
		$session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ){
         redirect('logout');
        }
    $user_type = $this->session->userdata('user_type'); 
        if($user_type!=3){
         redirect('logout');
        }
	}

    #------------------------------------------------
    #       view create new post form
    #------------------------------------------------
    public function index(){
        $data['title'] = 'Service';
    	$this->load->view('admin/user/_header',$data);
    	$this->load->view('admin/user/_left_sideber');
    	$this->load->view('admin/user/add_product');
    	$this->load->view('admin/user/_footer');
    }


    public function save_service(){

        $price = $this->input->post('price',TRUE);
        $tax = $this->input->post('tax',TRUE);
        @$vat = ($price*$tax)/100;

        $data = array(
            'service_name' => $this->input->post('service_name',TRUE),
            'service_price' => $this->input->post('price',TRUE),
            'tax' => $vat,
            'description' => $this->input->post('description',TRUE),
            'model' => $this->input->post('model',TRUE)
        );

        $this->db->insert('service_info',$data);

        $get = $this->db->select('*')->from('service_info')->get()->result();

        foreach ($get as $row) {
                $json_product[] = array('label'=>$row->service_name."(".$row->model.")",'value'=>$row->id);
        }
        $cache_file = './assets/my-assets/json/product.json';
        $productList = json_encode($json_product);
        file_put_contents($cache_file,$productList);
        
        $this->session->set_flashdata('message',"<div class='alert alert-success msg'>Service Add Successfully</div>");
        redirect('admin/user/Service');
    }


    public function service_list(){

        $data['service'] = $this->db->select('*')->from('service_info')->get()->result();
        $data['title'] = 'Service List';
      
        $this->load->view('admin/user/_header',$data);
        $this->load->view('admin/user/_left_sideber');
        $this->load->view('admin/user/service_list');
        $this->load->view('admin/user/_footer');
    }


    public function delete_service($id=NULL){

        $this->db->where('id',$id)->delete('service_info');

        $get = $this->db->select('*')->from('service_info')->get()->result();
         foreach ($get as $row) {
                $json_product[] = array('label'=>$row->service_name."(".$row->model.")",'value'=>$row->id);
        }
        $cache_file = './assets/my-assets/json/product.json';
        $productList = json_encode($json_product);
        file_put_contents($cache_file,$productList);
        redirect('admin/user/Service/service_list');
    }


    public function retrieve_service(){

        $id = $this->input->post('product_id');
        $data = $this->db->select('*')->from('service_info')->where('id',$id)->get()->row();
        echo json_encode($data);
    }

}