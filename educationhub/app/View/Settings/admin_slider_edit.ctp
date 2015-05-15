<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script>
    
    tinymce.init({selector: 'textarea#EXText'});
    
</script>
<?php echo $this->Html->script('/js/jquery-input.min.js'); ?>
<div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Edit slider'); ?></h2>
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
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Sliders list'), array('controller' => 'settings','action' => 'sliders','admin'=>true), array('escape' => false)); ?></li>
                        <li>
                            <?php
                             echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> &nbsp;&nbsp;Delete', array('controller'=>'settings','action' => 'slider_delete',$this->Form->value('Slider.id')), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete\n%s?", $this->Form->value('Slider.header')));
                             ?>
                        </li>
                    </ul>
                </div><!-- end body -->
            </div><!-- end panel -->
        </div><!-- end actions -->
    </div>
    <div class="col-md-9">
        <?php echo $this->Form->create('Slider',array('enctype'=>"multipart/form-data")); ?>
        <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
        <div class="form-gropu">
            <?php echo $this->Form->input('header',array('type'=>'text','class'=>'form-control','label'=>'Header')); ?>
        </div>
        <div class="form-gropu">
            <?php echo $this->Form->input('button_text',array('type'=>'text','class'=>'form-control','label'=>'Button text')); ?>
        </div>
        <div class="form-gropu">
            <?php echo $this->Form->input('link',array('type'=>'text','class'=>'form-control','label'=>'Url')); ?>
        </div>
        <div class="form-group">
                <?php echo $this->Form->input('content', array('id'=>'EXText','class' => 'form-control', 'label' => 'Content', 'type' => 'textarea', 'style'=>'height: 400px;'));?>
            </div>
        <br/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="SliderButtonText">Background 1</label>
                        </div>
                    </div>
                    <?php if($this->Form->value('Slider.image1')){ ?>
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo $this->Html->image('sliders/'.$this->Form->value('Slider.image1'),array('style'=>'max-width: 300px; max-height: 300px;')); ?>
                            <?php
                             echo $this->Html->Link('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'settings','action' => 'slider_delete_image',$this->Form->value('Slider.id'),'?'=>array('image'=>'image1')), array('escape' => false,'title'=>'Delete image','class'=>'link_delete_image','confirm' => 'Are you sure you want to delete iamge ?'));
                             ?>

                        </div>
                    </div> <br/>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->Form->image('img_file1',array('name'=>'data[img_file1]','id'=>'fileimg1','accept'=>'image/*', 'class'=>'form-control','type'=>'file','data-buttonBefore'=>'true')); ?>
                            <?php //echo $this->Form->image('image1',array('id'=>'fileimg1','accept'=>'image/*', 'class'=>'form-control','type'=>'file','data-buttonBefore'=>'true')); ?>
                        </div>
                    </div>                    
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="SliderButtonText">Background 2</label>
                        </div>
                    </div>
                    <?php if($this->Form->value('School.logo')){ ?>
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo $this->Html->image('sliders/'.$this->Form->value('School.logo'),array('style'=>'max-width: 300px; max-height: 300px;')); ?>
                            <?php
                             echo $this->Html->Link('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'institut','action' => 'delete_logo',$this->Form->value('School.id'),'?'=>array('image'=>'logo')), array('escape' => false,'title'=>'Delete logo','class'=>'link_delete_image','confirm' => 'Are you sure you want to delete logo ?'));
                             ?>
                        </div>
                    </div> <br/>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->Form->image('img_file2',array('name'=>'data[img_file2]','id'=>'fileimg2','accept'=>'image/*', 'class'=>'form-control','type'=>'file','data-buttonBefore'=>'true')); ?>
                            <?php //echo $this->Form->image('image2',array('id'=>'fileimg2','accept'=>'image/*', 'class'=>'form-control','type'=>'file','data-buttonBefore'=>'true')); ?>
                        </div>
                    </div>                    
                </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Save'),array('class'=>'btn btn-default')); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
    $(":file").filestyle({buttonBefore: true});
    $("[for='fileimg1']").html("<span class='glyphicon glyphicon-file'></span> Select the image");
    $(":file").filestyle({buttonBefore: true});
    $("[for='fileimg2']").html("<span class='glyphicon glyphicon-file'></span> Select the image");
</script>