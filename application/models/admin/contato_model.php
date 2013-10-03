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


		  public function addContato($dados = null){
		    	
		    	return $this->db->insert('contato', $dados);
				 
		    }


	      public function editContato($id = null,$dados = null){
		    		
		    	return $this->db->update('contato', $dados, array('id' => $id));
	 
		}



		public function deleteContato($id = null){

		   $this->db->where('id',$id);
           return $this->db->delete('contato');


		}		      
		

}

/* End of file home_model.php */
/* Location: ./application/models/admin/home_model.php */
 ?>