<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(-1);
ini_set('display_errors', 'On');
class Welcome extends My_GenericController {

    public function __construct()
    {
        parent::__construct();
        $this->template_name = 'administrator/_template/_layout';
        $this->config->load('administrator.information');
        $this->load->library('form_validation');
        $this->load->model("Information_model", "info");
        $this->load->helper('file');
    }



    public function index_get(){
        $data['infos'] = $this->info->get();
        $this->load_view('application/list', $data);
    }
    
    public function add_post(){
        

        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('tel', 'Tel', 'trim|required|min_length[10]|max_length[10]|is_natural');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[10]');

        if ($this->form_validation->run() == TRUE)
        {
            $nInfo = new Information_model();
            $nInfo->firstname = $this->input->post("firstname");
            $nInfo->lastname = $this->input->post("lastname");
            $nInfo->address = $this->input->post("address");
            $nInfo->tel = $this->input->post("tel");
            $nInfo->email = $this->input->post("email");
            $nInfo->gender = $this->input->post("gender");
            $nInfo->save();
            
            //write json file 
            write_file("./infos/$nInfo->firstname"."_"."$nInfo->lastname"."_".time().".json", json_encode($nInfo));
    
        }
        redirect("welcome/index");
        
    }


}
