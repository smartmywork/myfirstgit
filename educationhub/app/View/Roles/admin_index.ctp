	<div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Roles'); ?></h2>
            </div>
        </div>
    </div>

    <div class="row">
    	<!--<div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            
                            <li><?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Add role'
                                    //), array('controller'=>'roles', 'action' => 'add', 'admin'=>true), array('escape' => false)); ?>
                            </li>
				           
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->
    	<div class="col-md-12">
    		<table class="table table-striped">
			    <thead>
			        <th><?php echo $this->Paginator->sort('Rol.name','Name'); ?></th>
			        <th><?php echo $this->Paginator->sort('Rol.admin','Admin'); ?></th>
			        <th><?php echo $this->Paginator->sort('Rol.user','User'); ?></th>
			        <th>Description</th>
			        <th></th>
			    </thead>
			    <tbody>
			    	<?php $_access = array('No','Yes'); ?>
			        <?php foreach($roles as $value){ ?>
			        <tr>
			            <td><?php echo $value['Rol']['name']; ?></td>
			            <td><?php echo $_access[$value['Rol']['admin']]; ?></td>
			            <td><?php echo $_access[$value['Rol']['user']]; ?></td>
			            <td><?php echo $value['Rol']['description']; ?></td>
			            <td>
			            	<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller'=>'roles','action' => 'edit', $value['Rol']['id']), array('escape' => false,'title'=>'Edit this role')); ?>
			            	<?php //echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'roles','action' => 'delete', $value['Rol']['id']), array('escape' => false,'title'=>'Delete this role'),__("Are you sure you want to delete\n%s?", $value['Rol']['name'])); ?>
			            </td>
			        </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<p>
        	<?php    
		        /*$params = $this->Paginator->params();
		        if ($params['pageCount'] > 1) {*/
		        ?>
		        <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} from {:pages}, shown {:current} records of {:count} common, recording starting from {:start}, expiring {:end}')));?></small>
		        <?php /*}*/?>
		    </p>

		    <?php    
		    $params = $this->Paginator->params();
		    if ($params['pageCount'] > 1) {
		    ?>
		    <ul class="pagination pagination-sm">
		            <?php
		                    echo $this->Paginator->prev('&larr; Prev', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Prev</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
		                    echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
		                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
		            ?>
		    </ul>
		    <?php } ?>
    	</div>
    </div>