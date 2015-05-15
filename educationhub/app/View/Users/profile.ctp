<div class="container content" style="margin-top:100px;">
	<?php echo $this->Session->flash(); ?>
	<br/>
<!--<div class="row">
	<div class="col-md-12">
		<div class="page-header">
                <h3><?php echo __('Profile'); ?></h3>
            </div>
	</div>
</div>-->
<?php echo $this->Element('Cabinet'.DS.'tab'); ?>

	 <div class="row">
	    <div class="col-md-7 col-md-offset-2">
	    	<?php echo $this->Form->create('User',array('class'=>'form-horizontal','role'=>'form')); ?>
	    	<fieldset>
	    		<legend>Personal data</legend>
	    		<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">First Name</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('first_name',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Last Name</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('last_name',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Email</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('username',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Password</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('password',array('class'=>'form-control','div'=>false,'label'=>false,'required'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Phone</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('phone',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Country</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('country_id',array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>array('0'=>'Choose your country'),'disabled'=>array(0))); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Institute Name</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('institute_name',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Education Hub Name (one word)</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('sub_domen',array('class'=>'form-control','div'=>false,'label'=>false,'readonly')); ?>
		            	<?php
							if($subscription){
								if($subscription['Subscription']['subscription_status'] == 'trial'){
									?>
									<p  class="text-left" style="color: #818181;   font-style: italic;">You use test mode, which ends in <?php echo date('d/m/Y',$subscription['Subscription']['trial_end']); ?></p>
									<p class="text-left" style="color: #818181;   font-style: italic;">To pay the tariff plan <?php echo $this->Html->link(__('click here'),array('controller'=>'bee','action'=>'pay','admin'=>false)); ?></p>
									<?php 
								}else{
									?>
									<p class="text-left" style="color: #818181;   font-style: italic;">You are using a tariff '<?php echo $subscription['Subscription']['plan_id']; ?>'</p>
									<?php
								}
							}
						?>
		            </div>
	    		</div>
	    		<div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <div class="pull-right">
	                <?php echo $this->Form->submit(__('Save'),array('class'=>'btn btn-primary')); ?>
	              </div>
	            </div>
	          </div>
	    	</fieldset>
	    	<?php echo $this->Form->end(); ?>
	    </div>
	</div>


</div>