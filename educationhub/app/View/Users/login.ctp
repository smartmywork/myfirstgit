<div class="container content" style="margin-top:100px;">
	<?php echo $this->Session->flash(); ?>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin: -30px 0 20px;">
                <h3><?php echo __('SIGN IN'); ?></h3>
            </div>
	</div>
</div>
<div class='row'>
	<div class="col-md-5 centered">
		<?php echo $this->Form->create('User',array('class'=>'form-horizontal',
											)
										); 
		?>
		<div class="form-group">
			<?php echo $this->Form->input('username',array('label'=>'Email','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('password',array('label'=>'Password','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
				<?php echo $this->Form->submit(__('Sign in'),array('class'=>'btn-default btn')); ?>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
</div>