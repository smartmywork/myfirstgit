
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Edit Role - '.$this->Form->value('Rol.name')); ?></h2>
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
                            
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Roles list'
                                    ), array('controller'=>'roles', 'action' => 'index', 'admin'=>true), array('escape' => false)); ?>
                            </li>
				            <?php //echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete', array('controller'=>'users','action' => 'delete', $this->Form->value('Rol.id')), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete?", $this->Form->value('Rol.name'))); ?>
                            
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <?php echo $this->Form->create('Rol'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('type'=>'hidden'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'write a name role','label'=>'Name','readonly'));?>
            </div>
            
            <div class="form-group">
                <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder'=>'write a description'));?>
            </div>

            <div class="form-group" style="padding-left: 20px;">
                <?php echo $this->Form->input('admin', array('class' => false, 'type'=>'checkbox','value'=>1,'label'=>'Admin (Access to admin site)'));?>
            </div>

            <div class="form-group" style="padding-left: 20px;">
                <?php echo $this->Form->input('user', array('class' => false, 'type'=>'checkbox','value'=>1,'label'=>'User (A normal user)'));?>
            </div>
            
             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
    </div>
