<?php
defined('BASEPATH') or exit('No...');

if(!function_exists('send_email')) {
    function send_email($nama, $dari, $kepada, $subyek, $pesan) {
        $CI =& get_instance();

        // $CI->load->library('email');
 
        // $config = Array(  
        // 'protocol' => 'smtp',  
        // 'smtp_host' => 'ssl://smtp.googlemail.com',  
        // 'smtp_port' => 465,  
        // 'smtp_user' => 'forselemel4@gmail.com',   
        // 'smtp_pass' => 'f$_b3nD0t',   
        // 'mailtype' => 'html',   
        // 'charset' => 'iso-8859-1'  
        // );  
        
        // $CI->email->initialize($config);
        // $CI->email->set_newline("\r\n");
        // $CI->email->from($dari, $nama);
        // $CI->email->to($kepada);
        // $CI->email->subject($subyek);
        // $CI->email->message($pesan);

        // if($CI->email->send()) {
        //     echo $CI->email->print_debugger();
        // } else {
        //     echo $CI->email->print_debugger();
        // }

        $config = Array(  
            'protocol' => 'smtp',  
            'smtp_host' => 'ssl://smtp.googlemail.com',  
            'smtp_port' => 465,  
            'smtp_user' => 'forselemel4@gmail.com',   
            'smtp_pass' => 'f$_b3nD0t',   
            'mailtype' => 'html',   
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );  

        $CI->load->library('email', $config);  
        $CI->email->set_newline("\r\n");  
        $CI->email->from($dari, $nama);   
        $CI->email->to($kepada);   
        $CI->email->subject($subyek);   
        $CI->email->message($pesan);  
        if (!$CI->email->send()) {
            return false;  
            // show_error($CI->email->print_debugger());   
        } else{  
            return true;   
        }
    }
}