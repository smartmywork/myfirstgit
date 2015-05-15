<!--<div class="content">
	<div class="container">
		school index
	</div>
</div>-->

<div class="fullwidth-section  " style="background-repeat:no-repeat;background-position:left top;">
    <div class="fullwidth-bg">	
        <div class="container">
        	<!--<div class="dt-sc-hr-invisible  "></div>-->
        	<div class="column dt-sc-two-third  first">
        		<div class="hr-title">
        			<h2>School Settings</h2>
        			<div class="title-sep">
        				<span></span>
        			</div>
        		</div>
				<div class="wpcf7" id="wpcf7-f2773-p2774-o1" lang="en-US" dir="ltr">
				<div class="screen-reader-response"></div>
				<!--<form name="" action="http://wedesignthemes.com/themes/dt-guru/contact/contact-form-7/#wpcf7-f2773-p2774-o1" method="post" class="wpcf7-form" novalidate="novalidate">-->
				<?php echo $this->Form->create('School',array('class'=>'wpcf7-form')); ?>
				<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
				<p>
				    <span class="wpcf7-form-control-wrap your-name">
				    	<?php echo $this->Form->input('name',array('type'=>'text','class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Name (required)')); ?>
				    </span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('address',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Address')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('phone',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Phone')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('type',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Institution type')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('student_type',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Student Attendance Type')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('start_day',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Start day of the week')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('date_format',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Date format')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('date_separator',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Date separator')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('financial_start',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Financial year start date')); ?>
					</span>
				</p>		

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('financial_end',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Financial year end date')); ?>
					</span>
				</p>


				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						 <?php echo $this->Form->input('language',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Language')); ?>
					</span>
				</p>


				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('time_zone',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Time zone')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						 <?php echo $this->Form->input('country_id',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Country','empty'=>array('0'=>'Choose your country'))); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('currency_type',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Currency Type')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-name">
						<?php echo $this->Form->input('precision_count',array('class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','label'=>'Precision Count')); ?>
					</span>
				</p>

				<p>
				    <span class="wpcf7-form-control-wrap your-email">
				    	<?php echo $this->Form->input('background',array('type'=>'text','class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required school-form-input','id'=>'field-background','readonly')); ?>
				    </span> 
				</p>
				<p>
					<span class="wpcf7-form-control-wrap your-email"> 
						<div class=" school-select-box">
							<!--<select name="data[School][layout]" class="orderby">
								<option value="menu_order" selected="selected">Default sorting</option>
								<option value="popularity">Sort by popularity</option>
								<option value="rating">Sort by average rating</option>
								<option value="date">Sort by newness</option>
								<option value="price">Sort by price: low to high</option>
								<option value="price-desc">Sort by price: high to low</option>
							</select>-->
							<?php echo $this->Form->input('layout',array('type'=>'select','options'=>array('full'=>'Full width','boxed'=>'Boxed'),'class'=>'orderby','id'=>'select-layout')); ?>
						</div>
					</span>
				</p>
				<p >
					<span class="wpcf7-form-control-wrap your-name">
						<div id="pattern-holder" class="school-pattern-holder" style="<?php if($this->Form->value('layout') != 'boxed'){ echo 'display:none;'; }?>">
							<h3> Patterns for Boxed Layout </h3>
							<ul class="pattern-picker school-select-pattern">
								<?php for($i=1;$i<14;$i++){ ?>
								<li>
									<a id="pattern<?php echo $i; ?>" class="current-pattern" href>
										<?php echo $this->Html->image('small-pattern/pattern'.$i.'.jpg',array('alt'=>'pattern'.$i,'title'=>'pattern'.$i)); ?>
									</a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</span>
				</p>
				<!--<p>
				    <span class="wpcf7-form-control-wrap your-message"><textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
				<p>-->
					<!--<input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit">-->
					<?php echo $this->Form->submit(__('Save'),array('class'=>'wpcf7-form-control wpcf7-submit')); ?>
					<!--<img class="ajax-loader" src="http://wedesignthemes.com/themes/dt-guru/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;">-->
				</p>
				<div class="wpcf7-response-output wpcf7-display-none"></div>
				<!--</form>-->
				<?php echo $this->Form->end(); ?>
			</div>
			</div>
        </div>
    </div>
</div>
<script>
	var _pattern_url = "<?php echo $this->Html->url(array('controller'=>'schools','action'=>'sel_pattern','full_base'=>true)); ?>";
	var _full_base = "<?php echo FULL_BASE_URL.$this->Html->url('/'); ?>";
</script>

<?php echo $this->Html->script('sel-layout'); ?>