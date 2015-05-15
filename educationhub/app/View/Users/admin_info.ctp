	<div class="row">
		<div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;User list'
                                    ), array('controller'=>'users', 'action' => 'list', 'admin'=>true), array('escape' => false)); ?>
                            </li>

                            <li>
                            	<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit user'),array('controller'=>'users','action'=>'edit','admin'=>true,$info['User']['id']),array('data-original-title'=>'Edit this user','data-toggle'=>'tooltip','title'=>'Edit this user','escape'=>false)); ?>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $info['User']['first_name'].' '.$info['User']['last_name']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                	<img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    	<tr>
                        	<td>Email</td>
                        	<td><a href="mailto:info@support.com"><?php echo $info['User']['username']; ?> </a></td>
                      	</tr>
                      
                    	<tr>
                        	<td>Role</td>
                        	<td><?php echo $info['Rol']['name']; ?></td>
                      	</tr>

                      	<tr>
                        	<td>Country</td>
                        	<td><?php echo $info['Country']['name']; ?></td>
                      	</tr>

                      	<tr>
                        	<td>Phone Number</td>
                        	<td><?php echo $info['User']['phone']; ?></td>
                        </tr>

                      	<tr>
                        	<td>Institute Name</td>
                        	<td><?php echo $info['User']['institute_name']; ?></td>
                      	</tr>

                      	<tr>
                        	<td>Education Hub Name</td>
                        	<td><?php echo $info['User']['sub_domen']; ?></td>
                      	</tr>  

                      	<tr>
                        	<td>Status</td>
                        	<td>
                        		<?php 
				                    $status = array(0=>'Locked',1=>'Active',2=>'Non-confirmed');
				                    echo @$status[$info['User']['status']];
				                ?>
                        	</td>
                      	</tr>                   	
                     
                    </tbody>
                  </table>
                  
                  <!--<a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                </div>
              </div>
            </div>
                 <div class="panel-footer text-right">
                        <!--<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>-->
                        <span class="text-right">
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'),array('controller'=>'users','action'=>'edit','admin'=>true,$info['User']['id']),array('class'=>'btn btn-sm btn-warning','data-original-title'=>'Edit this user','data-toggle'=>'tooltip','title'=>'Edit this user','escape'=>false)); ?>
                            <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-remove"></i>', array('controller'=>'users','action' => 'delete', $info['User']['id']), array('escape' => false,'title'=>'Delete','class'=>'btn btn-sm btn-danger'),__("Are you sure you want to delete\n%s?", $info['User']['username'])); ?>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>