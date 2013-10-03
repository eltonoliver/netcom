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

	
		
	
	}
	
	/* End of file home_model.php */
	/* Location: ./application/models/home_model.php */



?>