			<div class="top-bar">
                <div class="container">
                	<div class="float-left">
						Create you own custom course. <a href="#" title="Learn How?">Learn How?</a>                    </div>
                	<div class="float-right">                            	
                		<!--<a href="my-courses/index.html" title="Login / Register Now">Login&nbsp;&nbsp;/&nbsp;&nbsp;Register Now</a>-->
                		<?php 
                			if(@$is_login){
                				echo $this->Html->link(__('Log Out'),array('controller'=>'users','action'=>'logout','admin'=>false),array('title'=>'Log Out','escape'=>false));
                			}else{
                				echo $this->Html->link(__('Login&nbsp;&nbsp;/&nbsp;&nbsp;Register Now'),array('controller'=>'users','action'=>'login','admin'=>false),array('title'=>'Login / Register Now','escape'=>false));
                			}                			 
                		?>
                	</div>
                </div>
            </div>