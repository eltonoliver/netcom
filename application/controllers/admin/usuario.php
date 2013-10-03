<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* @method Usuario - Controller criado para gerenciar os usuarios
* @author Elton Oliveira - eltonknoxville@hotmail.com - www/rainbows.com.br
*
*
*/

class Usuario extends CI_Controller {
	/*padrão da senha*/
	public $pattnerPass = "n3tc0nm4n4us";

	public function __construct(){

	   parent::__construct();
	   if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

		}
	   $this->load->model('admin/usuario_model');
	}
	
	public function listUser($id = null){
		$dados['listUser'] = $this->usuario_model->getUser();
		$this->template->load('admin/index','admin/templates/usuario_tpl',$dados);	
	}

	public function addUser($value = null){
		$this->template->load('admin/index','admin/templates/usuario_add_tpl');	
	}

	public function insert(){

			try{


				  $campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo está em branco!
									</div>';

				 
			   	  $dadosExiste = '<div class="alert alert-block">
				 					  <button type="button" class="close" data-dismiss="alert">×</button>
				 					  <strong>%s</strong>
				 					   já existe!
				 					</div>';
				 				
				

				$this->form_validation->set_rules('nameUser', 'Nome:', 'required');
				$this->form_validation->set_rules('loginUser', 'Login:', 'required|is_unique[user.login]');
				$this->form_validation->set_rules('passUser', 'Senha:', 'required');
				
				$this->form_validation->set_message('is_unique', $dadosExiste);
				$this->form_validation->set_message('required', $campoEmBranco);
				
		
			
			if ($this->form_validation->run() == FALSE){
				
				$this->addUser();
		
			}else{
			
				$dadosInput = array(
					'nome' => trim($this->input->post('nameUser')),
					'login' => trim($this->input->get_post('loginUser')),
					'senha' => crypt($this->pattnerPass,$this->input->post('passUser'))
					);

				if(!$this->usuario_model->addUser($dadosInput)){
					throw new Exception("Erro ao cadastrar dados!");
					
				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/usuario/addUser/");
		
			}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/usuario/addUser/");
		
				
			}
		


	}


	public function editUser($id = null){
		$dados['usuario'] = $this->usuario_model->getUser($id);
		$this->template->load('admin/index','admin/templates/usuario_edit_tpl',$dados);	
	}

	public function update($id = null){

		try{


				  $campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo está em branco!
									</div>';

				 
			   	  $dadosExiste = '<div class="alert alert-block">
				 					  <button type="button" class="close" data-dismiss="alert">×</button>
				 					  <strong>%s</strong>
				 					   já existe!
				 					</div>';
				 				
				

				$this->form_validation->set_rules('nameUser', 'Nome:', 'required');
				
				
				$this->form_validation->set_message('required', $campoEmBranco);
				
		
			
			if ($this->form_validation->run() == FALSE){
				
				$this->editUser();
		
			}else{
			 $senha = $this->input->post('passUser');	
			 if(isset($senha) && !empty($senha)){
				$dadosInput = array(
					'nome' => trim($this->input->post('nameUser')),
					'login' => trim($this->input->get_post('loginUser')),
					'senha' => crypt($this->pattnerPass,$senha)
					);
				}else{

					$dadosInput = array(
					'nome' => trim($this->input->post('nameUser')),
					'login' => trim($this->input->get_post('loginUser'))
					);


				}

				if(!$this->usuario_model->editUser($id,$dadosInput)){
					throw new Exception("Erro ao alterar dados!");
					
				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Alterado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/usuario/editUser/".$id);
		
			}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/usuario/editUser/".$id);
		
				
			}
	}


	public function deleteUser($id = null){

			try{
				if(!$this->usuario_model->deleteUser($id)){

					throw new Exception("Erro ao deletar dados!");
					

				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/usuario/listUser/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/usuario/listUser/");


			}



	}



}

/* End of file usuario.php */
/* Location: ./application/controllers/admin/usuario.php */

 ?>