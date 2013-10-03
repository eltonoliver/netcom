<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto_model extends CI_Model {

	
		public function listProduct($id  = null){
			if($id == null){
					   $this->db->order_by('id', 'desc');
				return $this->db->get('product',3)->result();
			}else{

				$this->db->where('id', $id);
				return $this->db->get('product')->result(); 
			}
		}

		public function listProductAll($maximo, $inicio ){
			return $this->db->get('product',$maximo,$inicio)->result();
		}

		public function countRows(){
			
			return $this->db->count_all('product');
		}

		
}

/* End of file servico_model.php */
/* Location: ./application/models/admin/servico_model.php */
 ?>