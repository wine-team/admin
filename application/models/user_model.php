<?php
class User_model extends CI_Model
{
    private $table   = 'user';

    public function findById($uid)
    {
        $this->db->where('uid', $uid);
        return $this->db->get($this->table);
    }

    /**
     * 根据条件搜索
     * @param unknown $param
     */
    public function findByParams($param=array())
    {
        if (!empty($param['parent_id'])) {
            $this->db->where('uid', $param['parent_id']);
        }
        return $this->db->get($this->table);
    }

    public function total($params=array())
    {
        $this->db->from($this->table);
        if (!empty($params['username'])) {
            $this->db->where("((`user`.`uid`='%{$params['username']}%') OR (`user`.`alias_name` LIKE '%{$params['username']}%'))");
        }
        if (!empty($params['phone'])) {
            $this->db->where('phone', $params['phone']);
        }
        if (!empty($params['email'])) {
            $this->db->where('email', $params['email']);
        }
        if (!empty($params['parent_id'])) {
            $this->db->where('parent_id', $params['parent_id']);
        }
        if (!empty($params['flag'])) {
        	$this->db->where('flag', $params['flag']);
        }
        if (!empty($params['start_time'])) {
            $this->db->where('created_at >=',$params['start_time']);
        }
        if (!empty($params['end_time'])) {
            $this->db->where('created_at <=',$params['end_time']);
        }
        return $this->db->count_all_results();
    }

    public function page_list($page_num, $num, $params=array())
    {
        $this->db->from($this->table.' as user');
        if (!empty($params['username'])) {
            $this->db->where("((`user`.`uid`='%{$params['username']}%') OR (`user`.`alias_name` LIKE '%{$params['username']}%'))");
        }
        if (!empty($params['phone'])) {
            $this->db->where('phone', $params['phone']);
        }
        if (!empty($params['email'])) {
            $this->db->where('email', $params['email']);
        }
        if (!empty($params['parent_id'])) {
            $this->db->where('parent_id', $params['parent_id']);
        }
        if (!empty($params['flag'])) {
        	$this->db->where('flag',$params['flag']);
        }
        if (!empty($params['start_time'])) {
        	$this->db->where('created_at >=',$params['start_time']);
        }
        if (!empty($params['end_time'])) {
        	$this->db->where('created_at <=',$params['end_time']);
        }
        $this->db->order_by('user.uid', 'DESC');
        $this->db->limit($page_num, $num);
        return $this->db->get();
    }

    public function insert($postData)
    {
        $data = array(
            'alias_name'   => $postData['alias_name'],
            'phone'         => $postData['phone'],
            'email'         => !empty($postData['email']) ? $postData['email'] : '',
            'password'     => md5(sha1($postData['password'])),
            'sex'           => $postData['sex'],
            'user_money'   => $postData['user_money'],
            'frozen_money' => $postData['frozen_money'],
            'pay_points'   => $postData['pay_points'],
            'parent_id'    => !empty($postData['parent_id']) ? $postData['parent_id'] : 0,
            'flag'          => 1,
            'sms'           => !empty($postData['sms']) ? $postData['sms'] : 1,
            'created_at'   => date('Y-m-d H:i:s')
        );
        if (!empty($params['birthday'])) {
            $data['birthday'] = $params['birthday'];
        }
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($postData)
    {
        $data = array(
            'alias_name'   => $postData['alias_name'],
            'phone'         => $postData['phone'],
            'email'         => !empty($postData['email']) ? $postData['email'] : '',
            'sex'           => $postData['sex'],
            'user_money'   => $postData['user_money'],
            'frozen_money' => $postData['frozen_money'],
            'pay_points'   => $postData['pay_points'],
            'parent_id'    => !empty($postData['parent_id']) ? $postData['parent_id'] : 0,
            'flag'          => 1,
            'sms'           => !empty($postData['sms']) ? $postData['sms'] : 1,
            'created_at'   => date('Y-m-d H:i:s')
        );
        if (!empty($params['password'])) {
            $data['password'] = md5(sha1($postData['password']));
        }
        if (!empty($params['birthday'])) {
            $data['birthday'] = $params['birthday'];
        }
        return $this->db->update($this->table, $data, array('uid'=>$postData['uid']));
    }

    /**
     * 更新用户表信息
     * @param unknown $postData
     */
    public function updateUser($postData = array())
    {
        if (!empty($postData['flag'])) {
            $data['flag'] = $postData['flag'];
        }
        return $this->db->update($this->table, $data, array('uid'=>$postData['uid']));
    }

    /**
     * 验证手机号码
     * @param unknown $phone
     */
    public function validatePhone($phone)
    {
        $this->db->where('phone', $phone);
        return $this->db->get($this->table);
    }

    /**
     * 验证用户邮箱
     * @param unknown $email
     */
    public function validateEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get($this->table);
    }
}