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

$cakeDescription = __d('101percent', '101% Auf und neben dem Platz');
$scripts_for_layout 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<?php
    	echo $scripts_for_layout;
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>

<div id="header-wrapper" class="container">

    <div id="header" class="container">

        <div id="headerpics">
	        <h1 class="pagetitle">Intern</h1>
        </div>

		<? echo $this->element('intern_nav');?>
        
	</div>
    
</div>	
<!-- end #header -->

<div id="page">
    
  <div id="content_admin">
    
    <?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
  <div class="clear">&nbsp;</div>
  </div>
        
        
		<!-- end #content -->
		<div class="clear">&nbsp;</div>

</div>

<div class="container"><?=$this->Html->image('img03.png', array('width' => '1000', 'height' => '40', 'alt'=>''));?></div>
<!-- end #page -->


<div id="footer">
	<p>Copyright (c) 2013 101-prozent.ch</p>
</div>

<!-- end #footer -->


</body>
</html>