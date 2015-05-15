<?php echo $this->Html->script('/js/jquery-input.min.js'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __($pageHeader); ?></h2>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Schools'
                                    ), array('controller'=>'institut', 'action' => 'list', 'admin'=>true), array('escape' => false)); ?>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <?php echo $this->Form->create('School',array('enctype'=>"multipart/form-data")); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control','type'=>'hidden'));?>
            </div>
            
            <div class="form-group">
                <?php echo $this->Form->input('name',array('class'=>'form-control','label'=>'School/College Name')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('address',array('class'=>'form-control','label'=>'School/College Address')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('phone',array('class'=>'form-control','label'=>'School/College Phone')); ?>
            </div>
            
            <div class="form-group">
                <?php echo $this->Form->input('type',array('class'=>'form-control','label'=>'Institution type')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('student_type',array('class'=>'form-control','label'=>'Student Attendance Type')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('start_day',array('class'=>'form-control','label'=>'Start day of the week')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('date_format',array('class'=>'form-control','label'=>'Date format')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('date_separator',array('class'=>'form-control','label'=>'Date separator')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('financial_start',array('class'=>'form-control','label'=>'Financial year start date')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('financial_end',array('class'=>'form-control','label'=>'Financial year end date')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('language',array('class'=>'form-control','label'=>'Language')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('time_zone',array('class'=>'form-control','label'=>'Time zone')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('country_id',array('class'=>'form-control','label'=>'Country','empty'=>array('0'=>'Choose your country'))); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('currency_type',array('class'=>'form-control','label'=>'Currency Type')); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('precision_count',array('class'=>'form-control','label'=>'Precision Count')); ?>
            </div>
            <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="SliderButtonText">Logo</label>
                        </div>
                    </div>
                <?php if($this->Form->value('School.logo')){ ?>
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo $this->Html->image('schools/'.$this->Form->value('School.logo'),array('style'=>'max-width: 300px; max-height: 300px;')); ?>
                            <?php
                             echo $this->Html->Link('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'institut','action' => 'delete_logo',$this->Form->value('School.id'),'?'=>array('image'=>'logo')), array('escape' => false,'title'=>'Delete logo','class'=>'link_delete_image','confirm' => 'Are you sure you want to delete logo ?','style'=>'font-size: 12pt;'));
                             ?>
                        </div>
                    </div> <br/>
                    <?php } ?>
            
                <?php echo $this->Form->input('logo',array('name'=>'data[logo]','class'=>'form-control','type'=>'file','label'=>false,'id'=>'logo','accept'=>'image/*')); ?>
                <p style="font-size: 10pt; color: #696969;">Upload Logo (500KB max, 150x110).</p>
            </div>

             <div class="form-group">
                <?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
    </div>


<script type="text/javascript">
    $(":file").filestyle({buttonBefore: true});
    $("[for='logo']").html("<span class='glyphicon glyphicon-file'></span> Select the logo");
</script>