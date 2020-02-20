<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
   
 class reset_pass extends CI_Controller {  

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_reset');
  }
   
   
     public function index()  
     {           
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');            
         if($this->form_validation->run() == FALSE) {  
             $data['title'] = 'Halaman Reset Password ';  
             $this->load->view('login/v_lupa_password',$data);  
         }else{  
             $email = $this->input->post('email');   
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->m_reset->getUserInfoByEmail($clean);  
               
             if(!$userInfo){  
               $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');  
               redirect(site_url('login'),'refresh');   
             }        
             $token = $this->m_reset->insertToken($userInfo->id);              
             $qstring = $this->base64url_encode($token);           
             $url = site_url() . 'reset_pass/reset_password/token/' . $qstring;  
             $link = '<a href="' . $url . '">' . $url . '</a>';   
  
             $message = '';                    
               
                $message .= ' ' . $link;            
 
                echo $message; //send this through mail
 
                  $config = Array(  
                    'protocol' => 'smtp',  
                    'smtp_host' => 'ssl://smtp.googlemail.com',  
                    'smtp_port' => 465,  
                    'smtp_user' => 'anitasari.as250@gmail.com',   //email
                    'smtp_pass' => 'anita@july',   //pasword email
                    'mailtype' => 'html',  
                    'charset' => 'utf-8'  
                    );  
                    $this->load->library('email', $config);  
                    $this->email->set_newline("\r\n");  
                    $this->email->from($config['smtp_user']);  
                    $this->email->to($email);  
                    $this->email->cc('');   //sesuaikan
                    $this->email->subject('reset password');  
                    $this->email->message('untuk melanjutkan reset klik link ini   .'.$message);  
                    if (!$this->email->send()) {  
                    echo 'what this is';  
                    }else{  
                    echo 'Success to send email';
                     return             
                     redirect(site_url().'login'); //redirect();
                    }
                exit;               
            }         
     }  
   
     public function reset_password(){
       $token = $this->base64url_decode($this->uri->segment(4));           
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->m_reset->isTokenValid($cleanToken); //either false or array();          
         
       if(!$user_info){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect(site_url('login'),'refresh');   
       }    
   
       $data = array(  
         'title'=> 'Halaman Reset Password ',  
         'nama'=> $user_info->nama,   
         'email'=>$user_info->email,   
         'token'=>$this->base64url_encode($token)  
       );  
         
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
       $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) {    
         $this->load->view('login/v_reset_password', $data);  
       }else{  
                           
         $post = $this->input->post(NULL, TRUE);          
         $cleanPost = $this->security->xss_clean($post);          
         $hashed = md5($cleanPost['password']);          
         $cleanPost['password'] = $hashed;  
         $cleanPost['id'] = $user_info->id;  
         unset($cleanPost['passconf']);          
         if(!$this->m_reset->updatePassword($cleanPost)){  
           $this->session->set_flashdata('sukses', 'Update password gagal.');  
         }else{  
           $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');  
         }  
         redirect(site_url('login'),'refresh');         
       }
     }  
       
   public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    
 }  