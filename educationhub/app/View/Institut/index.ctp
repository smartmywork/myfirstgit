<div class="container content" style="margin-top:100px;">
	<?php echo $this->Session->flash(); ?>
	<br/>
	<?php echo $this->Element('Cabinet'.DS.'tab'); ?>	
	<div class="row">
	    <div class="col-md-7 col-md-offset-2">
	    	<?php echo $this->Form->create('School',array('class'=>'form-horizontal','role'=>'form')); ?>
	    	<fieldset>
	    		<legend>Institut data</legend>
	    		<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">School/College Name</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('name',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	 
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">School/College Address</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('address',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	    		
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">School/College Phone</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('phone',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Institution type</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('type',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Student Attendance Type</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('student_type',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Start day of the week</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('start_day',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Date format</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('date_format',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Date separator</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('date_separator',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Financial year start date</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('financial_start',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Financial year end date</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('financial_end',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Language</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('language_id',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Time zone</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('time_zone',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>	
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Country</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('country_id',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Time zone</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('time_zone',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Currency Type</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('currency_type',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    		<div class="form-group">
	    			<label class="col-sm-5 control-label" for="textinput">Precision Count</label>
	    			<div class="col-sm-7">
		            	<?php echo $this->Form->input('precision_count',array('class'=>'form-control','div'=>false,'label'=>false)); ?>
		            </div>
	    		</div>
	    	</fieldset>
	    	<?php echo $this->Form->end(); ?>
	    </div>
	</div>
</div>