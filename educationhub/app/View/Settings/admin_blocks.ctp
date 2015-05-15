<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script>
    
    tinymce.init({selector: 'textarea#BlockContent'});
	
</script>
<div class="pages form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Block - "'.$this->Form->value('Block.title').'"'); ?></h2>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Pages</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
							<?php foreach ($listBlock as $id=>$title) { ?>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;'.$title), array('controller'=>'settings', 'action' => 'blocks','admin'=>true,$id),array('escape'=>false,''));?>
                            </li>
                          	<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <?php echo $this->Form->create('Block'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('Block.id', array('type'=>'hidden'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Block.title', array('class' => 'form-control', 'placeholder' => 'write a title', 'label'=>'Title'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Block.content', array('id'=>'BlockContent','class' => 'form-control', 'label' => 'Content', 'type' => 'textarea', 'style'=>'height: 400px;'));?>
            </div>
            
             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
    </div>      
</div>