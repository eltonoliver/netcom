<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servico extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

			}
			$this->load->library('uploadinit');		
			
			$this->load->model('admin/servico_model');
		
		}
		


		public function listServiceCategory(){
			$dados['listCategory'] = $this->servico_model->listCategory();
			$this->template->load('admin/index','admin/templates/servico_categoria_tpl',$dados);	
		}

		public function addServiceCategory(){

			$this->template->load('admin/index','admin/templates/servico_categoria_add_tpl');	

		}

		public function insertServiceCategory($dados = null){
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
					
					$this->form_validation->set_rules('nameCategory', 'Nome da categoria:', 'required|is_unique[category.nome]');
					
					$this->form_validation->set_message('is_unique', $dadosExiste);
					$this->form_validation->set_message('required', $campoEmBranco);
			
		
			
					if ($this->form_validation->run() == FALSE){
						
						$this->addServiceCategory();
				
					}else{
						
						$dados = array('nome' => $this->input->post('nameCategory'));

						if(!$this->servico_model->addCategory($dados)){

							throw new Exception("Erro ao cadastrar dados!");
							
						}

					  	$sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
								 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
								
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/servico/addServiceCategory");
				
					}
			}catch(Exception $e){

					  $erro = '<div class="alert alert-error">
					   			<button type="button" class="close" data-dismiss="alert">×</button>
								  '.$e->getMessage().'
								</div>';
					
					$this->session->set_flashdata('erro', $erro);
					redirect("admin/servico/addServiceCategory");
			
				
			}
			
		}


		public function editServiceCategory($id = null){
			$dados['listCategory'] = $this->servico_model->listCategory($id);
			$this->template->load('admin/index','admin/templates/servico_categoria_edit_tpl',$dados);	
		}

		public function updateServiceCategory($id = null){

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
					
					$this->form_validation->set_rules('nameCategory', 'Nome da categoria:', 'required|is_unique[category.nome]');
					
					$this->form_validation->set_message('is_unique', $dadosExiste);
					$this->form_validation->set_message('required', $campoEmBranco);
			
		
			
					if ($this->form_validation->run() == FALSE){
						
						$this->editServiceCategory();
				
					}else{
						
						$dados = array('nome' => $this->input->post('nameCategory'));

						if(!$this->servico_model->editCategory($id,$dados)){

							throw new Exception("Erro ao alterar dados!");
							
						}

					  	$sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
								 			<div class="alert alert-success"> Alterado com sucesso! </div>';
								
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/servico/editServiceCategory/".$id);
				
					}
			}catch(Exception $e){

					  $erro = '<div class="alert alert-error">
					   			<button type="button" class="close" data-dismiss="alert">×</button>
								  '.$e->getMessage().'
								</div>';
					
					$this->session->set_flashdata('erro', $erro);
					redirect("admin/servico/editServiceCategory/".$id);
			
				
			}
			
		}



		public function deleteServiceCategory($id = null){
			try{
				

				  if(!$this->servico_model->deleteCategory($id)){

				  	throw new Exception("Erro ao deletar dados");
				  	
				  }	

				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/servico/listServiceCategory/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/servico/listServiceCategory/");


			}
		}


		public function listService(){
			$dados['listService'] = $this->servico_model->listService();
			$this->template->load('admin/index','admin/templates/servico_tpl',$dados);	
		}


		public function addService(){
			
			$dados['listServiceCategory']    = $this->servico_model->listCategory();
			$this->template->load('admin/index','admin/templates/servico_add_tpl',$dados);	

		}


		public function insertService(){
			
			try{


				$this->form_validation->set_rules('nameProduct', 'Nome:', 'trim|required');
				$this->form_validation->set_rules('titleProduct', 'Título:', 'trim|required');
				$this->form_validation->set_rules('description', 'Descrição:', 'required');
				$this->form_validation->set_rules('userfile', 'Imagem:', 'callback_validate');
				$this->form_validation->set_rules('nameCategory', 'Categoria:', 'required');

				$campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo obrigatório!
									</div>';
				
				$this->form_validation->set_message('required', $campoEmBranco);
				
			
				
				if ($this->form_validation->run() == FALSE){
					
					$this->addService();
			
				}else{ 
						
						if(!empty($_FILES['userfile']['name'])){

						
							/*inicializa upload*/
							$this->uploadinit->uploadInit('assets/images_dinamic/service/','jpg|png|JPEG','700','600');	
							if ( ! $this->upload->do_upload()){
					
										throw new Exception("Erro no envio da imagem , verifique o tamanho de sua imagem! largura máxima : 700 - altura máxima : 600");
			
							}

							$nomeImagem = $this->upload->data();
							$this->uploadinit->cropInit( 'assets/images_dinamic/service/', $nomeImagem['file_name'],  '400', '300', TRUE );
							$dados = array(

								'nome'					=> $this->input->post('nameProduct'), 
								'titulo' 				=> $this->input->post('titleProduct'),
								'descricao'				=> $this->input->post('description'),
								'imagem'		 		=> $nomeImagem['file_name'],		
								'user_id'				=> $this->session->userdata('logged_in'),
								'serviceCategory_id'	=> $this->input->post('nameCategory')

								);
							if(!$this->servico_model->addService($dados)){

								throw new Exception("Erro ao cadastrar dados!");
							}
							
							 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
										 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
																
							$this->session->set_flashdata('msg', $sucesso);
							redirect("admin/servico/addService/");
						}	
						
			
				}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
				   			<button type="button" class="close" data-dismiss="alert">×</button>
							  '.$e->getMessage().'
							</div>';				
					$this->session->set_flashdata('msg', $erro);
					redirect("admin/servico/addService/");		
					
				}			

		}


		/*validação personalizada para imagem*/
		public function validate(){

				if(($_FILES['userfile']['name']) === "" && empty($_FILES['userfile']['name'])){

					$campoEmBranco = '<div class="alert alert-block">
										  <button type="button" class="close" data-dismiss="alert">×</button>
										  <strong>%s</strong>
										   Campo obrigatório!
										</div>';
					
					$this->form_validation->set_message('validate', $campoEmBranco);
					return false;

				}



		}


		public function editService($id = null){
			
			$dados['listService'] 		= $this->servico_model->listService($id);
			$dados['listCategory'] 		= $this->servico_model->listCategory(); 
			$this->template->load('admin/index','admin/templates/servico_edit_tpl',$dados);	



		}

		public function updateService($id = null){
			
			try{


				$this->form_validation->set_rules('nameProduct', 'Nome:', 'trim|required');
				$this->form_validation->set_rules('titleProduct', 'Título:', 'trim|required');
				$this->form_validation->set_rules('description', 'Descrição:', 'required');
			
				$this->form_validation->set_rules('nameCategory', 'Categoria:', 'required');

				$campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo obrigatório!
									</div>';
				
				$this->form_validation->set_message('required', $campoEmBranco);
				
			
				
				if ($this->form_validation->run() == FALSE){
					
					$this->editService($id);
			
				}else{ 
						
						if(!empty($_FILES['userfile']['name'])){

						
							/*inicializa upload*/
							$this->uploadinit->uploadInit('assets/images_dinamic/service/','jpg|png|JPEG','700','600');	
							if ( ! $this->upload->do_upload()){
					
										throw new Exception("Erro no envio da imagem , verifique o tamanho de sua imagem! largura máxima : 700 - altura máxima : 600");
			
							}

							$imagemAntiga = $this->servico_model->lisNameImageService($id);

				
							
							if(isset($imagemAntiga)){

								$thumb = explode('.', $imagemAntiga[0]->imagem);
								$thumb = $thumb[0]."_thumb.".$thumb[1];
								unlink('assets/images_dinamic/service/'.$imagemAntiga[0]->imagem);
								unlink('assets/images_dinamic/service/'.$thumb);
							}

							$nomeImagem = $this->upload->data();
							$this->uploadinit->cropInit( 'assets/images_dinamic/service/', $nomeImagem['file_name'],  '400', '300', TRUE );
							$dados = array(

								'nome'					=> $this->input->post('nameProduct'), 
								'titulo' 				=> $this->input->post('titleProduct'),
								'descricao'				=> $this->input->post('description'),
								'imagem'		 		=> $nomeImagem['file_name'],		
								'user_id'				=> $this->session->userdata('logged_in'),
								'serviceCategory_id'			=> $this->input->post('nameCategory')

								);
							if(!$this->servico_model->editService($id,$dados)){

								throw new Exception("Erro ao cadastrar dados!");
							}
							
							 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
										 			<div class="alert alert-success"> Alterado com sucesso! </div>';
																
							$this->session->set_flashdata('msg', $sucesso);
							redirect("admin/servico/editService/".$id);
						}	


					$dados = array(

							'nome'							=> $this->input->post('nameProduct'), 
							'titulo' 						=> $this->input->post('titleProduct'),
							'descricao'						=> $this->input->post('description'),
							'user_id'						=> $this->session->userdata('logged_in'),
							'serviceCategory_id'			=> $this->input->post('nameCategory')

							);
						if(!$this->servico_model->editService($id,$dados)){

							throw new Exception("Erro ao cadastrar dados!");
						}
						
						 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
									 			<div class="alert alert-success"> Alterado com sucesso! </div>';
															
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/servico/editService/".$id);						
			
				}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
				   			<button type="button" class="close" data-dismiss="alert">×</button>
							  '.$e->getMessage().'
							</div>';				
					$this->session->set_flashdata('msg', $erro);
					redirect("admin/servico/editService/".$id);		
					
				}			


		}


		public function deleteService($id = null){
			try{
				

				  if(!$this->servico_model->deleteService($id)){

				  	throw new Exception("Erro ao deletar dados");
				  	
				  }	

				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/servico/listService/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/servico/listService/");


			}
		}



}

/* End of file servicos.php */
/* Location: ./application/controllers/admin/servicos.php */

 ?>