<div class="container experts">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h2>Top Experts</h2>
				<?php foreach ($topExpert as $expert){ ?>
				<div class="row exline">
					<div class="col-xs-3 col-md-3 expert">
						<div class="row">
							<div class="col-md-12">
								<?php echo $this->Html->image('experts/'.$expert['Expert']['image'],array('alt'=>'#')); ?>
							</div>
						</div>
						<div class="row socials">
							<div class="col-xs-3 col-md-3 social">
								<a href="#" class="twitter"></a>
							</div>
							<div class="col-xs-3 col-md-3 social">
								<a href="#" class="facebook"></a>
							</div>
							<div class="col-xs-3 col-md-3 social">
								<a href="#" class="tumblr"></a>
							</div>
							<div class="col-xs-3 col-md-3 social">
								<a href="#" class="vimeo"></a>
							</div>
						</div>
					</div>
					<div class="col-xs-9 col-md-9">
						<h3><?php echo $expert['Expert']['name']; ?></h3>
						<cite><?php echo $expert['Expert']['cite']; ?></cite>
						<p><?php echo $expert['Expert']['content']; ?></p>
					</div>
				</div>
				<?php } ?>
			</div> 
			<div class="col-xs-12 col-md-6 testimonials">
				<h2>Testimonials</h2>
				<?php foreach($testimonials as $testimonial){ ?>
				<div class="row tesline">
					<div class="col-xs-3 col-md-3 portrait-1" <?php echo 'style="background-image: url(img/testimonials/'.$testimonial['Testimonial']['image'].');"' ?> >
						<?php //echo $this->Html->image('testimonials/'.$testimonial['Testimonial']['image'],array('alt'=>'#','class'=>'background')); ?>
						<img src="img/testimonial_bg.png" class="background" alt="#">
					</div>
					<div class="col-xs-9 col-md-9">
						<p><?php echo $testimonial['Testimonial']['content']; ?></p>
						<cite><?php echo $testimonial['Testimonial']['cite']; ?></cite>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>