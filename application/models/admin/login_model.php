<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Login_model extends CI_Model {
 
 		public function validLogin( $dados = null ) {


			 
			$this->db->where('login',$dados['login']);
			$this->db->where('senha',$dados['senha']);
			return $this->db->get('user')->result();
			


	}
 
 }
 
 /* End of file login_model.php */
 /* Location: ./application/models/admin/login_model.php */ 


 ?>