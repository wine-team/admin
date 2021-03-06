<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">网站设置 <small>所有网站设置</small></h3>
            <?php echo breadcrumb(array('网站设置', 'help_category/grid'=>'帮助中心', '添加帮助')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>添加帮助</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal line-form" action="<?php echo base_url('help_category/addPost') ?>" method="post" >
                        <div class="control-group">
                            <label class="control-label"><em>* </em>帮助类名</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large required" name="help_category_name" value=""/> 
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>栏目</label>
                            <div class="controls">
                                <select name="flag" class="medium m-wrap required">
                                     <option value="">请选择栏目</option>
                                     <?php foreach ($menuArray as $key=>$value) : ?>
                                     <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                     <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>排序</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large required" name="sort"  placeholder="越大越前" value="1"/> 
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green" type="submit"><i class="icon-ok"></i> 保存</button>
                            <a href="<?php echo base_url('help_center/grid') ?>">
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