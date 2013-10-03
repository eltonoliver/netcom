<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model {

		public function listEmpresa($id  = null){
			if($id == null){

				return $this->db->get('empresa')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('empresa')->result(); 
			}
		}
		 

}

/* End of file home_model.php */
/* Location: ./application/models/admin/home_model.php */
 ?>