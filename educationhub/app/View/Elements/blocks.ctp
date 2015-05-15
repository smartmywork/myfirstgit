	<div class="container block">
		<div class="row">
			<?php foreach($blocks as $block){ ?>
			<div class="col-xs-12 col-md-4 blocks">
				<?php echo $this->Html->image($block['Block']['image'],array('alt'=>'#')); ?>
				<h3><?php echo $block['Block']['title']; ?></h3>
				<p><?php echo $block['Block']['content']; ?></p>
			</div>
			<?php } ?>
		</div>
	</div>