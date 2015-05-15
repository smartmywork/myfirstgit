
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __($pageHeader); ?></h2>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Go back'
                                    ), array('controller'=>'institut', 'action' => 'userlist', 'admin'=>true,$school_id), array('escape' => false)); ?>
                            </li>                                                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <?php echo $this->Form->create('User'); ?>  
                <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>              
                <div class="form-group">
                    <?php echo $this->Form->input('first_name',array('class'=>'form-control','label'=>'First Name')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('last_name',array('class'=>'form-control','label'=>'Last Name')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('username',array('class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password',array('class'=>'form-control','value'=>'','required'=>false)); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('phone',array('class'=>'form-control','label'=>'Phone')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('country_id',array('class'=>'form-control','label'=>'Country','empty'=>array('0'=>'Choose your country'))); ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('Personnel.school_role_id',array('class'=>'form-control','label'=>'Role','options'=>$schoolrole,'selected'=>@$schoolrole_id)); ?>
                </div>

                <div class="form-group">
                   <?php echo $this->Form->submit(__('Save'),array('class'=>'btn btn-default')); ?>
                </div>

            <?php echo $this->Form->end(); ?>
        </div>
    </div>
