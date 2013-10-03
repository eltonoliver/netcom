<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('servico_model');
		$this->load->model('empresa_model');
		$this->load->model('contato_model');
		$this->load->model('produto_model');
		$this->load->model('busca_model');
		$this->load->helper('text'); 
		$this->load->library('pagination');
	}

	public function index(){
		$dados['listHome'] 		= $this->home_model->listHome();
		$dados['listService']	= $this->servico_model->listService();
		$this->template->load('index','templates/home',$dados);	
		
	}

	public function contato(){
		$dados['listContato'] = $this->contato_model->listContato();
		$this->template->load('index','templates/contact',$dados);	
	}

	public function listaProduto(){

		$this->template->load('index','templates/list_product');	
	}

	public function sobre(){
		$dados['listEmpresa'] 	=  $this->empresa_model->listEmpresa();
		$this->template->load('index','templates/about.php',$dados);	
	}

	public function servico($id = null){
		
		$maximo = 6;
		$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");	
		$config['base_url'] = base_url().'home/servico/';
		$config['total_rows'] = $this->servico_model->countRows();
		$config['per_page'] = $maximo;

		$config['first_link'] = 'Primeiro';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		// Current Link
		$config['cur_tag_open'] = '<li><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['last_link'] = 'Último';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Próximo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_link'] = 'Voltar';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$this->pagination->initialize($config);    
		$dados["paginacao"] =  $this->pagination->create_links();		
		

		$dados['listService']	= $this->servico_model->listServiceAll($maximo,$inicio);
		$this->template->load('index','templates/service.php',$dados);	
	}

	public function servicoDetalhes($id = null){
		$dados['listService'] = $this->servico_model->listService($id);
		$this->template->load('index','templates/service_details.php',$dados);		
	}


	public function produto($id = null){
		
		$maximo = 6;
		$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");	
		$config['base_url'] = base_url().'home/produto/';
		$config['total_rows'] = $this->produto_model->countRows();
		$config['per_page'] = $maximo;

		$config['first_link'] = 'Primeiro';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		// Current Link
		$config['cur_tag_open'] = '<li><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['last_link'] = 'Último';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Próximo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_link'] = 'Voltar';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';


		$this->pagination->initialize($config);    
		$dados["paginacao"] =  $this->pagination->create_links();		
		

		$dados['listProduct']	= $this->produto_model->listProductAll($maximo,$inicio);
		$this->template->load('index','templates/product',$dados);	
	}

	public function produtoDetalhes($id = null){
		$dados['listProduct'] = $this->produto_model->listProduct($id);
		$this->template->load('index','templates/product_detail',$dados);		
	}

	public function busca(){
		
		$dados['listaBusca'] = $this->busca_model->get_search($this->input->post('busca'));
		
		$this->template->load('index','templates/seach',$dados);	
	}





}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

 ?>