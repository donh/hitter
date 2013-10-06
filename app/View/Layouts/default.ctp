<?php
/**
 *
 */
$hitterDescription = __d('hitter_dev', 'Quick Hitter: the almighty electronic business card');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php
			echo $hitterDescription
			//echo $title_for_layout;
		?>
	</title>
	<!--
	<link rel="stylesheet" type="text/css" href="css/pure-min.css">
	
	-->
	<?php
		//echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		//echo $this->Html->css('base-min');
		echo $this->Html->css('pure-min');
		// <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
		echo $this->Html->script('yui-min');
		// <script src="http://yui.yahooapis.com/3.12.0/build/yui/yui-min.js"></script>
		echo $this->Html->script('jquery-2.0.3');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>
				<?php
					//echo $this->Html->link($hitterDescription, 'http://cakephp.org');
					//echo $this->Html->link($hitterDescription, 'http://140.112.252.153/');
					//echo $this->Html->link($hitterDescription, 'http://hitter.mar98.tk/');
				?>
			</h1>
		</div>
		<div id="content">

			<?php
				echo $this->Session->flash();
				echo $this->fetch('content');
			?>
		</div>
		<div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $hitterDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
				*/
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>