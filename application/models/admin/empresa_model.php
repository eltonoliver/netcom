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


		  public function addEmpresa($dados = null){
		    	
		    	return $this->db->insert('empresa', $dados);
				 
		    }


	      public function editEmpresa($id = null,$dados = null){
		    		
		    	return $this->db->update('empresa', $dados, array('id' => $id));
	 
		}



		public function deleteEmpresa($id = null){

		   $this->db->where('id',$id);
           return $this->db->delete('empresa');


		}		      
		

}

/* End of file home_model.php */
/* Location: ./application/models/admin/home_model.php */
 ?>