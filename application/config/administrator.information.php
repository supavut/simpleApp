<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$CI = & get_instance();
$CI->load->helper('url');
//$CI->load->library('authenticationservice');
// $CI->load->model('Configuration_model','configuration');

$config['adminstrator.title'] = "SimpleApp";

$config['adminstrator.logo-mini'] = "<b>A</b>PP";

//$config['adminstrator.logo-lg'] = "<b>I Can</b> Sing";
$config['adminstrator.logo-lg'] = "SimpleApp";

$config['adminstrator.menu'] = array(

    // array(
    //     'has_header' => true,
    //     'header_content' =>'',
    //     'menus' =>  array(
    //                     array( 'content' => 'DashBoard',
    //                         'class' => 'fa fa-home',
    //                         'href' =>  site_url('administrator/dashboard'),
    //                         'roles' => array(),
    //                         'has_sub' => false,
    //                         'sub_menus' => array()
    //                     )
    //                 )
    // ),
    array(
        'has_header' => true,
        'header_content' =>'Home',
        'menus' =>  array(
                        array( 'content' => 'List',
                            'class' => 'fa fa-newspaper-o',
                            'href' =>  site_url('welcome/index'),
                            'roles' => array(),
                            'has_sub' => false,
                            'sub_menus' => array()
                        )
                    )
    ),
    
);
