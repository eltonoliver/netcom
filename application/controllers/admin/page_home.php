<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_home extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

			}
		
			$this->load->model('admin/home_model');
			$this->load->helper('text'); 
		
		}


		
		public function listHome(){
			$dados['listHome'] = $this->home_model->listHome();
			$this->template->load('admin/index','admin/templates/page_home_tpl',$dados);	

		}

		public function addHome(){

	
			$this->template->load('admin/index','admin/templates/page_home_add_tpl');	

		}

		public function insertHome(){

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
				 				
				

				$this->form_validation->set_rules('message', 'Mensagem:', 'required');
				$this->form_validation->set_rules('message_footer', 'Mensagem do Rodapé:', 'required');
				$this->form_validation->set_rules('service_description', 'Descrição de serviço:', 'required');
				$this->form_validation->set_rules('partner_description', 'Descrição de parceiros:', 'required');
				$this->form_validation->set_rules('product_description', 'Descrição de produtos:', 'required');		
				
			
				$this->form_validation->set_message('required', $campoEmBranco);
				
		
			
			if ($this->form_validation->run() == FALSE){
				
				$this->addHome();
		
			}else{
			
				$dadosInput = array(
					'mensagem' => trim($this->input->post('message')),
					'mensagem_rodape' => trim($this->input->get_post('message_footer')),
					'desc_servico' 	  => trim($this->input->get_post('service_description')),
					'desc_parceiro'   => trim($this->input->get_post('partner_description')),
					'desc_produto' 	  => trim($this->input->get_post('product_description')),
					'user_id' 		  => $this->session->userdata('id')
					);

				if(!$this->home_model->addHome($dadosInput)){
					throw new Exception("Erro ao cadastrar dados!");
					
				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Cadastrado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_home/listHome/");
		
			}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/page_home/listHome/");
		
				
			}
		
		}

		public function editHome($id = null){
			$dados['listHome'] = $this->home_model->listHome($id);
			$this->template->load('admin/index','admin/templates/page_home_edit_tpl',$dados);	
		}


		public function updateHome($id = null){
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
				 				
				

				$this->form_validation->set_rules('message', 'Mensagem:', 'required');
				$this->form_validation->set_rules('message_footer', 'Mensagem do Rodapé:', 'required');
				$this->form_validation->set_rules('service_description', 'Descrição de serviço:', 'required');
				$this->form_validation->set_rules('partner_description', 'Descrição de parceiros:', 'required');
				$this->form_validation->set_rules('product_description', 'Descrição de produtos:', 'required');		
				
			
				$this->form_validation->set_message('required', $campoEmBranco);
				
		
			
			if ($this->form_validation->run() == FALSE){
				
				$this->editHome($id);
		
			}else{
			
				$dadosInput = array(
					'mensagem' => trim($this->input->post('message')),
					'mensagem_rodape' => trim($this->input->get_post('message_footer')),
					'desc_servico' 	  => trim($this->input->get_post('service_description')),
					'desc_parceiro'   => trim($this->input->get_post('partner_description')),
					'desc_produto' 	  => trim($this->input->get_post('product_description')),
					'user_id' 		  => $this->session->userdata('id')
					);

				if(!$this->home_model->editHome($id,$dadosInput)){
					throw new Exception("Erro ao alterar dados!");
					
				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Alterado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_home/editHome/".$id);
		
			}
			}catch(Exception $e){

				  $erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/page_home/editHome/".$id);
		
				
			}



		}


		public function deleteHome($id = null){

			try{
				if(!$this->home_model->deleteHome($id)){

					throw new Exception("Erro ao deletar dados!");
					

				}


				  $sucesso = '<button type="button" class="close" data-dismiss="alert">×</button>
							 			<div class="alert alert-success"> Deletado com sucesso! </div>';
				  $this->session->set_flashdata('msg', $sucesso);
				  redirect("admin/page_home/listHome/");				


			}catch(Exception $e){
				$erro = '<div class="alert alert-error">
						   			<button type="button" class="close" data-dismiss="alert">×</button>
									  '.$e->getMessage().'
									</div>';
				
				$this->session->set_flashdata('erro', $erro);
				redirect("admin/page_home/listHome/");	


			}


		}	

}

/* End of file page_home.php */
/* Location: ./application/controllers/admin/page_home.php */


 ?>