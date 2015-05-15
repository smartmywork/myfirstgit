<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script>
    
    tinymce.init({
        selector: 'textarea#PageContent',
        plugins: ["image", "table",'link','textcolor'],
        toolbar: ["undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | forecolor backcolor"
                ]
});
	
</script>
<div class="pages form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Page - "'.$this->Form->value('Page.name').'"'); ?></h2>
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
							<?php foreach ($listPage as $page) { ?>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;'.$page['Page']['name']), array('controller'=>'settings', 'action' => 'pages','admin'=>true,$page['Page']['id']),array('escape'=>false,''));?>
                            </li>
                          	<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <?php echo $this->Form->create('Page'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('Page.id', array('type'=>'hidden'));?>
                <?php echo $this->Form->input('PageContent.id',array('type'=>'hidden')); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Page.name', array('class' => 'form-control', 'placeholder' => 'write a name', 'label'=>'Name'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Page.title', array('class' => 'form-control', 'placeholder' => 'write a title', 'label'=>'Title'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('PageContent.description', array('class' => 'form-control', 'placeholder' => 'write a description', 'label'=>'Description'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('PageContent.keywords', array('class' => 'form-control', 'placeholder' => 'write a keywords', 'label'=>'Keywords'));?>
            </div>
            <?php if($this->Form->value('Page.group') != 'home'){ ?>
            <div class="form-group">
                <?php echo $this->Form->input('PageContent.content', array('id'=>'PageContent','class' => 'form-control', 'label' => 'Content', 'type' => 'textarea', 'style'=>'height: 400px;'));?>
            </div>
            <?php } ?>
            
             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
    </div>      
</div>