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
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $this->fetch('title'); ?></title>

	<?php
                echo $this->Html->css('styles',array('fullBase'=>true));
                
                //echo $this->Html->css('style3');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                //echo $this->Html->css('bootstrap-select.css');
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

	<?php echo $this->Element('Emails'.DS.'header'); ?>

		<?php echo $this->fetch('content'); ?>

	<?php echo $this->Element('Emails'.DS.'footer'); ?>
</body>
</html>