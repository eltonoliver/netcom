<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto_model extends CI_Model {

		public function addCategory($dados = null){	
			    	
	    	return $this->db->insert('category', $dados);
		
			
		}

		public function listCategory($id  = null){
			if($id == null){

				return $this->db->get('category')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('category')->result(); 
			}
		}

		
	   public function editCategory($id = null,$dados = null){
		    		
		    	return $this->db->update('category', $dados, array('id' => $id));
	 
		}

		public function deleteCategory($id = null){
	   	    
   		   $this->db->where('id',$id);
           return $this->db->delete('category');
           
	   	    	
	   	}

	   	public function listProduct($id  = null){
			if($id == null){

				return $this->db->get('product')->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('product')->result(); 
			}
		}

	   	public function addProduct($dados = null){	
			    	
	    	return $this->db->insert('product', $dados);
		
			
		}

		public function lisNameImageProduct($id = null){
			$this->db->where('id', $id);
			$this->db->select('imagem');
			return $this->db->get('product')->result();
		}

		 public function editProduct($id = null,$dados = null){
		    		
		    	return $this->db->update('product', $dados, array('id' => $id));
	 
		}

		public function deleteProduct($id = null){
	   	    
   		   $this->db->where('id',$id);
           return $this->db->delete('product');
           
	   	    	
	   	}



}

/* End of file produto_model.php */
/* Location: ./application/models/admin/produto_model.php */

 ?>