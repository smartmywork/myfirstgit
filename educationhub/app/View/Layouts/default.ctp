<!DOCTYPE html>
<html lang="en">
  <head>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>"> 
    <meta name="author" content="">

	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('admin');
                echo $this->Html->css('infoerror');
                echo $this->Html->css('styles');
                
                //echo $this->Html->css('style3');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                //echo $this->Html->css('bootstrap-select.css');
	?>

  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <?php //echo $this->Html->css('style3'); ?>
  	<!-- Latest compiled and minified JavaScript -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  	<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <?php echo $this->Html->script('js'); ?>

  </head>
  <body>

    <?php echo $this->Element('header'); ?>
    <!--<br/>-->
    <!--<div class="container-fluid slider">-->
      <!--<div class="container content">-->


			<?php echo $this->fetch('content'); ?>

      <?php echo $this->Element('footer'); ?>

      <!--</div>--><!-- /.container -->
    <!--</div>-->
    <?php //echo $this->element('sql_dump'); ?>
    <!--<div class="container"><div class="row">&nbsp;<br/></div></div>
    <?php //echo $this->Element('footer'); ?>
  </body>-->
</html>
