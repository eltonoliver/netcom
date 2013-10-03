<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busca_model extends CI_Model {

		function get_search($nomeBusca){
			
			$this->db->like('nome',$nomeBusca);
			$this->db->like('titulo',$nomeBusca);
			$this->db->like('descricao',$nomeBusca);			
			return $this->db->get('product')->result();
			
		}
	
	

}

/* End of file busca.php */
/* Location: ./application/models/busca.php */


 ?>