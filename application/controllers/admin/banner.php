<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

			}
			$this->load->library('uploadinit');
			$this->load->model('admin/banner_model');
			
		
		}


		

		public function listBanner(){
			
			$dados['listBanner'] = $this->banner_model->listBanner();
			$this->template->load('admin/index','admin/templates/banner_tpl',$dados);
			
		}

		public function addBanner(){

			
			$this->template->load('admin/index','admin/templates/banner_add_tpl');	

		}

		public function insertBanner(){
			try{


				$this->form_validation->set_rules('legend', 'Legenda:', 'required');				
				$this->form_validation->set_rules('userfile', 'Imagem:', 'callback_validate');
				

				$campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo obrigatório!
									</div>';
				
				$this->form_validation->set_message('required', $campoEmBranco);
				
			
				
				if ($this->form_validation->run() == FALSE){
					
					$this->addBanner();
			
				}else{ 
						
						if(!empty($_FILES['userfile']['name'])){

						
							/*inicializa upload*/
							$this->uploadinit->uploadInit('assets/images_dinamic/banner/','jpg|png|JPEG','950','400');	
							if ( ! $this->upload->do_upload()){
					
									throw new Exception("Erro no envio da imagem , contate seu administrador de sistemas!");
			
							}

							$nomeImagem = $this->upload->data();
							$this->uploadinit->cropInit( 'assets/images_dinamic/banner/', $nomeImagem['file_name'],  '100', '100', TRUE );							
							$dados = array(

								'imagem'				=> $nomeImagem['file_name'], 
								'legenda' 				=> $this->input->post('legend'),
								'user_id'				=> $this->session->userdata('id')								

								);
							if(!$this->banner_model->addBanner($dados)){

								throw new Exception("Erro ao cadastrar dados!");
							}
							
							 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
										 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
																
							$this->session->set_flashdata('msg', $sucesso);
							redirect("admin/banner/addBanner/");
						}	
						
			
				}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
				   			<button type="button" class="close" data-dismiss="alert">×</button>
							  '.$e->getMessage().'
							</div>';				
					$this->session->set_flashdata('msg', $erro);
					redirect("admin/banner/addBanner/");		
					
				}			
		}


		public function editBanner($id = null){
			
			
			$dados['listBanner'] = $this->banner_model->listBanner($id);
			$this->template->load('admin/index','admin/templates/banner_edit_tpl',$dados);

		}

		public function updateBanner($id = null){
				
				try{


				$this->form_validation->set_rules('legend', 'Legenda:', 'required');				
				
				

				$campoEmBranco = '<div class="alert alert-block">
									  <button type="button" class="close" data-dismiss="alert">×</button>
									  <strong>%s</strong>
									   Campo obrigatório!
									</div>';
				
				$this->form_validation->set_message('required', $campoEmBranco);
				
			
				
				if ($this->form_validation->run() == FALSE){
					
					$this->editBanner($id);
			
				}else{ 
						
						if(!empty($_FILES['userfile']['name'])){

						
							/*inicializa upload*/
							$this->uploadinit->uploadInit('assets/images_dinamic/banner/','jpg|png|JPEG','950','400');	
							if ( ! $this->upload->do_upload()){
					
										throw new Exception("Erro no envio da imagem , verifique o tamanho de sua imagem! largura máxima : 950 - altura máxima : 400");
			
							}

							$imagemAntiga = $this->banner_model->listBanner($id);

				
							
							if(isset($imagemAntiga)){

								$thumb = explode('.', $imagemAntiga[0]->imagem);
								$thumb = $thumb[0]."_thumb.".$thumb[1];
								unlink('assets/images_dinamic/banner/'.$imagemAntiga[0]->imagem);
								unlink('assets/images_dinamic/banner/'.$thumb);
							}

							$nomeImagem = $this->upload->data();
							$this->uploadinit->cropInit( 'assets/images_dinamic/banner/', $nomeImagem['file_name'],  '100', '100', TRUE );	
							$dados = array(

								'imagem'				=> $nomeImagem['file_name'], 
								'legenda' 				=> $this->input->post('legend'),
								'user_id'				=> $this->session->userdata('id')								

								);
							if(!$this->banner_model->editBanner($id,$dados)){

								throw new Exception("Erro ao cadastrar dados!");
							}
							
							 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
										 			<div class="alert alert-success"> Alterado com sucesso! </div>';
																
							$this->session->set_flashdata('msg', $sucesso);
							redirect("admin/banner/editBanner/".$id);
						}	


						$dados = array(
								
									'legenda' 				=> $this->input->post('legend'),
									'user_id'				=> $this->session->userdata('id')								

									);
						if(!$this->banner_model->editBanner($id,$dados)){

							throw new Exception("Erro ao cadastrar dados!");
						}
						
						 $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
									 			<div class="alert alert-success"> Alterado com sucesso! </div>';
															
						$this->session->set_flashdata('msg', $sucesso);
						redirect("admin/banner/editBanner/".$id);						
			
				}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
				   			<button type="button" class="close" data-dismiss="alert">×</button>
							  '.$e->getMessage().'
							</div>';				
					$this->session->set_flashdata('msg', $erro);
					redirect("admin/banner/editBanner/".$id);		
					
				}			




		}


		public function deleteBanner($id = null){
			try{
					
					$imagemAntiga = $this->banner_model->listBanner($id);			
							
					if(isset($imagemAntiga)){

						$thumb = explode('.', $imagemAntiga[0]->imagem);
						$thumb = $thumb[0]."_thumb.".$thumb[1];
						unlink('assets/images_dinamic/banner/'.$imagemAntiga[0]->imagem);
						unlink('assets/images_dinamic/banner/'.$thumb);
					}

				  if(!$this->banner_model->deleteBanner($id)){

				  	throw new Exception("Erro ao deletar dados");
				  	
				  }	


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/banner/listBanner/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/banner/listBanner/");


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

}

/* End of file banner.php */
/* Location: ./application/controllers/admin/banner.php */

 ?>