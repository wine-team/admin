<div class="modal-header">
    <button aria-hidden="true" data-dismiss="modal" class="close" type="button"></button>
    <h3>选择供应商</h3>
</div>
<div class="modal-body">
    <div class="well">
        <form class="form-horizontal ajaxSearch">
            <span>用户昵称 <input type="text" name="username" value="<?php echo $this->input->get('username');?>" placeholder="用户UID或昵称" class="m-wrap small"></span>
            <span>手机号 <input type="text" name="phone" value="<?php echo $this->input->get('phone');?>" placeholder="手机号" class="m-wrap small"></span>
            <span>邮箱 <input type="text" name="email" value="<?php echo $this->input->get('email');?>" placeholder="邮箱" class="m-wrap small"></span>
            <span>
                <select name="flag" class="m-wrap small">
                    <option value="">全部状态</option>
                    <?php foreach (array('1'=>'正常', '2'=>'已冻结') as $key=>$value) :?>
                    <option value="<?php echo $key;?>" <?php if ($key == $this->input->get('flag')):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                    <?php endforeach;?>
                </select>
            </span>
            <button class="btn green"><i class="icon-search"></i> 搜索</button>
        </form>
    </div>
    <?php if ($page_list->num_rows() > 0) :?>
        <table class="table table-striped table-bordered table-hover">
            <thead class="flip-content">
                <tr>
                    <th width="30">选择</th>
                    <th width="40">编号</th>
                    <th>用户昵称</th>
                    <th>手机</th>
                    <th>邮箱</th>
                    <th>上级</th>
                    <th>注册时间</th>
                    <th>状态</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($page_list->result() as $item) : ?>
                <tr>
                    <td><input type="radio" name="uid" value="<?php echo $item->uid?>"></td>
                    <td><?php echo $item->uid;?></td>
                    <td><?php echo $item->alias_name;?></td>
                    <td><?php echo $item->phone;?></td>
                    <td><?php echo $item->email;?></td>
                    <td><?php echo $item->parent_id;?></td>
                    <td><?php echo $item->created_at;?></td>
                    <td><?php echo $item->flag==1 ? '正常' : '已冻结';?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="dataTables_info">
            <span>当前第</span><span style="color: red"><?php echo $pg_now?></span>页 
            <span>共</span><span style="color: red"><?php echo $all_rows?></span>条数据
            <span>每页显示10条 </span>
            <?php echo $pg_list ?>
        </div>
    <?php else : ?>
        <div class="alert"><p>未找到数据。<p></div>
    <?php endif;?>
</div>
<div class="modal-footer"></div>