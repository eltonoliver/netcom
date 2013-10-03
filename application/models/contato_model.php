<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato_model extends CI_Model {

		public function listContato($id  = null){
			if($id == null){

				return $this->db->get('contato')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('contato')->result(); 
			}
		}



}

/* End of file home_model.php */
/* Location: ./application/models/admin/home_model.php */
 ?>