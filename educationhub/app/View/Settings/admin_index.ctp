	<div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Settings'); ?></h2>
            </div>
        </div>
    </div>

    <div class="row">

    	<div class="col-md-12">
    		<table class="table table-striped">
			    <thead>
			        <th>Option</th>
			        <th>Value</th>
			        <th></th>
			    </thead>
			    <tbody>
			        <?php foreach($settings as $value){ ?>
			        <tr>
			            <td><?php echo $value['Settings']['name']; ?></td>
			            <td><?php  if($value['Settings']['name'] != 'EMAIL'){ echo $value['Settings']['value']; }else{ echo strip_tags(substr($value['Settings']['value'],0,100)); } ?></td>
			            <td>
			                <?php
			                    echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller'=>'settings','action' => 'edit', $value['Settings']['id']), array('escape' => false,'title'=>'Edit'));
			                    //echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'settings','action' => 'delete', $value['Settings']['id']), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete\n%s?", $value['Settings']['name']));
			                ?>
			            </td>
			        </tr>
			        <?php } ?>
			    </tbody>
			</table>
    	</div>
    </div>