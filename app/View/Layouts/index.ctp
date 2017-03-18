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
		<section>
			<?php echo $this->element('congress');?>
		</section>
			<div class="content-main">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-xs-12 col-sm-12">
							<?php echo $this->element('bieta');?>
							<?php echo $this->fetch('content');?>
							<?php echo $this->element('khuyenmai');?>
						</div>
						<?php echo $this->element('sidebar');?>
					</div>
				</div>
			</div>
		<?php echo $this->element('gift');?>
		<?php echo $this->element('comment');?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow20.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

		<footer>
			<?php echo $this->element('footer')?>
		</footer>
		<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",37281]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
	</body>
</html>
