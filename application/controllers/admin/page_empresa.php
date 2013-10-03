<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Page_empresa extends CI_Controller {
	
		public function __construct()
			{
				parent::__construct();
				if(!$this->session->userdata('logged_in')){

				redirect('admin/login/');

				}
				
				$this->load->model('admin/empresa_model');
				$this->load->helper('text'); 
			
			}

					
			public function listEmpresa(){
				 $dados['listEmpresa'] = $this->empresa_model->listEmpresa();
				$this->template->load('admin/index','admin/templates/page_empresa_tpl',$dados);	

			}

			public function addEmpresa(){

				
				$this->template->load('admin/index','admin/templates/page_empresa_add_tpl');	

			}

			public function insertEmpresa($dados = null){
				

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
						 				
						

						$this->form_validation->set_rules('title', 'Título:', 'required');
						$this->form_validation->set_rules('content', 'Conteúdo:', 'required');
						
						
					
						$this->form_validation->set_message('required', $campoEmBranco);
						
				
					
					if ($this->form_validation->run() == FALSE){
						
						$this->listEmpresa();
				
					}else{
					
						$dadosInput = array(
							'titulo' => trim($this->input->post('title')),
							'texto' => trim($this->input->get_post('content')),
							'user_id' => $this->session->userdata('id')
							);

						if(!$this->empresa_model->addEmpresa($dadosInput)){
							throw new Exception("Erro ao cadastrar dados!");
							
						}


						  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
									 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
						  $this->session->set_flashdata('msg', $sucesso);
						  redirect("admin/page_empresa/listEmpresa/");
				
					}
			}catch(Exception $e){

						  $erro = '<div class="alert alert-error">
								   			<button type="button" class="close" data-dismiss="alert">×</button>
											  '.$e->getMessage().'
											</div>';
						
						$this->session->set_flashdata('erro', $erro);
						redirect("admin/page_empresa/listEmpresa/");
		
				
			}
		
			}



		public function editEmpresa($id = null){
			$dados['listEmpresa'] = $this->empresa_model->listEmpresa($id);
			
			$this->template->load('admin/index','admin/templates/page_empresa_edit_tpl',$dados);	
		}

		public function updateEmpresa($id = null){
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
					 				
					

					$this->form_validation->set_rules('title', 'Título:', 'required');
					$this->form_validation->set_rules('content', 'Conteúdo:', 'required');
					
					
				
					$this->form_validation->set_message('required', $campoEmBranco);
						
				
					
					if ($this->form_validation->run() == FALSE){
						
						$this->editEmpresa($id);
				
					}else{
					
						$dadosInput = array(
							'titulo' 	=> 	$this->input->post('title'),
							'texto' 	=> 	$this->input->post('content'),
							'user_id' 	=> 	$this->session->userdata('id')
							);

						if(!$this->empresa_model->editEmpresa($id,$dadosInput)){
							throw new Exception("Erro ao alterar dados!");
							
						}


						  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
									 			<div class="alert alert-success"> Alterado com sucesso! </div>';
						  $this->session->set_flashdata('msg', $sucesso);
						  redirect("admin/page_empresa/editEmpresa/".$id);
				
					}
			}catch(Exception $e){

						  $erro = '<div class="alert alert-error">
								   			<button type="button" class="close" data-dismiss="alert">×</button>
											  '.$e->getMessage().'
											</div>';
						
						$this->session->set_flashdata('erro', $erro);
						redirect("admin/page_empresa/editEmpresa/".$id);
		
				
			}
		
		}


		public function deleteEmpresa($id = null){

			try{
				if(!$this->empresa_model->deleteEmpresa($id)){

					throw new Exception("Erro ao deletar dados!");
					

				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_empresa/listEmpresa/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/page_empresa/listEmpresa/");


			}



	}
		
	}
	
	/* End of file page_empresa.php */
	/* Location: ./application/controllers/admin/page_empresa.php */



?>