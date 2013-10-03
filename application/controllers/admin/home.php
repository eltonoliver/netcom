<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
	   parent::__construct();
	   if(!$this->session->userdata('logged_in')){

			redirect('admin/login/');

		}
	}
	
	public function homeAdmin(){

		$this->template->load('admin/index','admin/templates/home_tpl');	
		
	}

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */


 ?>