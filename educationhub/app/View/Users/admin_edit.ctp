<div class="users form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Edit User - '.$this->Form->data['User']['username']); ?></h2>
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
                            
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;User list'
                                    ), array('controller'=>'users', 'action' => 'list', 'admin'=>true), array('escape' => false)); ?>
                            </li>
				<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete', array('controller'=>'users','action' => 'delete', $this->Form->value('User.id')), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete\n%s?", $this->Form->value('User.username'))); ?>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <?php echo $this->Form->create('User'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'login','label'=>'Login'));?>
            </div>
            <!--<div class="form-group">
                <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'name','label'=>'Name'));?>
            </div>
            
            <div class="form-group">
                <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'last name','label'=>'Last name'));?>
            </div>-->
			
            <div class="form-group" style="padding-left: 20px;">
                <?php echo $this->Form->input('status', array('class' => 'form-control',
                    'label' => 'Stastus (Active/Locked)',
                    'class' => false,
                    'type' => 'checkbox'
                    )); ?>
            </div>
            
            <div class="form-group">
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'type'=>'password', 'value' => '', 'placeholder'=>'password','label'=>'Password','required' => false));?>
            </div>
            
            <div class="form-group">
                <?php echo $this->Form->input('role_id', array('class' => 'form-control', 'style' => 'width: 200px;','label'=>'Role'));?>
            </div>
            
             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        </div>
</div>