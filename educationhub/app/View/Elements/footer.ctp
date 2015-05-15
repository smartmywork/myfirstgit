	<div class="container-fluid footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 copyright">											
					<?php echo $siteName; ?> &copy; <?php echo date('Y'); ?> 
					Powered by <a href="http://softsprint.net">SoftSprint</a> 	
				</div>
				<div class="col-xs-12 col-md-6 links">		
					<ul>
						<?php foreach($listPage as $link){ ?>
									<li>
										<?php echo $this->Html->link(__($link['Page']['name']),'/'.$link['Page']['slug']); ?>
									</li>
									<?php } ?>
					</ul>
				</div>
			</div>
	</div>