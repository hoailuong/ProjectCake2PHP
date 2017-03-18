<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout;?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->css('ihover');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->html->script('jquery-1.11.3.min');
		echo $this->html->script('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<body>
		<section class='header-top'>
			<?php
				echo $this->element('header-top')
			?>
		</section>
		<section class='slider'>
			<?php echo $this->element('slider')?>
		</section>
		<section class='menu'>
			<?php echo $this->element('menu')?>
		</section>
		<div class="container">
			<div class="row">
			<div class="col-md-9">
			<?php echo $this->fetch('content');?>
		
		</div>
		<div class=""><?php echo $this->element('sidebar')?></div>
	</div>
		</div>
		<footer>
			<?php echo $this->element('footer')?>
		</footer>
		<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",41294]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
	</body>
</body>
</html>
