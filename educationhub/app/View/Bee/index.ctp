<div class="container content" style="margin-top:100px;">
	<?php echo $this->Session->flash(); ?>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin: -30px 0 20px;">
                <h3><?php echo __('SIGN UP'); ?></h3>
            </div>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<?php echo $this->Form->create('plan'); ?>
		<div class="form-group">
			<?php echo $this->Form->input('pay_obj',array('class'=>'form-control','name'=>'data[pay_obj]','type'=>'select','options'=>$plansList,'label'=>'Plans')) ?>
		</div>	
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<?php echo $this->Form->submit(__('Pay'),array('class'=>'btn btn-default')); ?>
				</div>
			</div>
			<?php if(!@$is_login){ ?>
			<div class="col-md-3">
				<div class="form-group">
					<?php echo $this->Html->link(__('Trial version'),array('controller'=>'bee','action'=>'trial','admin'=>false),array('class'=>'btn btn-default')); ?>
				</div>
			</div>
			<?php } ?>
		</div>
		
		
		<?php echo $this->Form->end(); ?>
	</div>
</div>
</div>