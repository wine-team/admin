<?php
class Mall_goods_base_model extends CI_Model
{
	private $table = 'mall_goods_base';        

	public function total($param)
	{
		if (!empty($param['goods_id'])) {
			$this->db->where('mall_goods_base.goods_id', $param['goods_id']);
		}
		if (!empty($param['goods_ids'])) {
			$this->db->where_in('mall_goods_base.goods_id', $param['goods_ids']);
		}
		if (!empty($param['goods_name'])) {
			$this->db->like('mall_goods_base.goods_name', $param['goods_name']);
		}
		if (!empty($param['goods_search'])) {
			$this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$param['goods_search']}%') OR (`mall_goods_base`.`goods_sku`='{$param['goods_search']}'))");
		}
		if (!empty($param['supplier_id'])) {
			$this->db->where('mall_goods_base.supplier_id', $param['supplier_id']);
		}
		if (!empty($param['is_on_sale'])) {
			$this->db->where('mall_goods_base.is_on_sale', $param['is_on_sale']);
		}
		if (!empty($param['is_check'])) {
			$this->db->where('mall_goods_base.is_check', $param['is_check']);
		}
		if (!empty($param['extension_code'])) {
			$this->db->where('mall_goods_base.extension_code', $param['extension_code']);
		}
		if (!empty($param['attribute_set_id'])) {
			$this->db->where('mall_goods_base.attribute_set_id', $param['attribute_set_id']);
		}
		if (!empty($param['province_id'])) {
			$this->db->where('mall_goods_base.province_id', $param['province_id']);
		}
		if (!empty($param['city_id'])) {
			$this->db->where('mall_goods_base.city_id', $param['city_id']);
		}
		if (!empty($param['district_id'])) {
			$this->db->where('mall_goods_base.district_id', $param['district_id']);
		}
		if (!empty($param['start_date'])) {
			$this->db->where(array('mall_goods_base.created_at >' => $param['start_date']));
		}
		if (!empty($param['end_date'])) {
			$this->db->where(array('mall_goods_base.created_at <=' => $param['end_date']));
		}
		return $this->db->count_all_results($this->table);
	}
	
	public function page_list($page_num, $num, $param = array())
	{
		if (!empty($param['goods_id'])) {
			$this->db->where('mall_goods_base.goods_id', $param['goods_id']);
		}
		if (!empty($param['goods_ids'])) {
			$this->db->where_in('mall_goods_base.goods_id', $param['goods_ids']);
		}
		if (!empty($param['goods_name'])) {
			$this->db->like('mall_goods_base.goods_name', $param['goods_name']);
		}
		if (!empty($param['goods_search'])) {
			$this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$param['goods_search']}%') OR (`mall_goods_base`.`goods_sku`='{$param['goods_search']}'))");
		}
		if (!empty($param['supplier_id'])) {
			$this->db->where('mall_goods_base.supplier_id', $param['supplier_id']);
		}
		if (!empty($param['is_on_sale'])) {
			$this->db->where('mall_goods_base.is_on_sale', $param['is_on_sale']);
		}
		if (!empty($param['is_check'])) {
			$this->db->where('mall_goods_base.is_check', $param['is_check']);
		}
		if (!empty($param['extension_code'])) {
			$this->db->where('mall_goods_base.extension_code', $param['extension_code']);
		}
		if (!empty($param['attribute_set_id'])) {
			$this->db->where('mall_goods_base.attribute_set_id', $param['attribute_set_id']);
		}
		if (!empty($param['province_id'])) {
			$this->db->where('mall_goods_base.province_id', $param['province_id']);
		}
		if (!empty($param['city_id'])) {
			$this->db->where('mall_goods_base.city_id', $param['city_id']);
		}
		if (!empty($param['district_id'])) {
			$this->db->where('mall_goods_base.district_id', $param['district_id']);
		}
		if (!empty($param['start_date'])) {
			$this->db->where(array('mall_goods_base.created_at >' => $param['start_date']));
		}
		if (!empty($param['end_date'])) {
			$this->db->where(array('mall_goods_base.created_at <=' => $param['end_date']));
		}
		$this->db->order_by('mall_goods_base.goods_id', 'DESC');
		$this->db->limit($page_num, $num);
		return $this->db->get($this->table);
	}
	
	 /**
	 * 插入 
	 * @param unknown $param
	 */
	 public function insertMallGoods($param){
	 	
	 	$data = array(
	 		'category_id'  => implode(',',array_filter($param['category_id'])),
	 	    'goods_name'   => $param['goods_name'],
	 	    'goods_sku'    => $param['goods_sku'],
	 	    'brand_id'     => $param['brand_id'],
	 		'goods_weight' => $param['goods_weight'],
	 		'goods_brief'  => $param['goods_brief'],
	 		'supplier_id'  => $param['supplier_id'],
	 		'is_check'     => $param['is_check'],
	 		'is_on_sale'   => $param['is_on_sale'],
	 		'goods_desc'   => $param['goods_desc'],
	 		'wap_goods_desc'=> $param['wap_goods_desc'],
	 		'market_price'  => $param['market_price'],
	 		'shop_price'    => $param['shop_price'],
	 		'promote_price' => $param['promote_price'],
	 		'promote_start_date' => $param['promote_start_date'],
	 		'promote_end_date'   => $param['promote_end_date'],
	 		'attribute_set_id'   => $param['attribute_set_id'],
	 	    'extension_code'     => $param['extension_code'],
	 		'tour_count'         => $param['tour_count'],
	 		'sale_count'         => $param['sale_count'],
	 		'in_stock'           => $param['in_stock'],
	 	    'limit_num'          => $param['limit_num'],
	 	    'minus_stock'        => $param['minus_stock'],
	 		'province_id'        => $param['province_id'],
	 		'city_id'            => $param['city_id'],
	 		'district_id'        => $param['district_id'],
	 		'address'            => $param['address'],
	 		'goods_img'          => '',
	 		'integral'      => empty($param['integral']) ? '0' : $param['integral'],
	 		'sort_order'    => empty($param['sort_order']) ? '1' : $param['sort_order'],
	 		'created_at'    => date('Y-m-d H:i:s'),
	 	);
	 	//运费模版
	 	if ($param['transport_type'] == 1) {
	 		$data['freight_id'] = $param['freight_id'];
	 	} else {
	 		$data['freight_cost'] = $param['freight_cost'];
	 	}
	 	$this->db->insert($this->table,$data);
	 	return $this->db->insert_id();
	 }
	 
	 /**
	  * 
	  * @param unknown $param
	  * @param unknown $goods_id
	  */
	 public function updateMallGoodsBase($param,$goods_id){
	 	
	 	$data = array(
	 			'goods_name'   => $param['goods_name'],
	 			'goods_sku'    => $param['goods_sku'],
	 			'brand_id'     => $param['brand_id'],
	 			'goods_weight' => $param['goods_weight'],
	 			'goods_brief'  => $param['goods_brief'],
	 			'supplier_id'  => $param['supplier_id'],
	 			'is_check'     => $param['is_check'],
	 			'is_on_sale'   => $param['is_on_sale'],
	 			'goods_desc'   => $param['goods_desc'],
	 			'wap_goods_desc'=> $param['wap_goods_desc'],
	 			'market_price'  => $param['market_price'],
	 			'shop_price'    => $param['shop_price'],
	 			'promote_price' => $param['promote_price'],
	 			'promote_start_date' => $param['promote_start_date'],
	 			'promote_end_date'   => $param['promote_end_date'],
	 			'tour_count'         => $param['tour_count'],
	 			'sale_count'         => $param['sale_count'],
	 			'province_id'        => $param['province_id'],
	 			'city_id'            => $param['city_id'],
	 			'district_id'        => $param['district_id'],
	 			'address'            => $param['address'],
	 			'in_stock'           => $param['in_stock'],
	 			'extension_code'     => $param['extension_code'],
	 			'limit_num'          => $param['limit_num'],
	 			'minus_stock'        => $param['minus_stock'],
	 			'integral'      => empty($param['integral']) ? '0' : $param['integral'],
	 			'sort_order'    => empty($param['sort_order']) ? '1' : $param['sort_order'],
	 			'update_at'     => date('Y-m-d H:i:s'),
	 	);
	 	
	 	if (!empty($param['category_id'])){
	 		$data['category_id'] = implode(',',array_filter($param['category_id']));
	 	}

	 	if ($param['transport_type'] == 1) {//运费模版
	 		$data['freight_id'] = $param['freight_id'];
	 		$data['freight_cost'] = 0;
	 	} else {
	 		$data['freight_id'] = 0;
	 		$data['freight_cost'] = $param['freight_cost'];
	 	}
	 	
	 	$this->db->where('goods_id',$goods_id);
	 	return $this->db->update($this->table,$data);
	 }
	 
	 /**
	 * 更新
	 * @param unknown $goods_id
	 * @param unknown $param
	 */
	public function updateByGoodsId($goods_id,$param)
	{
		$this->db->where('goods_id', $goods_id);
		return $this->db->update($this->table, $param);
	}
	
	 /**
	 * 删除
	 * @param unknown $goods_id
	 */
	public function deleteById($goods_id){
		
		$this->db->where('goods_id', $goods_id);
		return $this->db->delete($this->table);
	}
	
	 /**
	 * 
	 * @param unknown $goods_id
	 */
	public function getInfoByGoodsId($goods_id){
		
		$this->db->select('mall_goods_base.*,mall_category.full_name');
		$this->db->from($this->table);
		$this->db->join('mall_category','mall_category.cat_id=mall_goods_base.category_id');
		$this->db->where('mall_goods_base.goods_id', $goods_id);
		return $this->db->get();
	}
	
	 /**
	 * 
	 * @param unknown $params
	 */
	public function insertImage($params){
		
		$data['goods_img'] = $params['goods_img'];
		$this->db->where('goods_id',$params['goods_id']);
		return $this->db->update($this->table,$data);
	}

}
