<div class="container content" style="margin-top:100px;">
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
		<form id="paypal_form" class="form-horizontal" action="<?php echo $options['ENDPOINT']; ?>" method="post">
			<input type="hidden" name="cmd" value="_xclick">
		 <input type="hidden" name="business" value="<?php echo $options['PAYPAL_API_USERNAME']; ?>">
		 <input type="hidden" name="handling" value="0">
		 <input type="hidden" name="currency_code" value="USD">
		 <input type="hidden" name="notify_url" value="<?php echo $this->Html->url(array('controller'=>'users','action'=>'fail','full_base'=>true)) ?>">
		 <input type="hidden" name="return" value="<?php echo $this->Html->url(array('controller'=>'users','action'=>'success','full_base'=>true)) ?>">
		 <input id="paypal_item_name" type="hidden" name="item_name" value="Tariff">
			<div class="form-group">
				<?php echo $this->Form->input('amount',array('class'=>'form-control','name'=>'amount')); ?>
			</div>

			<div class="form-group">
				<?php echo $this->Form->submit(__('Pay'),array('class'=>'btn btn-default')); ?>
			</div>

		</form>
	</div>
</div>
</div>