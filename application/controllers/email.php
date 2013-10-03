<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('email_model');
		$this->load->library('email');

		
		
	}

	public function enviarEmail(){
		   $email = $this->email_model->listEmail();		
		
		   $this->form_validation->set_rules('author','Nome:','required');
		   $this->form_validation->set_rules('email', 'E-mail', 'trim|required');		   
		   $this->form_validation->set_rules('comment', 'Mensagem:', 'required');       
	       $this->form_validation->set_rules('subject','Assunto:','required');
	     
	       
	       $this->form_validation->set_message('required', 'Campo %s em Branco, por favor verifique!');
	  
	   if ($this->form_validation->run() == FALSE){	

					$this->session->set_flashdata('resposta', 'Erro ao enviar!');
		            redirect('home/contato');
				}else{
								
					
					$nome = $this->input->post('author');
					$email = $this->input->post('email');
					$assunto = $this->input->post('subject');
					$mensagem  = $this->input->post('comment');
					
					$this->email->from($email[0]->email, 'Contato Netcomam:');
					 
								
					$this->email->subject($web);
					$this->email->message($nome." - ".$email." \n\n ".$mensagem);	
					
					$this->email->send();
					$this->session->set_flashdata('resposta', 'E-mail enviado com sucesso, entraremos em contato em breve!');
					echo '<script> alert("Erro ao enviar e-mail!")</script>';
					redirect('home/contato/');
					
		           }
		    	
		          
	}	



	public function enviarEmailOptional(){
		$email = $this->email_model->listEmail();		
		$this->email->from($email[0]->email);
		//$this->email->to('someone@example.com');
		//$this->email->cc('another@example.com');
		//$this->email->bcc('and@another.com');

		$nome = $this->input->post('author');
		$email = $this->input->post('email');		
		$mensagem  = $this->input->post('comment');
		
		$corpoMsg = "Nome : ".$nome."  <br />".
					"E- mail: ".$email."<br />".
					"Mensagem: ".$mensagem."<br />";

		$this->email->subject($assunto);
		$this->email->message($corpoMsg);
		
		if($this->email->send()){
			echo '<script> alert("E-mail enviado com sucesso!")</script>';
			redirect('home/contato/');
		}else{

			echo '<script> alert("Erro ao enviar e-mail!")</script>';
			redirect('home/');
		}	
		
	}

}

/* End of file email.php */
/* Location: ./application/controllers/email.php */

 ?>