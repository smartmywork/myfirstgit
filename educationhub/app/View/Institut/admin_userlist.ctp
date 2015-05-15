
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Users'); ?></h2>
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
                            
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Create new user'
                                    ), array('controller'=>'institut', 'action' => 'createuser', 'admin'=>true,$school_id), array('escape' => false)); ?>
                            </li> 

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Schools'
                                    ), array('controller'=>'institut', 'action' => 'list', 'admin'=>true), array('escape' => false)); ?>
                            </li>

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Users'
                                    ), array('controller'=>'institut', 'action' => 'userlist', 'admin'=>true,$school_id), array('escape' => false)); ?>
                            </li>

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Roles'
                                    ), array('controller'=>'institut', 'action' => 'roles', 'admin'=>true,$school_id), array('escape' => false)); ?>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <table class="table table-striped">
                <thead>
                    <th><?php echo $this->Paginator->sort('User.username','Email'); ?></th>
                    <th><?php echo $this->Paginator->sort('User.first_name','First Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('User.last_name','Last Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('SchoolRole.name','Role'); ?></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($users as $user){ ?>
                    <tr>
                        <td><?php echo $user['User']['username']; ?></td>
                        <td><?php  echo $user['User']['first_name']; ?></td>
                        <td><?php  echo $user['User']['last_name']; ?></td>
                        <td><?php  echo $user['SchoolRole']['name']; ?></td>
                        <td>
                            <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller'=>'institut','action' => 'useredit', $user['User']['id'],'admin'=>true,'?'=>array('school_id'=>$school_id)), array('escape' => false,'title'=>'Edit'));  
                                echo ' ' ;
                                echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'institut','action' => 'deleteuser', $user['User']['id'],'?'=>array('school_id'=>$school_id)), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete\n%s?", $user['User']['username']));
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
