<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captchaservice {
    
    
    private $captcha_size = 4;
    
    private $include_char = false;
    
    private $captcha_table_name = "captcha";

    public function __construct(){
        

        $this->CI =& get_instance(); //Loads the codeigniter base instance (The object your controller is extended from. & for php4 compatibility
        $this->CI->load->database();
        
        $this->CI->load->helper('captcha');
        $this->CI->load->helper('utils');
    }
    
    public function set_random($size = 7,$include_char = false){
        $this->captcha_size = $size;
        $this->include_char = $include_char;
    }
    
    public function check_captcha($captcha,$ip_address){
        $expiration = time() - 3600;
        $this->CI->db->select('COUNT(*) AS count');
        $this->CI->db->from($this->captcha_table_name);
        $this->CI->db->where('word',$captcha);
        $this->CI->db->where('ip_address', $ip_address);
        $this->CI->db->where('captcha_time >',$expiration);
        
        $row_count = $this->CI->db->count_all_results();
        
        return $row_count!=0;
    }
    
    
    public function generate_captcha(){
        
        $random_text = generateRandomString($this->captcha_size,$this->include_char);
        
        // setting up captcha config
        $vals = array(
            'word' => $random_text,
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'img_width' => 140,
            'img_height' => 45,
            'expiration' => 3600
        );
        $cap = create_captcha($vals);
        $cap_data = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->CI->input->ip_address(),
            'word'          => $cap['word']
        );
        
        $query = $this->CI->db->insert($this->captcha_table_name, $cap_data);
        
        return $cap;
    }
    
    
    public function clear_old_captcha(){
        $expiration = time() - 3600;
        $this->CI->db->where('captcha_time < ', $expiration)->delete($this->captcha_table_name);
    }

    
}