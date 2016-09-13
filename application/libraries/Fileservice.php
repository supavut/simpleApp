<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileservice {

    private $CI = null;

    public function __construct() {
        $this->CI =& get_instance(); //Loads the codeigniter base instance (The object your controller is extended from. & for php4 compatibility
        $this->CI->load->library('image_lib');
    }

    public function upload_file($dir, $width, $height, $name = 'file'){
        $config = array (
            'upload_path' => './uploads/'.$dir.'/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'encrypt_name' => true,
        );
        $this->CI->load->library('upload', $config);

        if (!$this->CI->upload->do_upload($name)) {
            return $this->CI->upload->display_errors();
        }else{
            $image_data =   $this->CI->upload->data();
            if($width && $height){
                $this->resize_file($image_data['full_path'], $width, $height);
            }

            return $image_data;
        }
    }

    public function resize_file($full_path, $width, $height){
        if($full_path && $width && $height){
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $full_path,
              'maintain_ratio'  =>  TRUE,
              'width'           =>  $width,
              'height'          =>  $height,
            );
            $this->CI->image_lib->clear();
            $this->CI->image_lib->initialize($configer);
            $this->CI->image_lib->resize();
        }
    }

}

?>
