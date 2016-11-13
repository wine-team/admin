<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">新闻管理 <small>新闻管理 </small></h3>
            <?php echo breadcrumb(array('新闻管理', '妙处网公告列表')); ?>
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
                    <form class="form-horizontal form-search" action="<?php echo base_url('newscontent/search') ?>" method="get">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">公告标题</label>
                                    <div class="controls">
                                        <input type="text" name="title" value="<?php echo $this->input->get('title');?>" placeholder="搜索公告标题" class="m-wrap medium">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">所属分类</label>
                                    <div class="controls">
                                        <select name="class_id" class="medium m-wrap">
                                            <option value="">请选择</option>
                                            <?php foreach ($newsclass->result() as $item): ?>
                                            <option <?php if ($this->input->get('class_id') == $item->class_id):?>selected="selected"<?php endif;?> value="<?php echo $item->class_id;?>"><?php echo $item->class_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">是否发布</label>
                                    <div class="controls">
                                        <select name="status" class="medium m-wrap">
                                            <option value="">请选择</option>
                                            <?php foreach (array(1=>'已发布', 2=>'未发布') as $k => $v): ?>
                                            <option <?php if ($this->input->get('status') == $k):?>selected="selected"<?php endif;?> value="<?php echo $k?>"><?php echo $v;?></option>
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
                        <div class="clearfix">
                            <a href="<?php echo base_url('newscontent/add') ?>" class="add-button-link">
                                <div class="btn-group">
                                    <button class="btn green"><i class="icon-plus"></i> 添加</button>
                                </div>
                            </a>
                        </div>
                        <?php if ($all_rows > 0) :?>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead class="flip-content">
                                <tr>
                                    <th width="20"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"></th>
                                    <th width="50">编号</th>
                                    <th>新闻标题</th>
                                    <th>所属分类</th>
                                    <th>是否发布</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($page_list->result() as $item) : ?>
                                <tr>
                                    <td width="20"><input type="checkbox" class="checkboxes" value="1" ></td>
                                    <td width="50"><?php echo $item->id;?></td>
                                    <td><?php echo $item->title;?></td>
                                    <td><?php echo $item->class_name;?></td>
                                    <td><?php echo $item->nstatus == 1 ? '已发布' : '未发布';?></td>
                                    <td><?php echo date('Y-m-d H:i:s', $item->create_time);?></td>
                                    <td>
                                        <a class="btn mini green" href="<?php echo base_url('newscontent/edit/'.$item->id) ?>"><i class="icon-edit"></i> 编辑</a>
                                        <a class="btn mini green" href="<?php echo base_url('newscontent/delete/'.$item->id) ?>" onclick="return confirm('确定要删除？')"><i class="icon-trash"></i> 删除</a>
                                        <a class="btn mini green" href="<?php echo base_url('newscontent/images/'.$item->id) ?>"> 图片管理</a>
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