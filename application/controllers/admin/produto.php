<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Produto extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

			}
			$this->load->library('uploadinit');
			$this->load->model('admin/produto_model');

		
		}


	
		public function listCategory(){
			$dados['listCategory'] = $this->produto_model->listCategory();
			$this->template->load('admin/index','admin/templates/produto_categoria_tpl',$dados);
			
		}

		public function addCategory(){


			$this->template->load('admin/index','admin/templates/produto_categoria_add_tpl');	

		}



		public function insertCategory(){

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
						
						$this->addCategory();
				
					}else{
						
						$dados = array('nome' => $this->input->post('nameCategory'));

						if(!$this->produto_model->addCategory($dados)){

							throw new Exception("Erro ao cadastrar dados!");
							
						}

					  	$sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
								 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
								
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/produto/addCategory");
				
					}
			}catch(Exception $e){

					  $erro = '<div class="alert alert-error">
					   			<button type="button" class="close" data-dismiss="alert">×</button>
								  '.$e->getMessage().'
								</div>';
					
					$this->session->set_flashdata('erro', $erro);
					redirect("admin/produto/addCategory");
			
				
			}
			
		}

		public function editCategory($id = null){
			$dados['listCategory'] = $this->produto_model->listCategory($id);
			$this->template->load('admin/index','admin/templates/produto_categoria_edit_tpl',$dados);	
		}

		public function updateCategory($id = null){

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
						
						$this->editCategory();
				
					}else{
						
						$dados = array('nome' => $this->input->post('nameCategory'));

						if(!$this->produto_model->editCategory($id,$dados)){

							throw new Exception("Erro ao alterar dados!");
							
						}

					  	$sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
								 			<div class="alert alert-success"> Alterado com sucesso! </div>';
								
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/produto/editCategory/".$id);
				
					}
			}catch(Exception $e){

					  $erro = '<div class="alert alert-error">
					   			<button type="button" class="close" data-dismiss="alert">×</button>
								  '.$e->getMessage().'
								</div>';
					
					$this->session->set_flashdata('erro', $erro);
					redirect("admin/produto/editCategory/".$id);
			
				
			}
			
		}

		public function deleteCategory($id = null){
			try{
				

				  if(!$this->produto_model->deleteCategory($id)){

				  	throw new Exception("Erro ao deletar dados");
				  	
				  }	

				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/produto/listCategory/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/produto/listCategory/");


			}
		}

		public function listProduct(){
			$dados['listProduct'] = $this->produto_model->listProduct();
			$this->template->load('admin/index','admin/templates/produto_tpl',$dados);	
		}

		public function addProduct(){

		$dados['listCategory'] = $this->produto_model->listCategory();	
			 
      
 	
			$this->template->load('admin/index','admin/templates/produto_add_tpl',$dados);	
		}


		public function insertProduct(){
			
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
					
					$this->addProduct();
			
				}else{ 
						
						if(!empty($_FILES['userfile']['name'])){

						
							/*inicializa upload*/
							$this->uploadinit->uploadInit('assets/images_dinamic/product/','jpg|png|JPEG','700','600');	
							if ( ! $this->upload->do_upload()){
					
										throw new Exception("Erro no envio da imagem , verifique o tamanho de sua imagem! largura máxima : 700 - altura máxima : 600");
			
							}

							$nomeImagem = $this->upload->data();
							$this->uploadinit->cropInit( 'assets/images_dinamic/product/', $nomeImagem['file_name'],  '400', '300', TRUE );
							$dados = array(

								'nome'					=> $this->input->post('nameProduct'), 
								'titulo' 				=> $this->input->post('titleProduct'),
								'descricao'				=> $this->input->post('description'),
								'imagem'		 		=> $nomeImagem['file_name'],		
								'user_id'				=> $this->session->userdata('logged_in'),
								'category_id'			=> $this->input->post('nameCategory')

								);
							if(!$this->produto_model->addProduct($dados)){

								throw new Exception("Erro ao cadastrar dados!");
							}
							
							 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
										 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
																
							$this->session->set_flashdata('msg', $sucesso);
							redirect("admin/produto/addProduct/");
						}	
						
			
				}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
				   			<button type="button" class="close" data-dismiss="alert">×</button>
							  '.$e->getMessage().'
							</div>';				
					$this->session->set_flashdata('msg', $erro);
					redirect("admin/produto/addProduct/");		
					
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

		public function editProduct($id = null){
			$dados['listCategory'] = $this->produto_model->listCategory();
			$dados['listProduct'] = $this->produto_model->listProduct($id);
			
			$this->template->load('admin/index','admin/templates/produto_edit_tpl',$dados);		
		}




		public function updateProduct($id = null){
			
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
					
					$this->editProduct($id);
			
				}else{ 
						
						if(!empty($_FILES['userfile']['name'])){

						
							/*inicializa upload*/
							$this->uploadinit->uploadInit('assets/images_dinamic/product/','jpg|png|JPEG','700','600');	
							if ( ! $this->upload->do_upload()){
					
										throw new Exception("Erro no envio da imagem , verifique o tamanho de sua imagem! largura máxima : 700 - altura máxima : 600");
			
							}

							$imagemAntiga = $this->produto_model->lisNameImageProduct($id);

				
							
							if(isset($imagemAntiga)){

								$thumb = explode('.', $imagemAntiga[0]->imagem);
								$thumb = $thumb[0]."_thumb.".$thumb[1];
								unlink('assets/images_dinamic/product/'.$imagemAntiga[0]->imagem);
								unlink('assets/images_dinamic/product/'.$thumb);
							}

							$nomeImagem = $this->upload->data();
							$this->uploadinit->cropInit( 'assets/images_dinamic/product/', $nomeImagem['file_name'],  '400', '300', TRUE );
							$dados = array(

								'nome'					=> $this->input->post('nameProduct'), 
								'titulo' 				=> $this->input->post('titleProduct'),
								'descricao'				=> $this->input->post('description'),
								'imagem'		 		=> $nomeImagem['file_name'],		
								'user_id'				=> $this->session->userdata('logged_in'),
								'category_id'			=> $this->input->post('nameCategory')

								);
							if(!$this->produto_model->editProduct($id,$dados)){

								throw new Exception("Erro ao cadastrar dados!");
							}
							
							 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
										 			<div class="alert alert-success"> Alterado com sucesso! </div>';
																
							$this->session->set_flashdata('msg', $sucesso);
							redirect("admin/produto/editProduct/".$id);
						}	


					$dados = array(

							'nome'					=> $this->input->post('nameProduct'), 
							'titulo' 				=> $this->input->post('titleProduct'),
							'descricao'				=> $this->input->post('description'),
							'user_id'				=> $this->session->userdata('logged_in'),
							'category_id'			=> $this->input->post('nameCategory')

							);
						if(!$this->produto_model->editProduct($id,$dados)){

							throw new Exception("Erro ao cadastrar dados!");
						}
						
						 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
									 			<div class="alert alert-success"> Alterado com sucesso! </div>';
															
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/produto/editProduct/".$id);						
			
				}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
				   			<button type="button" class="close" data-dismiss="alert">×</button>
							  '.$e->getMessage().'
							</div>';				
					$this->session->set_flashdata('msg', $erro);
					redirect("admin/produto/editProduct/".$id);		
					
				}			

		}

		public function deleteProduct($id = null){
			try{
					
					$imagemAntiga = $this->produto_model->lisNameImageProduct($id);			
							
					if(isset($imagemAntiga)){

						$thumb = explode('.', $imagemAntiga[0]->imagem);
						$thumb = $thumb[0]."_thumb.".$thumb[1];
						unlink('assets/images_dinamic/product/'.$imagemAntiga[0]->imagem);
						unlink('assets/images_dinamic/product/'.$thumb);
					}

				  if(!$this->produto_model->deleteProduct($id)){

				  	throw new Exception("Erro ao deletar dados");
				  	
				  }	


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/produto/listProduct/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/produto/listProduct/");


			}
		}
	
	}
	
	/* End of file produtos.php */
	/* Location: ./application/controllers/admin/produtos.php */


?>