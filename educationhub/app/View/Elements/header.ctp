
	<div class="container-fluid header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9 topmenu">
					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>">
									<!--<img class="logo" src="logo.png" alt="logo">-->
									<?php echo $this->Html->image($logo,array('class'=>'logo','alt'=>'logo')); ?>
								</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
									<?php foreach($listPage as $link){ ?>
									<li class="<?php if(@$activePage == $link['Page']['slug']){ echo 'active'; } ?>">
										<?php echo $this->Html->link(__($link['Page']['name']),'/'.$link['Page']['slug']); ?>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<?php if(!isset($is_login) || (isset($is_login) && !$is_login)){ ?>	
				<div class="col-xs-12 col-md-3 signup">
						<div class="btn-group btn-group-sm">
							<button type="button" class="btn btn-default login" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user "></span> Login <span class="caret"></span>
							</button>
							<div class="dropdown-menu loginform">
								<form role="form" action="<?php echo $this->Html->url(array('controller'=>'users','action'=>'login','full_base'=>true)); ?>" method="post" accept-charset="utf-8">
									<div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="email" name="data[User][username]" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" name="data[User][password]" class="form-control" id="exampleInputPassword1" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox"> Remember
											</label>
										</div>
										<button type="submit" class="btn btn-default">Submit</button>
									</div>
								</form>
							</div>	
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus-sign registration"></span> Signup'),array('controller'=>'users','action'=>'signup'),array('class'=>'btn btn-default register','escape'=>false)); ?>
					</div>
				</div>
				<?php }else{ ?>
				<div class="col-xs-12 col-md-3 signup">
					<div class="btn-group btn-group-sm">
						<!--<button type="button" class="btn btn-default login" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user "></span> Logout 
						</button>-->
						<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-user "></span> Cabinet'),array('controller'=>'institut','action'=>'index'),array('class'=>'btn btn-default logout','escape'=>false)); ?>
						<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-log-out"></span> Logout'),array('controller'=>'users','action'=>'logout'),array('class'=>'btn btn-default register','escape'=>false)); ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>