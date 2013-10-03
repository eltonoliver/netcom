<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public $pattnerPass = "n3tc0nm4n4us";

	public function __construct(){
	   parent::__construct();
	   $this->load->model('admin/login_model');
	}
	 

	public function index(){
		$this->load->view('admin/templates/login_tpl');
		
	}
	public function validaLogin($dados = null){
	
		try{
			$this->form_validation->set_rules( 'inputLogin', 'Login:', 'required' );
			$this->form_validation->set_rules( 'inputSenha', 'Senha:', 'required' );

			$campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo está em branco!
									</div>';

			$this->form_validation->set_message('required', $campoEmBranco);					
			if ( $this->form_validation->run() == FALSE ) {

				$this->index();

			}else {

				
				$login 	= $this->input->post('inputLogin');
				$senha	= $this->input->post('inputSenha');

				$dados = array('login' => $login , 'senha' => crypt($this->pattnerPass,$senha));
				
				
						
				$verificaDados = $this->login_model->validLogin($dados);



						if(!$verificaDados){
							
							throw new Exception('<div class="alert alert-error">
							   			<button type="button" class="close" data-dismiss="alert">×</button>
										 <strong>Dados Inválidos!</strong>
										</div>');					
						}else{
                           
                          
                           foreach ($verificaDados as $value) {								
								
								$id				= $value->id;
								$nome 			= $value->nome;
								$login 			= $value->login;								
							

							}
								 $sessaoUser = array(
								 			   'id'	   			=> $id,
							                   'nome'  			=> $nome,
							                   'login'			=> $login,
								               'logged_in' 		=> TRUE
								             		
								               );

								 $this->session->set_userdata($sessaoUser);
								 redirect('admin/home/homeAdmin');

						}		
							
			
				
               }/*fecha else*/
		}catch( Exception $e ) {
			$this->session->set_flashdata( 'msg', $e->getMessage() );
			redirect('admin/login/');		


		}

	}


	public function logout(){

		$this->session->sess_destroy();
		redirect('admin/login/');
	}


}


/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */

 ?>