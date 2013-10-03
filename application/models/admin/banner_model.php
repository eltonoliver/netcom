<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public function listBanner($id  = null){
			if($id == null){

				return $this->db->get('banner')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('banner')->result(); 
			}
		}


	public function addBanner($dados = null){	
			    	
	    	return $this->db->insert('banner', $dados);
		
			
		}

	public function editBanner($id = null,$dados = null){
		    		
		    	return $this->db->update('banner', $dados, array('id' => $id));
	 
		}

		public function deleteBanner($id = null){
	   	    
   		   $this->db->where('id',$id);
           return $this->db->delete('banner');
           
	   	    	
	   	}	

}

/* End of file banner_model.php */
/* Location: ./application/models/admin/banner_model.php */

 ?>