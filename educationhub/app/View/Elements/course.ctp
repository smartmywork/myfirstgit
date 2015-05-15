<div class="container course">
		<div class="row">
			<h2>Popular Courses</h2>

			<?php foreach ($popularCourses as $course){ ?>
			<div class="col-xs-6 col-md-3 rate">
				<figure>
					<a href="#">
						<?php echo $this->Html->image('courses/'.$course['Course']['image'],array('class'=>'photo'));?>
						<h3><?php echo $course['Course']['name']; ?></h3>
						<cite><?php echo $course['Course']['cite']; ?></cite>
					</a>
					<figcaption>
						<div class="col-xs-3 col-md-4">
							<span class="glyphicon glyphicon-user"></span><span class="votes"> <?php echo $course['Course']['votes']; ?></span>
						</div>
						<div class="col-xs-9 col-md-8 stars">
							<?php for($i = 1; $i<5; $i++){
								 if($i<=$course['Course']['stars']){
								 	echo $this->Html->image('star-on.png',array('alt'=>'star'));
								 }else{
								 	echo $this->Html->image('star-off.png',array('alt'=>'star'));
								 }
							} ?>
						</div>
					</figcaption>
				</figure>
			</div>
			<?php } ?>
		</div>
	</div>