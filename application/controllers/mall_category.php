<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mall_category extends MJ_Controller {

	public function _init()
	{
	    $this->load->library('pagination');
	    $this->load->model('mall_category_model','mall_category');
	}

	public function grid()
	{
	    $data['res'] = $this->mall_category->findById(array())->result();
	    $this->load->view('mall_category/grid', $data);
	}
	
	public function add()
	{
	    $data['one_res'] = $this->mall_category->findById(array('parent_id'=>0))->result();
	    $data['two_res'] = array();
	    $cat_ids = array();
	    foreach($data['one_res'] as $r)
	    {
	        $cat_ids[] = $r->cat_id;
	    }
	    if (!empty($cat_ids))
	    {
	        $data['two_res'] = $this->mall_category->getWherein('parent_id',$cat_ids)->result();
	    }
	    $this->load->view('mall_category/add', $data);
	}
	
	public function addPost()
	{
// 	    $error = $this->validate(); 
// 	    if (!empty($error))
// 	    {
// 	        $this->error('mall_category/add', $this->input->post('id'), $error);
// 	    }
	    $postData = $this->input->post();
	    $data['parent_id'] = $postData['one_p_id'] ? ($postData['two_p_id'] ? $postData['two_p_id'] : $postData['one_p_id']) : 0;
	    $data['cat_name'] = $postData['cat_name'];
	    $data['is_show'] = $postData['is_show'];
	    $data['sort_order'] = $postData['sort_order'];
	    $data['filter_attr'] = $postData['filter_attr'];
	    $res = $this->mall_category->insert($data);
	    if ($res) {
	        $this->success('mall_category/grid', '', '新增成功！');
	    } else {
	        $this->error('mall_category/add', '', '新增失败！');
	    }
	}
	
	public function edit($id)
	{
	    $res = $this->mall_category->findById(array('id'=>$id));
	    if ($res->num_rows() > 0)
	    {
	        $data['res'] = $res->row();
	        $this->load->view('mall_category/edit',$data);
	    } else {
	        $this->redirect('mall_category/grid');
	    }
	}
	
	public function editPost()
	{
	    $error = $this->validate();
        if (!empty($error))
        {
            $this->error('mall_category/edit', $this->input->post('id'), $error);
        }
        $postData = $this->input->post();
        $data['title'] = $postData['title'];
        $data['sub_title'] = $postData['sub_title'];
        $data['author'] = $postData['author'];
        $data['help_info'] = $postData['help_info'];
        $res = $this->mall_category->update(array('id'=>$postData['id']), $data);
        if ($res) {
            $this->success('mall_category/grid', '', '修改成功！');
        } else {
            $this->error('mall_category/edit', $this->input->post('id'), '修改失败！');
        }
	}
	
	public function delete($id)
	{
	    $is_delete = $this->mall_category->delete(array('id'=>$id));
	    if ($is_delete) {
	        $this->success('mall_category/grid', '', '删除成功！');
	    } else {
	        $this->error('mall_category/grid', '', '删除失败！');
	    }
	}
	
	public function validate()
	{
	    $error = array();
        if ($this->validateParam($this->input->post('sub_title')))
        {
            $error[] = '标题不能为空';
        }
        if ($this->validateParam(strip_tags($this->input->post('help_info'))))
        {
            $error[] = '内容不能为空';
        }
	    return $error;
	}
	
}
/** End of file Mall_category.php */
/** Location: ./application/controllers/Mall_category.php */
