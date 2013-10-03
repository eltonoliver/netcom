<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

		public function listHome($id  = null){
			if($id == null){

				return $this->db->get('home')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('home')->result(); 
			}
		}


		  public function addHome($dados = null){
		    	
		    	return $this->db->insert('home', $dados);
				 
		    }


	      public function editHome($id = null,$dados = null){
		    		
		    	return $this->db->update('home', $dados, array('id' => $id));
	 
		}



		public function deleteHome($id = null){

		   $this->db->where('id',$id);
           return $this->db->delete('home');


		}


		      
		

}

/* End of file home_model.php */
/* Location: ./application/models/admin/home_model.php */
 ?>