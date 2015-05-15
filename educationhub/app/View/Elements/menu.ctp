<?php
echo $this->Html->css('nav_style');
?> 
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>">Home</a>
        </div>
        <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">

                  <?php if(isset($is_login) && $is_login){?>  

                  <li>
                    <?php echo $this->Html->link('Profile',array('controller'=>'users','action'=>'profile')); ?>
                  </li>                  
                    
                  <li>
                    <?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout')); ?>
                  </li>
                  <!--<li><span class="span_delimetr glyphicon">|</span></li>-->
                  <!--<li  class="<?php //echo $navsel_['users']; ?>">
              <a class="nav-link" href="<?php echo FULL_BASE_URL.$this->Html->url(array('controller'=>'users', 'action' => 'quiz', 'admin'=>false)); ?>">Quiz</a>
                  </li>-->
                  <!--<li id="n5" rel="5"><a class="nav-link" href="<?php echo FULL_BASE_URL.$this->Html->url('/users/logout'); ?>">Log Out</a></li>-->

                  <?php }else{ ?>
                  <li>
                    <?php echo $this->Html->link('Login',array('controller'=>'users','action'=>'login')); ?>
                  </li>
                  <li>
                      <?php //echo $this->Html->link(__('|'),'',array('class'=>'navbar-brand')); ?>
                      <span class="span_delimetr glyphicon">|</span>
                  </li>
                  <li>
                    <?php echo $this->Html->link('Signup',array('controller'=>'users','action'=>'signup')); ?>
                  </li>
                  <?php } ?>
                </ul>
              </div><!--/.nav-collapse -->
        </div>
    </div>