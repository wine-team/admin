<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">商品管理<small>商品类型</small></h3>
            <?php echo breadcrumb(array('商品管理', 'mall_attribute_set/grid/'.$attr_set_id=>'商品类型', '添加属性组')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>添加属性组</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal line-form" action="<?php echo base_url('mall_attribute_group/addPost') ?>" method="post" enctype ="multipart/form-data" >
                        <input type="hidden" name="attr_set_id" value="<?php echo $attr_set_id;?>">
                        <div class="control-group">
                            <label class="control-label"><em>* </em>组名</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large required" name="group_name" value="" maxlength=20 /> 
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>排序</label>
                            <div class="controls">
                                <input type="number" class="m-wrap large required" name="sort" value="0" maxlength=3 /> 
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button class="btn green" type="submit"><i class="icon-ok"></i> 保存</button>
                            <a href="<?php echo base_url('mall_attribute_group/grid?attr_set_id='.$attr_set_id) ?>">
                                <button class="btn" type="button">返回</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer');?>