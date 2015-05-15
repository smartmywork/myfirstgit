<div class="container content" style="margin-top:100px;">
	<?php echo $this->Session->flash(); ?>
<br/>
<?php echo $this->Html->script('terms'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="page-header" style="margin: -30px 0 20px;">
                <h3><?php echo __('SIGN UP'); ?></h3>
            </div>
	</div>
</div>
<div class="row">
	<div class="col-md-5 centered">
		<?php echo $this->Form->create('User',array('class'=>'form-horizontal',
											)
										); 
		?>
		<div class="form-group">
			<?php echo $this->Form->input('first_name',array('label'=>'First Name','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('last_name',array('label'=>'Last Name','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('username',array('label'=>'Email','class'=>'form-control','type'=>'email')); ?>
		</div>		
		<div class="form-group">
			<?php echo $this->Form->input('phone',array('label'=>'Phone','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('country_id',array('label'=>'Country','class'=>'form-control','type'=>'select','options'=>$countries,'empty'=>array('0'=>'Choose your country'),'disabled'=>array(0),'selected'=>0)); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('institute_name',array('label'=>'Institute Name','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('sub_domen',array('label'=>'Education Hub Name (one word)','class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<!--I agree with terms and conditions, that the security policy-->
			<!--I agree with the terms of use, privacy policies acknowledge-->
			<div class="row">
				<div class="col-md-12">
					<div class="input checkbox">
						<!--<input type="hidden" name="data[User][permissions]" id="terms_" value="0">-->	
						<input type="hidden" name="data[User][permissions]" id="terms_" value="0">
						<input type="checkbox" name="data[User][permissions]" style="margin-left: 0;" id="terms" value="1">	
						<label for="terms">I agree with the  
							<noindex><?php echo $this->Html->link(__('terms of use'),array('controller'=>'users','action'=>'terms','admin'=>false),array('target'=>'blank'));?></noindex>, 
							acknowledge 
							<noindex><?php echo $this->Html->link(__('privacy policies'),array('controller'=>'users','action'=>'policies','admin'=>false),array('target'=>'blank'));?> </noindex>
						</label>
					</div>
				</div>
			</div>			
		</div>
		<div class="form-group">
				<?php echo $this->Form->submit(__('Sign up'),array('class'=>'btn-default btn')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
</div>