<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servico_model extends CI_Model {

	
		public function listCategory($id  = null){
			if($id == null){

				return $this->db->get('serviceCategory')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('serviceCategory')->result(); 
			}
		}

		public function addCategory($dados = null){	
			    	
	    	return $this->db->insert('serviceCategory', $dados);
		
			
		}

		public function editCategory($id = null,$dados = null){
		    		
		    	return $this->db->update('serviceCategory', $dados, array('id' => $id));
	 
		}

		public function deleteCategory($id = null){
	   	    
   		   $this->db->where('id',$id);
           return $this->db->delete('serviceCategory');
           
	   	    	
	   	}


	   	public function listService($id  = null){
			if($id == null){

				return $this->db->get('service')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('service')->result(); 
			}
		}

		public function addService($dados = null){	
			    	
	    	return $this->db->insert('service', $dados);
		
			
		}

		public function lisNameImageService($id = null){
			$this->db->where('id', $id);
			$this->db->select('imagem');
			return $this->db->get('service')->result();
		}


		public function editService($id = null,$dados = null){
		    		
		    	return $this->db->update('service', $dados, array('id' => $id));
	 
		}

		public function deleteService($id = null){
	   	    
   		   $this->db->where('id',$id);
           return $this->db->delete('service');
           
	   	    	
	   	}
}

/* End of file servico_model.php */
/* Location: ./application/models/admin/servico_model.php */
 ?>