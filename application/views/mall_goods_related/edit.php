<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">商品管理 <small>关联产品</small></h3>
             <?php echo breadcrumb(array('商品管理','mall_goods_related/grid'=>'关联产品','mall_goods_related/edit/'.$goods_related->related_id=>'编辑关联产品')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>添加属性</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal line-form" action="<?php echo base_url('mall_goods_related/editPost') ?>" method="post" enctype ="multipart/form-data" >
                         <input type="hidden"  name="related_id"  value="<?php echo $goods_related->related_id;?>"/> 
                        <div class="control-group">
                            <label class="control-label"><em>* </em>商品ID</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large " name="goods_id"  value="<?php echo $goods_related->goods_id;?>" placeholder="商品ID"/> 
                            </div>
                        </div>
                        <div class="control-group add-goodsid-html">
                            <label class="control-label"><em>* </em>关联商品ID</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large related_goods_id" name="related_goods_id"  value="<?php echo $goods_related->related_goods_id;?>" placeholder="关联商品ID"/> 
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>是否双向关联</label>
                            <div class="controls">
                            	<label class="radio">
                                	<input type="radio" class="required" name="is_double" value="1" <?php if($goods_related->is_double==1):?>checked="checked"<?php endif;?>/>是
                                </label>
                                <label class="radio">
                                	<input type="radio" class="required" name="is_double" value="2" <?php if($goods_related->is_double==2):?>checked="checked"<?php endif;?>/>否
                            	</label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green" type="submit"><i class="icon-ok"></i> 保存</button>
                            <a href="<?php echo base_url('mall_brand/grid') ?>">
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