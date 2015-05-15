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
            <?php echo $this->Html->link(__('Home'), '/', array('escape' => false, 'class'=>'navbar-brand')); ?>

        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <!--<li  class="<?php //echo $navsel_['options']; ?>">
			    <a class="nav-link" href="<?php echo FULL_BASE_URL.$this->Html->url(array('action' => 'index')); ?>">Settings</a>
              </li>-->
              <li class="<?php echo $navsel_['settings']; ?>">
                <?php echo $this->Html->link(__('Settings'),array('controller'=>'settings','action'=>'index','admin'=>true),array('class'=>'nav-link')); ?>
              </li>

              <li class="dropdown menu-large <?php echo $navsel_['users']; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>                
                <ul class="dropdown-menu megamenu row">
                    <li class="col-sm-3">
                        <li>
                          <?php echo $this->Html->link(__('Users list'), array('controller'=>'users', 'action' => 'list','admin'=>true));?>
                        </li>
                        <li>
                          <?php echo $this->Html->link(__('Roles'), array('controller'=>'roles', 'action' => 'index','admin'=>true));?>
                        </li>
                    </li>
                </ul>
            </li> 

            

            <li class="dropdown menu-large <?php echo $navsel_['pages']; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages<b class="caret"></b></a>                
                <ul class="dropdown-menu megamenu row">
                    <li class="col-sm-3">
                        <ul>
                          <?php foreach ($listPage as $page) { ?> 
                            <li><?php echo $this->Html->link(__($page['Page']['name']), array('controller'=>'settings', 'action' => 'pages','admin'=>true,$page['Page']['id']));?>
                            </li>
                          <?php } ?>
                        </ul>
                    </li>
                    
                </ul>
 
            </li>

            <li class="dropdown menu-large <?php echo $navsel_['blocks']; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blocks<b class="caret"></b></a>                
                <ul class="dropdown-menu megamenu row">
                    <li class="col-sm-3">
                        <ul>
                            <li><?php echo $this->Html->link(__('Sliders'), array('controller'=>'settings', 'action' => 'sliders','admin'=>true));?>
                            </li>
                            <li><?php echo $this->Html->link(__('Courses'), array('controller'=>'settings', 'action' => 'courses','admin'=>true));?>
                            </li>
                            <li><?php echo $this->Html->link(__('Blocks'), array('controller'=>'settings', 'action' => 'blocks','admin'=>true,1));?>
                            </li>
                            <li><?php echo $this->Html->link(__('Experst'), array('controller'=>'settings', 'action' => 'experts','admin'=>true,));?>
                            </li>
                            <li><?php echo $this->Html->link(__('Testimonials'), array('controller'=>'settings', 'action' => 'testimonials','admin'=>true,));?>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
 
            </li>

            <li class="<?php echo $navsel_['schools']; ?>">
              <?php echo $this->Html->link(__('Shools'), array('controller'=>'institut', 'action' => 'list','admin'=>true));?>
            </li>

             <li class="<?php echo $navsel_['subscriptions']; ?>">
              <?php echo $this->Html->link(__('Subscriptions'), array('controller'=>'bee', 'action' => 'subscriptions','admin'=>true));?>
            </li>

            <li>
              <?php //echo $this->Html->link(__('Tariffs'),array('controller'=>'tariff','action'=>'index','admin'=>true),array('class'=>'nav-link')); ?>
            </li>
            <li id="n5" rel="5"><a class="nav-link" href="<?php echo FULL_BASE_URL.$this->Html->url('/users/logout'); ?>">Log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>