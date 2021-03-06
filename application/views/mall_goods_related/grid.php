<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">商品管理 <small>关联产品</small></h3>
            <?php echo breadcrumb(array('mall_goods_base/grid'=>'商品管理','mall_goods_related/grid' => '关联产品')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-reorder"></i>列表</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-search" action="<?php echo base_url('mall_goods_related/grid');?>" method="get">
                        <div class="row-fluid">
                            <div class="span5">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" name="goods_id" value="<?php echo trim($this->input->get('goods_id'));?>" placeholder="产品ID" class="m-wrap medium">
                                    </div>
                                </div>
                            </div>
                             <div class="span5">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" name="related_goods_id" value="<?php echo trim($this->input->get('related_goods_id'));?>" placeholder="被关联产品编号" class="m-wrap medium">
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
                <div class="portlet-body flip-scroll">
                    <div class="dataTables_wrapper form-inline">
                        <div class="clearfix">
                            <a href="<?php echo base_url('mall_goods_related/add/') ?>" class="add-button-link">
                                <div class="btn-group">
                                    <button class="btn green"><i class="icon-plus"></i> 添加</button>
                                </div>
                            </a>
                        </div>
                        <?php if ($goods_related->num_rows() > 0) :?>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead class="flip-content">
                                <tr>
                                    <th><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"></th>
                                    <th>编号</th>
                                    <th>商品ID</th>
                                    <th>关联商品ID</th>
                                    <th>是否双向关联</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($goods_related->result() as $r) : ?>
                                <tr>
                                    <td width="15"><input type="checkbox" class="checkboxes" value="1" ></td>
                                    <td><?php echo $r->related_id;?></td>
                                    <td><?php echo $r->goods_id;?></td>
                                    <td><?php echo $r->related_goods_id;?></td>
                                    <td><?php echo $r->is_double==1 ?  '是' : '否';?></td>
                                    <td width="145">
                                        <a class="btn mini green" href="<?php echo base_url('mall_goods_related/edit/'.$r->related_id);?>">修改</a>
                                        <a class="btn mini green" href="<?php echo base_url('mall_goods_related/delete/'.$r->related_id.'?goods_id='.$r->goods_id);?>" onclick="return confirm('确定要删除？')">删除</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="dataTables_info">
                                    <span>当前第</span><span style="color: red"><?php echo $pg_now?></span>页 
                                    <span>共</span><span style="color: red"><?php echo $all_rows?></span>条数据
                                    <span>每页显示20条 </span>
                                    <?php echo $pg_link ?>
                                </div>
                            </div>
                        </div>
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