<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servico_model extends CI_Model {

	
		public function listService($id  = null){
			if($id == null){
					   $this->db->order_by('id', 'desc');
				return $this->db->get('service',3)->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('service')->result(); 
			}
		}

		public function listServiceAll($maximo, $inicio ){
			return $this->db->get('service',$maximo,$inicio)->result();
		}

		public function countRows(){
			
			return $this->db->count_all('service');
		}

		
}

/* End of file servico_model.php */
/* Location: ./application/models/admin/servico_model.php */
 ?>