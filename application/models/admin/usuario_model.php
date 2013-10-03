<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	  public function addUser($dados = null){
	    	
	    	return $this->db->insert('user', $dados);
			 
	    }

	   public function getUser( $id = null){
	   		if($id == null){

	   		 return	$this->db->get('user')->result();
	   		}else{

	   			$this->db->where('id', $id);
	   			return $this->db->get('user')->result();
	   		}
	   }

	   public function editUser($id = null,$dados = null){
	   		$this->db->where('id', $id);
	   		return $this->db->update('user', $dados);
	   }


	     public function deleteUser($id = null){
	   	    
   		   $this->db->where('id',$id);
           return $this->db->delete('user');
           
	   	    	
	   	}
	   
	
	

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */

 ?>