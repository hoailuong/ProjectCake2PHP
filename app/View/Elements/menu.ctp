<div class="container">
	<div class="row">
		<div class="col-md-12 main-menu">
			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<!-- <a class="navbar-brand" href="#">Sản Phẩm</a> -->
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><?php echo $this->Html->link('Trang Chủ','/');?><span class="sr-only">(current)</span></li>
							<li><?php echo $this->Html->link('Giới thiệu','/gioi-thieu');?></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm <span class="caret"></span></a>
								<ul class="dropdown-menu">
								<?php
						        $categories = $this->requestAction('categories/');
						        foreach ($categories as $category)
						        {
						        ?>
									<li><a href="<?php echo $this->webroot.'categories/view/'.$category['Category']['id']?>"><?php echo $category['Category']['name'];?></a></li>
								<?php
								}
								 ?>

								</ul>
							</li>
							<li><?php echo $this->Html->link('Tin tức','/tin-tuc');?></li>
							<li class="hidden-sm"><?php echo $this->Html->link('Tư vấn','/tu-van');?></li>
							<li class="hidden-sm"><?php echo $this->Html->link('Dịch vụ','/dich-vu');?></li>
							<li class="hidden-sm"><?php echo $this->Html->link('Liên Hệ','/lien-he');?></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>
	</div>
</div>