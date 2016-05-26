<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">商品管理 <small>属性管理</small></h3>
             <?php echo breadcrumb(array('商品管理','商品类型'=>'mall_goods_type/grid','mall_attribute/grid'=>'属性管理','添加属性')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>编辑</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal line-form" action="<?php echo base_url('mall_attribute/editPost') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="attr_id" value="<?php echo $res->attr_id;?>" >
                       
                        <div class="control-group">
                            <label class="control-label"><em>* </em>属性名称</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large required" name="attr_name" value="<?php echo $res->attr_name;?>"/> 
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>所属商品类型</label>
                            <div class="controls">
                                <select name="type_id" class="m-wrap large required">
                                    <?php foreach($type as $t) :?>
                                    <option <?php if($res->type_id == $t->type_id)echo 'selected="selected"';?> value="<?php echo $t->type_id?>"><?php echo $t->type_name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>属性类型</label>
                            <div class="controls">
                            	<label class="radio">
                                	<input type="radio" class="required" name="attr_type" value="1" <?php if($res->attr_type==1) echo 'checked="checked"';?>/>唯一属性
                                </label>
                                <label class="radio">
                                	<input type="radio" class="required" name="attr_type" value="2" <?php if($res->attr_type==2) echo 'checked="checked"';?>/> 单选属性
                                </label>
                                <label class="radio">
                                	<input type="radio" class="required" name="attr_type" value="3" <?php if($res->attr_type==3) echo 'checked="checked"';?>/> 复选属性
                                </label>
                                <span class="help-block">1唯一属性 2单选属性 3复选属性 （选择"单选/复选属性"时，可以对商品该属性设置多个值，同时还能对不同属性值指定不同的价格加价，用户购买商品时需要选定具体的属性值。选择"唯一属性"时，商品的该属性值只能设置一个值，用户只能查看该值。）</span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>可选值</label>
                            <div class="controls">
                                <textarea class="m-wrap large required" name="attr_values"><?php echo $res->attr_values;?></textarea>
                                <span class="help-block">请用英文逗号隔开</span>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>检索</label>
                            <div class="controls">
                            	<label class="radio">
                                	<input type="radio" class="required" name="attr_index" value="1" <?php if($res->attr_index==1) echo 'checked="checked"';?> />不需要检索
                                </label>
                                <label class="radio">
                                	<input type="radio" class="required" name="attr_index" value="2" <?php if($res->attr_index==2) echo 'checked="checked"';?> />关键字检索
                                </label>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>是否关联相同属性值的商品</label>
                            <div class="controls">
                            	<label class="radio">
                                	<input type="radio" class="required" name="is_linked" value="1" <?php if($res->is_linked==1) echo 'checked="checked"';?> />关联
                                </label>
                                <label class="radio">
                                	<input type="radio" class="required" name="is_linked" value="2" <?php if($res->is_linked==2) echo 'checked="checked"';?>/>不关联
                                </label>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><em>* </em>排序</label>
                            <div class="controls">
                                <input type="number" class="m-wrap large required" name="sort_order" value="<?php echo $res->sort_order;?>"/> 
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button class="btn green" type="submit"><i class="icon-ok"></i> 保存</button>
                            <a href="<?php echo base_url('mall_attribute/grid') ?>">
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