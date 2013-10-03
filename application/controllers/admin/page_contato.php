<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Page_contato extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

			}
			
			$this->load->model('admin/contato_model');
			$this->load->helper('text'); 
		
		}


		
		public function listContato(){
			 $dados['listContato'] = $this->contato_model->listContato();
			 $this->template->load('admin/index','admin/templates/page_contato_tpl',$dados);	

		}

		public function addContato(){

			
			$this->template->load('admin/index','admin/templates/page_contato_add_tpl');	

		}


		public function insertContato(){

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
				 				
				 
				   $erroEmail = '<div class="alert alert-error">
				 		   			<button type="button" class="close" data-dismiss="alert">×</button>
				 					  E-mail inválido!
				 					</div>';
				 

				$this->form_validation->set_rules('title', 'Título:', 'required');
				$this->form_validation->set_rules('content', 'Conteúdo:', 'required');
				$this->form_validation->set_rules('map', 'Mapa:', 'required');
				$this->form_validation->set_rules('email', 'E-mail da empresa:', 'required|valid_email');
				
				
			
				$this->form_validation->set_message('required', $campoEmBranco);
				$this->form_validation->set_message('valid_email', $erroEmail);
				
		
			
			if ($this->form_validation->run() == FALSE){
				
				$this->addContato();
		
			}else{
			
				$dadosInput 	= array(
					'titulo' 	=> trim($this->input->post('title')),
					'conteudo'  => 	$this->input->get_post('content'),
					'mapa' 	    =>  $this->input->get_post('map'),
					'email'     => trim($this->input->get_post('email'))
				
					);

				if(!$this->contato_model->addContato($dadosInput)){
					throw new Exception("Erro ao cadastrar dados!");
					
				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_contato/listContato/");
		
			}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/page_contato/listContato/");
		
				
			}
		
		}


		public function editContato($id = null){
			$dados['listContato'] = $this->contato_model->listContato($id);
			
			$this->template->load('admin/index','admin/templates/page_contato_edit_tpl',$dados);	
		}

		public function updateContato($id = null){
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
				 				
				 
				   $erroEmail = '<div class="alert alert-error">
				 		   			<button type="button" class="close" data-dismiss="alert">×</button>
				 					  E-mail inválido!
				 					</div>';
				 

				$this->form_validation->set_rules('title', 'Título:', 'required');
				$this->form_validation->set_rules('content', 'Conteúdo:', 'required');
				$this->form_validation->set_rules('map', 'Mapa:', 'required');
				$this->form_validation->set_rules('email', 'E-mail da empresa:', 'required|valid_email');
				
				
			
				$this->form_validation->set_message('required', $campoEmBranco);
				$this->form_validation->set_message('valid_email', $erroEmail);				
		
			
			if ($this->form_validation->run() == FALSE){
				
				$this->editContato($id);
		
			}else{
			
				$dadosInput 	= array(
					'titulo' 	=> trim($this->input->post('title')),
					'conteudo'  => 	$this->input->get_post('content'),
					'mapa' 	    =>  $this->input->get_post('map'),
					'email'     => trim($this->input->get_post('email'))
				
					);

				if(!$this->contato_model->editContato($id,$dadosInput)){
					throw new Exception("Erro ao alterar dados!");
					
				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Alterado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_contato/listContato/");
		
			}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/page_contato/editContato/".$id);
		
				
			}
			
		}


		public function deleteContato($id = null){

			try{
				if(!$this->contato_model->deleteContato($id)){

					throw new Exception("Erro ao deletar dados!");
					

				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_contato/listContato/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				 redirect("admin/page_contato/listContato/");


			}



	}





	
	}
	
	/* End of file contato.php */
	/* Location: ./application/controllers/admin/contato.php */



 ?>