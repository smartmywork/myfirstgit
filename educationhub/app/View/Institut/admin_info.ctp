
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('School info'); ?></h2>
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

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Users'
                                    ), array('controller'=>'institut', 'action' => 'userlist', 'admin'=>true,$school['School']['id']), array('escape' => false)); ?>
                            </li>

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Roles'
                                    ), array('controller'=>'institut', 'action' => 'roles', 'admin'=>true,$school['School']['id']), array('escape' => false)); ?>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9  toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $school['School']['name']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                    <?php if($school['School']['logo']){ ?>
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo $this->Html->image('schools/'.$school['School']['logo'],array('style'=>'max-width: 300px; max-height: 300px;')); ?>
                            <?php ?>
                        </div>
                    </div> <br/>
                    <?php }else{ ?>
                    <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle">
                    <?php } ?> 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                        <tr>
                            <td>Address</td>
                            <td><?php echo $school['School']['address']; ?></td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><?php echo $school['School']['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Language</td>
                            <td><?php echo $school['School']['language']; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?php echo $school['Country']['name']; ?></td>
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
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'),array('controller'=>'institut','action'=>'edit','admin'=>true,$school['School']['id']),array('class'=>'btn btn-sm btn-warning','data-original-title'=>'Edit this user','data-toggle'=>'tooltip','title'=>'Edit this user','escape'=>false)); ?>
                            
                        </span>
                    </div>
            
          </div>
        </div>
    </div>
