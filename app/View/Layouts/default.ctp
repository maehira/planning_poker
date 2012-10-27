<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('bootstrap-responsive.min'); ?>
        <?php echo $this->Html->script('bootstrap.min'); ?>
        <?php echo $this->Html->script('http://code.jquery.com/jquery-1.8.2.js'); ?>
        <?php echo $this->Html->script('http://code.jquery.com/ui/1.9.1/jquery-ui.js'); ?>
        <?php echo $this->Html->css('http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'); ?>
        <?php echo $this->Html->css('default'); ?>
        <?php
            if($this->name == 'Projects' && $this->action == 'start') {
                echo $this->Html->script('http://js.pusher.com/1.11/pusher.min.js');
                echo $this->Html->css('projects_start');
            }
            if($this->name == 'Projects' && $this->action == 'start_x') {
                echo $this->Html->script('http://js.pusher.com/1.11/pusher.min.js');
                echo $this->Html->css('projects_start_x');
            }
        ?>
        </head>
<body>
	<div id="container">
		<div id="header">
                    <?php
                      $username = AuthComponent::user('username');
                      if(!empty($username)) {
                       echo 'LoginUser : ' . $username;
                      }
                    ?>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
