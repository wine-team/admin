<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">快递管理<small> 快递订单记录</small></h3>
            <?php echo breadcrumb(array('快递管理', '快递订单记录')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-search"></i>搜索</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-search" action="<?php echo base_url('deliver_order/grid') ?>" method="get">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">订单搜索</label>
                                    <div class="controls">
                                        <input type="text" name="order_search" value="<?php echo $this->input->get('order_search')?>" class="m-wrap medium" placeholder="搜索订单编号或者用户UID">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">快递搜索</label>
                                    <div class="controls">
                                        <input type="text" name="deliver_search" value="<?php echo $this->input->get('deliver_search')?>" class="m-wrap medium" placeholder="搜索快递名称或者快递单号">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">快递状态</label>
                                    <div class="controls">
                                        <select name="ischeck" class="m-wrap medium">
                                            <option value="">请选择</option>
                                            <?php foreach ($ischeck as $kk=>$vv):?>
                                                <option value="<?php echo $kk;?>" <?php if ($this->input->get('ischeck')==$kk):?>selected="selected"<?php endif;?>><?php echo $vv;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green" type="submit">搜索</button>
                            <button class="btn reset_button_search" type="button">重置条件</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-reorder"></i>列表</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <div class="dataTables_wrapper form-inline">
                        <?php if ($all_rows > 0) :?>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                        <th width="15"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"></th>
                                        <th>编号</th>
                                        <th>订单编号</th>
                                        <th>用户UID</th>
                                        <th>快递名称</th>
                                        <th>快递单号</th>
                                        <th>状态</th>
                                        <th>添加时间</th>
                                        <th width="100">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($page_list->result() as $item) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkboxes" value="1" ></td>
                                        <td><?php echo $item->deliver_order_id;?></td>
                                        <td><?php echo $item->order_id;?></td>
                                        <td><?php echo $item->uid;?></td>
                                        <td><?php echo $item->deliver_name;?></td>
                                        <td><?php echo $item->deliver_number;?></td>
                                        <td><?php echo $ischeck[$item->ischeck];?></td>
                                        <td><?php echo $item->created_at;?></td>
                                        <td>
                                            <a href="<?php echo base_url('deliver_order/edit/'.$item->deliver_order_id) ?>" class="btn mini green">详情</a>
                                            <a href="<?php echo base_url('deliver_order/delete/'.$item->deliver_order_id) ?>" class="btn mini green" onclick="return confirm('确定要删除？')">删除</a><p></p>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php $this->load->view('layout/pagination');?>
                        <?php else: ?>
                            <div class="alert"><p>未找到数据。<p></div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer');?>