	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="<?php echo $cabinetSelectTab['institut']; ?>">
	            	<?php echo $this->Html->link(__('Institute'),array('controller'=>'institut','action'=>'index','admin'=>false)); ?>
	            </li>
				<li role="presentation" class="<?php echo $cabinetSelectTab['fees']; ?>">
	            	<?php echo $this->Html->link(__('Fees'),array('controller'=>'institut','action'=>'fees','admin'=>false)); ?>
	            </li>

	            <li role="presentation" class="<?php echo $cabinetSelectTab['quiz']; ?>">
	            	<?php echo $this->Html->link(__('Quiz'),array('controller'=>'institut','action'=>'quiz','admin'=>false)); ?>
	            </li>

	            <li role="presentation" class="<?php echo $cabinetSelectTab['course']; ?>">
	            	<?php echo $this->Html->link(__('Course'),array('controller'=>'institut','action'=>'course','admin'=>false)); ?>
	            </li>
				
	            <li role="presentation" class="<?php echo $cabinetSelectTab['account']; ?>">
	            	<?php echo $this->Html->link(__('My account'),array('controller'=>'users','action'=>'profile','admin'=>false)); ?>
	            </li>
	        </ul>
		</div>
	</div>