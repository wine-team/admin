<?php
class Mall_goods_related_model extends CI_Model{

	private $table = 'mall_goods_related';        
	
	public function findOrWhere($goods_id)
	{
	    $this->db->where('goods_id', $goods_id);
	    $this->db->or_where('related_goods_id', $goods_id);
	    return $this->db->get($this->table);
	}
	
	public function findById($where)
	{
	    return $this->db->get_where($this->table, $where);
	}
	
	public function insert($data) 
	{
	    $this->db->insert($this->table, $data);
	    return $this->db->insert_id();
	} 
	
	public function update($where, $data)  
	{
	    $this->db->update($this->table, $data, $where);
	    return $this->db->affected_rows();
	}
	
	public function delete($where)  
	{
	    $this->db->delete($this->table, $where);
	    return $this->db->affected_rows();
	}
	
}
/* End of file Mall_goods_related_model.php */
/* Location: ./application/models/Mall_goods_related_model.php */

