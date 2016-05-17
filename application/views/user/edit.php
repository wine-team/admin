<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">用户管理<small> 编辑用户</small></h3>
            <?php echo breadcrumb(array('用户管理', 'user/grid'=>'用户列表', '编辑用户')); ?>
        </div>
    </div>
    <div class="alert alert-error" style="display: none;">
        <button data-dismiss="alert" class="close"></button>
        <a href="javascript:;" class="glyphicons no-js remove_2"><i></i><p></p></a>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>编辑用户</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal user-form" action="<?php echo base_url('user/addPost') ?>" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label"><em>* </em>用户昵称</label>
                            <div class="controls">
                                <input type="hidden" name="uid" value="<?php echo $row->uid;?>"/>
                                <input type="text" name="alias_name" class="m-wrap large"  value="<?php echo $row->alias_name;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>手机号码</label>
                            <div class="controls">
                                <input type="text" name="phone" value="<?php echo $row->phone;?>" maxlength="11" class="m-wrap large number required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">邮箱地址</label>
                            <div class="controls">
                                <input type="text" name="email" value="<?php echo $row->email;?>" class="m-wrap large chkemail">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">可用资金</label>
                            <div class="controls">
                                <input type="text" name="user_money" value="<?php echo $row->user_money;?>" class="m-wrap large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">冻结资金</label>
                            <div class="controls">
                                <input type="text" name="frozen_money" value="<?php echo $row->frozen_money;?>" class="m-wrap large">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">消费积分</label>
                            <div class="controls">
                                <input type="text" name="pay_points" value="<?php echo $row->pay_points;?>" class="m-wrap large">
                            </div>
                        </div>
                        <div class="control-group add-supplieruid-html">
                            <label class="control-label"><em>* </em>父级序号</label>
                            <div class="controls">
                                 <input type="text" name="parent_id" class="m-wrap medium supplieruid tooltips number" data-original-title="双击可弹框选择供应商；直接输入‘用户名称或编号’可提示" data-trigger="hover" value="<?php echo $row->parent_id;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>用户密码</label>
                            <div class="controls">
                                <input type="text" name="pw" class="m-wrap large required"  value="<?php echo $row->phone;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">性别</label>
                            <div class="controls">
                                <input type="text" name="pw" class="m-wrap large required"  value="<?php echo $row->phone;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">出生日期</label>
                            <div class="controls">
                                <input type="text" name="pw" class="m-wrap large required"  value="<?php echo $row->phone;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>帐号状态</label>
                            <div class="controls">
                                <select name="flag">
                                    <option value="1" <?php if($row->flag==1):?>selected="selected"<?php endif;?> >正常</option>
                                    <option value="2" <?php if($row->flag==2):?>selected="selected"<?php endif;?>>冻结</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">是否发送短信</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <input type="checkbox" name="sms" value="<?php echo $row->sms;?>" <?php if($row->sms==1):?>checked="checked"<?php endif;?> > 只针对他网支付这种情况
                                </label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green" type="submit"><i class="icon-ok"></i> 保存</button>
                            <a href="<?php echo base_url('user/grid') ?>">
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
<?php $this->load->view('user/addSupplierUid/ajaxGetUser');?>
<script type="text/javascript" >
    $('form.user-form').submit(function(){
        return false;
    }).validate({
        rules: {
            user_name: {
                required: true,
                remote: {
                    url:hostUrl()+'/user/validateName',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        user_name:function(json) {
                            return $('input[name=user_name]').val();
                        },
                        uid:function(json) {
                            return $('input[name=uid]').val();
                        }
                    }
                }
            },
            mobile_phone: {
                required: true,
                remote: {
                    url:hostUrl()+'/user/validateMobilePhone',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        mobile_phone:function(json) {
                            return $('input[name=mobile_phone]').val();
                        },
                        uid:function(json) {
                            return $('input[name=uid]').val();
                        }
                    }
                }
            }
        },
        messages: {
            user_name: {
                required: '请输入您的用户名',
                remote: '修改的用户名已存在'
            },
            mobile_phone: {
                required: '请输入您的手机号码',
                mobile: '手机格式错误',
                remote: '修改的手机已注册'
            }
        },
        submitHandler: function(f) {
            $.ajax({
                type: 'post',
                async: true,
                dataType : 'json',
                url: hostUrl() + '/user/ajaxVaildate',
                data: $('form.user-form').serialize(),
                success: function(data) {
                    if (data.status) {
                        $('.alert-error').hide();
                        window.location.href = '<?php echo base_url('user/grid')?>';
                    } else {
                        $('.alert-error').show();
                        $('.remove_2 p').html(data.message);
                        var body = (window.opera) ? (document.compatMode == 'CSS1Compat' ? $('html') : $('body')) : $('html,body');
                        body.animate({scrollTop: $('.page-container').offset().top}, 1000);
                    }
                }
            });
        }
    });
</script>
