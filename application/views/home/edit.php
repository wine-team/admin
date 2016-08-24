<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">修改个人信息<small> 修改个人信息</small></h3>
            <?php echo breadcrumb(array('修改个人信息')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>修改个人信息</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal line-form" action="<?php echo base_url('home/editPost') ?>" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label"><em>* </em>用户名</label>
                            <div class="controls">
                                <input type="hidden" name="id" value="<?php echo $this->uid ?>">
                                <input type="text" name="name" readonly="readonly" class="m-wrap large" value="<?php echo $this->admin_name ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">真实姓名</label>
                            <div class="controls">
                                <input type="text" name="realname" class="m-wrap large" value="<?php echo $this->realname ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>邮箱地址</label>
                            <div class="controls">
                                <input type="text" class="m-wrap large required email" name="email" value="<?php echo $this->admin_email ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">修改密码</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <input type="checkbox" name="modify_password" value="1" /> 
                                </label>
                            </div>
                        </div>
                        <div class="modify-password-new" style="display: none;">
                            <div class="control-group">
                                <label class="control-label"><em>* </em>旧密码</label>
                                <div class="controls">
                                    <input type="password" class="m-wrap large required" name="old_password" /> 
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><em>* </em>新密码</label>
                                <div class="controls">
                                    <input type="password" id="password" class="m-wrap large required" minlength="6" name="password" /> 
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><em>* </em>确认密码</label>
                                <div class="controls">
                                    <input type="password" class="m-wrap large required" minlength="6" equalTo="#password" name="confirm_password" /> 
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green" type="submit"><i class="icon-ok"></i> 保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer');?>
<script type="text/javascript">
    $(function(){
        $('input[name=modify_password]').click(function(){
            if ($(this).is(':checked')) {
                $('.modify-password-new').show();
            } else {
                $('.modify-password-new').hide();
            }
        });
    });
</script>