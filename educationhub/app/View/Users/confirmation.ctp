<div class="container content" style="margin-top:100px;">
	<?php echo $this->Session->flash(); ?>
<br/>
	<div class="row">
		<div class="col-md-4">
			<?php echo $this->Form->create('User'); ?>
			<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
			<div class="form-group">
				<?php echo $this->Form->input('password',array('type'=>'password','class'=>'form-control')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('confirm',array('type'=>'password','class'=>'form-control','label'=>'Confirmation password','required')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->submit(__('Confirm'),array('class'=>'btn btn-default')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>