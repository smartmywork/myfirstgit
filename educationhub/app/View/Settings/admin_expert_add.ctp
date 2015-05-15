<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script>
    
    tinymce.init({selector: 'textarea#EXText'});
    
</script>
<?php echo $this->Html->script('/js/jquery-input.min.js'); ?>
<div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('New expert'); ?></h2>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-3">
        <div class="actions">
            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Expert list'), array('controller' => 'settings','action' => 'experst','admin'=>true), array('escape' => false)); ?></li>
                    </ul>
                </div><!-- end body -->
            </div><!-- end panel -->
        </div><!-- end actions -->
    </div>
    <div class="col-md-9">
        <?php echo $this->Form->create('Expert',array('enctype'=>"multipart/form-data")); ?>
        <div class="form-gropu">
            <?php echo $this->Form->input('name',array('type'=>'text','class'=>'form-control')); ?>
        </div>
        <div class="form-gropu">
            <?php echo $this->Form->input('cite',array('type'=>'text','class'=>'form-control')); ?>
        </div>
        <div class="form-group">
                <?php echo $this->Form->input('content', array('id'=>'EXText','class' => 'form-control', 'label' => 'Content', 'type' => 'textarea', 'style'=>'height: 400px;'));?>
            </div>
        <br/>
                <div class="form-group">
                    <!--<input type="file" class="form-control"   data-buttonBefore="true" name="data[img_file]" id="fileimg" accept="image/*" />-->
                    <?php echo $this->Form->image('img_file',array('name'=>'data[img_file]','id'=>'fileimg','accept'=>'image/*', 'class'=>'form-control','type'=>'file','data-buttonBefore'=>'true')); ?>
                </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Save'),array('class'=>'btn btn-default')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
    $(":file").filestyle({buttonBefore: true});
    $("[for='fileimg']").html("<span class='glyphicon glyphicon-file'></span> Select the file");
</script>