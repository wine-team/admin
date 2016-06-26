<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i>商品基本信息</div>
        <div class="tools">
            <a class="collapse" href="javascript:;"></a>
            <a class="remove" href="javascript:;"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <div class="control-group  show-category-name">
            <label class="control-label"><em>* </em>商品分类</label>
            <div class="controls">
                <input type="text" class="m-wrap span8" placeholder="商品分类" name="category_name" value="<?php echo count($category_name) ? implode(',',$category_name) : '';?>" disabled="disabled"/>
            </div>
            <div class="controls">
                <a class="btn red modify-category" href="javascript:;">修改商品分类</a>
            </div>
        </div>
        <div class="control-group category-edit" style="display:none;" >
            <label class="control-label">商品分类</label>
            <div class="controls">
                <select data-placeholder="输入商品分类"  name="category_id[]" class="chosen span12 m-wrap category-edit-select" multiple="multiple" tabindex="6">
                    <?php foreach ($category as $key=>$item):?>
                        <optgroup label="<?php echo $item['cat_name'];?>">
                            <?php foreach ($item['childCat'] as $i=>$jitem):?>
                                <option value="<?php echo $jitem['cat_id']?>"><?php echo $jitem['cat_name']?></option>
                            <?php endforeach;?>
                        </optgroup>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="controls">
                <a class="btn red cancel-modify-category" href="javascript:;">取消修改</a>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><em>* </em>商品属性</label>
            <div class="controls">
                <select name="attribute_set_id" class="span12 m-wrap valid" disabled="disabled">
                    <?php foreach ($attribute->result() as $key=>$value) : ?>
                        <option value="<?php echo $value->attr_set_id;?>" <?php if($value->attr_set_id==$mallgoods->attribute_set_id):?>selected="selected"<?php endif;?>><?php echo $value->attr_set_name;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><em>* </em>商品类别</label>
            <div class="controls">
                <select name="extension_code" class="span12 m-wrap valid">
                    <?php foreach ($extension as $key=>$val) : ?>
                        <option value="<?php echo $key;?>" <?php if( $key==$mallgoods->extension_code ):?>selected="selected"<?php endif;?>><?php echo $val;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><em>* </em>商品名称</label>
            <div class="controls">
                <input type="text" class="m-wrap span12 required" placeholder="商品名称" name="goods_name" value="<?php echo $mallgoods->goods_name;?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><em>* </em>商品编号</label>
            <div class="controls">
                <input type="text" class="m-wrap span12 required" placeholder="商品编号" name="goods_sku" value="<?php echo $mallgoods->goods_sku;?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">商品品牌</label>
            <div class="controls">
                <select name="brand_id" class="m-wrap span12">
                    <option value="0">请选择</option>
                    <?php if ($brand->num_rows() > 0) : ?>
                        <?php foreach ($brand->result() as $item) : ?>
                            <option value="<?php echo $item->brand_id ?>" <?php if($item->brand_id==$mallgoods->brand_id):?>selected="selected"<?php endif;?>><?php echo $item->brand_name ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label"><em>* </em>净重（kg）</label>
            <div class="controls">
                <input type="text" name="goods_weight" class="m-wrap span12 required number" placeholder="重量(kg)" value="<?php echo $mallgoods->goods_weight;?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><em>* </em>商品简介</label>
            <div class="controls">
                <textarea name="goods_brief" rows="4" class="m-wrap span12 required" placeholder="商品简介"><?php echo $mallgoods->goods_brief;?></textarea>
            </div>
        </div>
        <div class="control-group add-supplieruid-html">
            <label class="control-label"><em>* </em>供应商</label>
            <div class="controls">
                <input type="text" name="supplier_id" placeholder="供应商UID" class="m-wrap span12 supplieruid required tooltips" data-original-title="双击可弹框选择供应商；直接输入‘用户名称或编号’可提示" data-trigger="hover"  autocomplete="off" value="<?php echo $mallgoods->supplier_id;?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><em>* </em>审核状态</label>
            <div class="controls">
                <select class="m-wrap span12 number required" name="is_check">
                    <option value="1" <?php if(1==$mallgoods->is_check):?>selected="selected"<?php endif;?>>未审核</option>
                    <option value="2" <?php if(2==$mallgoods->is_check):?>selected="selected"<?php endif;?>>审核通过</option>
                    <option value="3" <?php if(3==$mallgoods->is_check):?>selected="selected"<?php endif;?>>审核拒绝</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><em>* </em>上下架</label>
            <div class="controls">
                <select class="m-wrap span12 required" name="is_on_sale">
                    <option value="1" <?php if(1==$mallgoods->is_on_sale):?>selected="selected"<?php endif;?>>上架</option>
                    <option value="2" <?php if(2==$mallgoods->is_on_sale):?>selected="selected"<?php endif;?>>下架</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><em>* </em>pc商品详情</label>
            <div class="controls">
                <textarea name="goods_desc"  class="textarea-multipart-edit m-wrap span12 required" placeholder="pc商品详情"><?php echo $mallgoods->goods_desc;?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><em>* </em>wap商品详情</label>
            <div class="controls">
                <textarea name="wap_goods_desc" class="textarea-multipart-edit m-wrap span12 required" placeholder="wap商品详情"><?php echo $mallgoods->wap_goods_desc;?></textarea>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn green step4" type="submit"><i class="icon-ok"></i> 保存</button>
            <a class="btn step3" href="<?php echo base_url('mall_goods_base/addstep1')?>">返回上一步</a>
        </div>
    </div>
</div>