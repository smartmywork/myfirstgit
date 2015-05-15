<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>

<script>
    
    tinymce.init({selector: 'textarea#EXText', plugins: ["image", "table",'link']});
    
</script>
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Edit Settings - '.$this->Form->value('Settings.name')); ?></h2>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        
        <div class="col-md-12">
            <?php echo $this->Form->create('Settings'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => '','label'=>'Option','readonly'));?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('value', array('id'=>'EXText','class' => 'form-control', 'label' => 'Content', 'type' => 'textarea', 'style'=>'height: 400px;'));?>
            </div>           
            
             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        </div>
