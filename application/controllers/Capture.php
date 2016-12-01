<?php
class Capture extends MJ_Controller
{
    public function _init()
    {
        header("Content-type:text/html;charset=gb2312");
        $this->load->model('region_model', 'region');
        $this->load->model('mall_goods_base_model', 'mall_goods_base');
        $this->load->model('mall_attribute_set_model','mall_attribute_set');
        $this->load->model('mall_brand_model','mall_brand');
        $this->load->model('mall_goods_from_model','mall_goods_from');
        $this->load->model('mall_category_model', 'mall_category');
    }

    /**
     * 更新现有产品ID
     */
    public function upDateExsit()
    {
        $this->db->select('goods_id, goods_note, goods_sku');
        $this->db->where('from_id', 4);
        $result = $this->db->get('mall_goods_base');
        $goodsBase = $result->result();
        foreach ($goodsBase as $item) {
            $data = array(
                'goods_sku'   => 'THW'.preg_replace('/\D/s', '', $item->goods_note),
                'goods_note'  => $item->goods_note.'===='.$item->goods_sku,
            );
            $this->db->where('goods_id', $item->goods_id);
            $update = $this->db->update('mall_goods_base', $data);
            if ($update) {
                echo $item->goods_id.'更新成功<br />';
            } else {
                echo $item->goods_id.'更新失败<br />';
            }
        }
    }

    public function test()
    {
        require_once APPPATH.'libraries/phpQuery.php';
        phpQuery::newDocumentFile('http://www.taohv.cn/goods-3682.html');

        pr(pq('#wrap_con li:eq(1)')->html());exit;
    }

    public function women()
    {
        require_once APPPATH.'libraries/phpQuery.php';
        $productUrl = array();
        for ($i=1; $i<=12; $i++) {
            phpQuery::newDocumentFile('http://www.taohv.cn/category.php?top_cat_id=2&page='.$i);
            $items = pq('.plist ul li');
            foreach ($items as $key=>$item) {
                $productUrl[$key]['provide_price'] = preg_replace('/[^\.0123456789]/s', '', pq($item)->find('.pxinxi .xinxileft .xxjiage')->text());
                $productUrl[$key]['url'] = 'http://www.taohv.cn'.pq($item)->find('.ptupian a')->attr('href');
            }
            break;
        }
        $goodsData = array();
        if (!empty($productUrl)) {
            $item = array();
            foreach ($productUrl as $value) {
                phpQuery::newDocumentFile($value['url']);
                $goods_sku = 'THW'.pq('#wrap_con #goods_id')->val();

                $item['goods_name']           = pq('#wrap_con ul.title li:eq(1)')->html();
                $item['goods_sku']            = $goods_sku;
                $item['from_id']              = 4; //商品来源
                //$item['brand_id']             = 0;
                $item['goods_weight']         = 100;
                $item['market_price']         = trim(pq('.cpjiage .shijia em')->text(), '￥');
                $item['shop_price']           = $this->rePrice($value['provide_price']);
                $item['provide_price']        = $value['provide_price'];
                $item['promote_start_date']   = 0;
                $item['promote_end_date']     = 0;
                $item['attr_set_id']          = 5;
                $item['goods_brief']          = pq('#wrap_con ul.title li:eq(0)')->html();
                $item['goods_desc']           = trim(pq('.brands_con .brands_middle')->html(), ' ');
                $item['wap_goods_desc']       = trim(pq('.brands_con .brands_middle')->html(), ' ');
                $item['goods_note']           = $value['url'];
                $item['attr_spec']            = array();
                $item['attr_value']           = array();
                $item['goods_img']            = '';
                $item['extension_code']       = 'simple';
                $item['is_on_sale']           = 1;
                $item['is_check']             = 2;
                $item['in_stock']             = 100;
                $item['booking_limit']        = 0;
                $item['limit_num']            = 0;
                $item['minus_stock']          = 1;
                $item['integral']             = 0;
                $item['supplier_id']          = 15;
                $item['freight_id']           = 0;
                $item['freight_cost']         = 0;
                $item['province_id']          = 12;
                $item['city_id']              = 123;
                $item['district_id']          = 1363;
                $item['address']              = '浙江省 杭州市 下城区 新天地';
                $item['auto_cancel']          = 720;
                //$item['sale_count']           = 0;
                //$item['review_count']         = 0;
                //$item['tour_count']           = 0;
                //$item['sort_order']           = 50;
                $item['created_at']           = date('Y-m-d H:i:s');
                $item['updated_at']           = date('Y-m-d H:i:s');
                pr($item);exit;

                $mallGoodsBase = $this->mall_goods_base->findByGoodsSku($goods_sku);
                if ($mallGoodsBase->num_rows() > 0) {
                    $item['goods_note'] = $value['url'].'===='.$goods_sku;
                    unset($item['created_at']);
                    $update = $this->mall_goods_base->update($item);
                } else {
                    $goods_id = $this->mall_goods_base->insert($item);
                    $isInsert = $this->mall_category_product->insertBatchByGoodsId($goods_id, array(2, 13, 14, 15, 16, 17, 18, 19, 20));
                }

                if ((isset($update) && $update) || (isset($goods_id, $isInsert) && $goods_id && $isInsert)) {

                } else {

                }
            }
        }
    }

    public function rePrice($provide_price)
    {
        $shop_price = $provide_price + 10;

        switch ($provide_price) {
            case  $provide_price <= 100 :
                $shop_price = $provide_price + 10;
                break;
            case  $provide_price <= 200 :
                $shop_price = $provide_price + 15;
                break;
            case  $provide_price <= 300 :
                $shop_price = $provide_price + 20;
                break;
            case  $provide_price <= 400 :
                $shop_price = $provide_price + 25;
                break;
            case  $provide_price <= 500 :
                $shop_price = $provide_price + 30;
                break;
            case  $provide_price <= 600 :
                $shop_price = $provide_price + 40;
                break;
            case  $provide_price <= 700 :
                $shop_price = $provide_price + 50;
                break;
            case  $provide_price <= 800 :
                $shop_price = $provide_price + 60;
                break;
            case  $provide_price <= 900 :
                $shop_price = $provide_price + 80;
                break;
            case  $provide_price <= 1000 :
                $shop_price = $provide_price + 100;
                break;
            case  $provide_price <= 1500 :
                $shop_price = $provide_price + 150;
                break;
            case  $provide_price <= 2000 :
                $shop_price = $provide_price + 200;
                break;
            case  $provide_price <= 3000 :
                $shop_price = $provide_price + 300;
                break;
            case  $provide_price <= 5000 :
                $shop_price = $provide_price + 400;
                break;
            case  $provide_price <= 10000 :
                $shop_price = $provide_price + 500;
                break;
            case  $provide_price > 10000 :
                $shop_price = $provide_price + 600;
                break;
        }
        return $shop_price;
    }
}
