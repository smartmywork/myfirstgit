	<div class="container-fluid slider">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<?php $_count = count($sliders); ?>
			<ol class="carousel-indicators">
				<?php 
					for($i=0;$i<$_count; $i++){
						$_active = '';
						if($i == 0){$_active = 'active';}
				?>
					<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $_active; ?>"></li>
				<?php } ?>
			</ol>
			<div class="carousel-inner" role="listbox">
				<?php foreach ($sliders as $key=>$slider){ $_active = '';?>
				<?php if($key == 0){$_active = 'active';} ?>
				<div class="item <?php echo $_active; ?> slider<?php echo $key; ?>" <?php echo 'style="background-image: url(img/sliders/'.$slider['Slider']['image1'].');"' ?>>
					<div class="carousel-caption">
						<div class="col-xs-12 col-md-6">
							<section>
								<h2><?php echo $slider['Slider']['header']; ?></h3>
								<p><?php echo $slider['Slider']['content']; ?></p>
								<?php if(!empty($slider['Slider']['button_text'])){ ?>
								<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;'.$slider['Slider']['button_text']),$slider['Slider']['link'],array('class'=>'btn btn-default getstarted','escape'=>false)) ?>
								<?php } ?>
							</section>
						</div>
						<div class="col-xs-12 col-md-6 thumb-slider" <?php echo 'style="background-image: url(img/sliders/'.$slider['Slider']['image2'].');"' ?>>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>		
			<?php if($_count > 1){ ?>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<?php } ?>
		</div>
	</div>