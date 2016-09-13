<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
abstract  class My_GenericController extends REST_Controller {

	protected $template_name;

	protected $roles = array();

	protected $redirect_url = '';

	protected $login_url = 'authentication';

	protected $title = "Admin Template";

	protected $keyword = "";


	public function __construct()
	{
		parent::__construct();

	    $this->load->database();
		$this->load->library('template');

		$this->load->helper('url');
		$this->load->helper('utils');

		$this->load->library('fileservice');
		$this->load->library('pagination');
		$this->config->load('pagination');
 		date_default_timezone_set("Asia/Bangkok");

	}

	protected function print_log($data){
		echo "<pre>".print_r($data)."</pre>";
	}

	protected function load_view($view,$data = array()){
	    $data['title'] = $this->title;
	    $data['keyword'] = $this->keyword;
	    if($this->template_name === ''){
	        $this->load->view($view,$data);
	    }else{
	        $this->template->load($this->template_name, $view,$data);
	    }
	}

	protected function response_json($data){
		$this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data));
	}

}
