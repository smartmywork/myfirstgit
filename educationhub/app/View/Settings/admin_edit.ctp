
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script>
    
    tinymce.init({
        selector: 'textarea#EXText', 
        plugins: ["image", "table",'link','textcolor'],
        toolbar: ["undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | forecolor backcolor"
                ]
    });
    
</script>

<?php echo $this->Html->script('/js/jquery-input.min.js'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Edit Settings - '.$this->Form->data['Settings']['name']); ?></h2>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        
        <div class="col-md-12">
            <?php echo $this->Form->create('Settings',array('enctype'=>"multipart/form-data")); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => '','label'=>'Option','readonly'));?>
            </div>
            <?php if($this->Form->value('Settings.name') != 'EMAIL'){ ?>
                <?php if($this->Form->value('Settings.name') == 'LOGO'){ ?> 
                    <div class="form-group">
                        <?php echo $this->Html->image($this->Form->value('Settings.value'),array('style'=>'max-width: 300px; max-height: 300px; background-color: rgba(204, 204, 204, 0.33);')); ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $this->Form->image('img_file',array('name'=>'data[img_file]','id'=>'fileimg','accept'=>'image/*', 'class'=>'form-control','type'=>'file','data-buttonBefore'=>'true')); ?>
                            </div>
                        </div>  
                    </div>
                <?php }else{ ?>
                <div class="form-group">
                    <?php echo $this->Form->input('value', array('class' => 'form-control', 'placeholder' => '','label'=>'Value','type'=>'text'));?>
                </div>  
                <?php } ?>
            <?php }else{ ?>
            <div class="form-group">
                <?php echo $this->Form->input('value', array('id'=>'EXText','class' => 'form-control', 'label' => 'Content', 'type' => 'textarea', 'style'=>'height: 400px;'));?>
            </div>      
            <?php } ?>    
            
             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        </div>

<script type="text/javascript">
    $(":file").filestyle({buttonBefore: true});
    $("[for='fileimg']").html("<span class='glyphicon glyphicon-file'></span> Select the image");
</script>