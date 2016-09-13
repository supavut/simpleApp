<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commonservice {

    private $CI = null;
    private $SMTP_USER = "";
    private $SMIP_PASSWORD = "";

    public function __construct() {
        $this->CI =& get_instance(); //Loads the codeigniter base instance (The object your controller is extended from. & for php4 compatibility
        $this->CI->load->library('email');
        $this->CI->load->model("Provinces_model", "province");
        $this->CI->load->model("Amphures_model", "district");
        $this->CI->load->model("Districts_model", "sub_district");
    }

    public function send_email($email_to, $subject, $body){
        $data["body"] = $body;
        $body = $this->CI->load->view('template/email.php', $data, TRUE);

        $config = Array(
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.gmail.com",
            'smtp_port' => "465",
            'smtp_user' => $this->SMTP_USER,
            'smtp_pass' => $this->SMIP_PASSWORD,
            'mailtype'  => "html",
            'charset'   => "utf-8",
            'newline'   => "\r\n",
            'crlf'      => "\r\n"
        );
        $this->CI->email->initialize($config);

        $this->CI->email->from($this->SMTP_USER, $subject);
        $this->CI->email->to($email_to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($body);

        //Send mail
        if (!$this->CI->email->send()){
          echo $this->CI->email->print_debugger();
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //   $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function generate_fulladdress($obj){
        $response = "";
        if($obj->address){
            $response .= $obj->address;
        }
        if($obj->sub_district){
            if($obj->province == "1")
                $response .= " แขวง".$this->CI->sub_district->get_name_by_code($obj->sub_district);
            else
                $response .= " ตำบล".$this->CI->sub_district->get_name_by_code($obj->sub_district);
        }
        if($obj->district){
            if($obj->province == "1")
                $response .= " ".$this->CI->district->get_name_by_id($obj->district);
            else
                $response .= " อำเภอ".$this->CI->district->get_name_by_id($obj->district);
        }
        if($obj->province){
            $response .= " จังหวัด".$this->CI->province->get_name_by_id($obj->province);
        }
        if($obj->zipcode){
            $response .= " ".$obj->zipcode;
        }

        return $response;
    }

}

?>
