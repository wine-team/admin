<?php
class Deliver_order extends CS_Controller
{
    public function _init()
    {
        $this->load->library('pagination');
        $this->load->model('deliver_order_model', 'deliver_order');
    }

    public function grid($pg = 1)
    {
        $page_num = 20;
        $num = ($pg-1)*$page_num;
        $config['first_url'] = base_url('deliver_order/grid').$this->pageGetParam($this->input->get());
        $config['suffix'] = $this->pageGetParam($this->input->get());
        $config['base_url'] = base_url('deliver_order/grid');
        $config['total_rows'] = $this->deliver_order->total($this->input->get());
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pg_link'] = $this->pagination->create_links();
        $data['page_list'] = $this->deliver_order->page_list($page_num, $num, $this->input->get());
        $data['all_rows'] = $config['total_rows'];
        $data['pg_now'] = $pg;
        $data['page_num'] = $page_num;
        $data['ischeck'] = array('0'=>'在途', '1'=>'揽件', '2'=>'疑难', '3'=>'签收');
        $this->load->view('deliver_order/grid', $data);
    }

    public function edit($deliver_order_id)
    {
        $result = $this->deliver_order->findByDeliverOrderId($deliver_order_id);
        if ($result->num_rows() <= 0) {
            $this->error('deliver_order/grid', '', '运费详情出错。');
        }
        $data['deliverOrder'] = $result->row(0);
        $data['ischeck'] = array('0'=>'在途', '1'=>'揽件', '2'=>'疑难', '3'=>'签收');
        $data['state'] = array('0'=>'在途中', '1'=>'已揽收', '2'=>'疑难', '3'=>'已签收', '4'=>'退签', '5'=>'同城派送中', '6'=>'退回', '7'=>'转单');
        $this->load->view('deliver_order/edit', $data);
    }

    public function delete($deliver_order_id)
    {
        $is_delete = $this->deliver_order->deleteById($deliver_order_id);
        if ($is_delete) {
            $this->success('deliver_order/grid', '', '删除成功！');
        } else {
            $this->error('deliver_order/grid', '', '删除失败！');
        }
    }
}