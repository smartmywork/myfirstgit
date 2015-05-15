<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<style>
                .wishlist_table .add_to_cart, a.add_to_wishlist.button.alt { border-radius: 16px; -moz-border-radius: 16px; -webkit-border-radius: 16px; }            </style>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		
		echo $this->Html->css('designthemes-core-features/shortcodes/css/shortcodes0235',array('media'=>'all'));
		echo $this->Html->css('designthemes-core-features/page-builder/css/animations0235');
		echo $this->Html->css('bbpress4358');
		echo $this->Html->css('buddypress77e6');
		echo $this->Html->css('style0235',array('media'=>'all'));
		echo $this->Html->css('shortcode0235');
		echo $this->Html->css('skins/style0235');
		echo $this->Html->css('animations0235');
		echo $this->Html->css('meanmenu0235');
		echo $this->Html->css('isotope0235');
		echo $this->Html->css('prettyPhoto0235');
		echo $this->Html->css('font-awesome.min0235');
		echo $this->Html->css('woocommerce/css/style0235');
		echo $this->Html->css('responsive0235');
		echo $this->Html->css('sensei/css/style0235');
		//echo $this->Html->css('responsive0235');
		//echo $this->Html->css('layerslider3c21');		
		
		/*echo $this->Html->css('stylee949');
		echo $this->Html->css('reset');	*/	

		echo $this->Html->css('styles');

		echo $this->Html->script('jquery/jquery90f9');
		echo $this->Html->script('jquery/jquery-migrate.min1576');
		echo $this->Html->script('LayerSlider/static/js/layerslider.kreaturamedia.jquery3c21');
		echo $this->Html->script('LayerSlider/static/js/greensock4a80');
		echo $this->Html->script('LayerSlider/static/js/layerslider.transitions3c21');
		echo $this->Html->script('buddypress/bp-core/js/confirm.min77e6');
		echo $this->Html->script('buddypress/bp-core/js/jquery-cookie.min77e6');
		echo $this->Html->script('buddypress/bp-core/js/jquery-query.min77e6');
		echo $this->Html->script('buddypress/bp-core/js/widget-members.min77e6');
		echo $this->Html->script('buddypress/bp-core/deprecated/js/jquery-scroll-to.min77e6');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script type='text/javascript'>
		var mytheme_urls = {
			 theme_base_url:'http://wac.BEE4.edgecastcdn.net/80BEE4/cdn-designthemes/themes/dt-guru/wp-content/themes/guru/'
	 		,framework_base_url:'http://wac.BEE4.edgecastcdn.net/80BEE4/cdn-designthemes/themes/dt-guru/wp-content/themes/guru/framework/'
	 		,ajaxurl:'http://wedesignthemes.com/themes/dt-guru/wp-admin/admin-ajax.php'
	 		,url:'http://wedesignthemes.com/themes/dt-guru'
	 		,stickynav:'disable'
	 		,scroll:'disable'
		};
	 </script>
	 <style type="text/css">
	 .carousel-control.right {
		  background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.1) 100%);
		  background-image: -o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.1) 100%);
		  background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.1)));
		  background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.1) 100%);
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
		  background-repeat: repeat-x;
		}
	 </style>
</head>
<?php 
	$style = '';
	$class = '';
	if(@$pattern && @$layout='boxed'){
		$style='style=" background-image: url(\''.FULL_BASE_URL.$this->Html->url('/').'img/'.$pattern.'.jpg\')"';
		$class=@$layout;
	}
?>
<body class="home-page home page page-id-8 page-template page-template-tpl-fullwidth page-template-tpl-fullwidth-php custom-background tribe-theme-guru no-js <?php echo $class; ?>" <?php echo $style; ?>>
	<div class="main-content">
		<div id="wrapper">
			<?php echo $this->element('top_bar'); ?>
			<?php echo $this->element('header'); ?>
			<div class="content none-padding">
				<div class="container">
					<?php echo $this->Session->flash(); ?>
				</div>
			</div>

			<?php echo $this->fetch('content'); ?>

          	<?php echo $this->element('footer'); ?>
		</div>
	</div>
	<?php
		echo $this->Html->script('designthemes-core-features/shortcodes/js/jquery.tabs.min0235');
		echo $this->Html->script('designthemes-core-features/shortcodes/js/shortcodes0235');

		echo $this->Html->script('framework/public/jquery.smartresize0235');

		echo $this->Html->script('framework/public/jquery-smoothscroll0235');

		echo $this->Html->script('framework/public/jquery.isotope.min0235');

		echo $this->Html->script('framework/public/jquery.prettyPhoto0235');

		echo $this->Html->script('framework/public/jquery.ui.totop.min0235');

		echo $this->Html->script('framework/public/jquery.meanmenu0235');
		
		

		echo $this->Html->script('framework/public/jquery.carouFredSel-6.2.0-packed0235');

		echo $this->Html->script('framework/public/jquery.fitvids0235');

		echo $this->Html->script('framework/public/jquery.bxslider0235');

		//echo $this->Html->script('framework/public/controlpanel0235');

		//echo $this->Html->script('framework/public/contact0235');

		echo $this->Html->script('framework/public/custom0235');

		//echo $this->Html->script('jquery/ui/tabs.min4a80');

	?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
