<div class="col-right col-md-3 col-xs-12 col-sm-12">
	<div class="right category">
		<div class="title">
			<h2>Danh mục</h2>
		</div>
		<div class="content">
			<ul class="list-collect">
			  <?php
		        $categories = $this->requestAction('categories/menu');
		        foreach ($categories as $category)
		        {
		          ?>

				<li class="li-collect"><a href="<?php echo $this->webroot.'categories/view/'.$category['Category']['id']?>"><?php echo $category['Category']['name'];?></a></li>
	          <?php
			        }
			  ?>
			</ul>
		</div>
	</div>
	<div class="right blog-sidebar">
		<div class="title">
			<h2>Tin mới</h2>
		</div>
		<div class="content">
			<ul class="list">
				<?php
		        $news = $this->requestAction('news/menu');
		        foreach ($news as $news)
		        {
		          ?>

				<li class=""><a href="<?php echo $this->webroot.'news/view/'.$news['News']['id']?>"><?php echo $news['News']['title'];?></a></li>
	          <?php
			        }
			  ?>
			</ul>
		</div>
	</div>
	<div class="policy">
		<div class="content">
		 <?php
		        $types = $this->requestAction('types/menu');
		        foreach ($types as $type)
		        {
		          ?>
				<div class="policy-1">
				<a href="<?php echo $this->webroot.'types/view/'.$type['Type']['id']?>"><span class="glyphicon glyphicon-gift"></span> <?php echo $type['Type']['name'];?></a>
			</div>
	          <?php
			        }
			  ?>
			
		</div>
	</div>
	<div class="block banner hidden-sm hidden-xs">
		<a href="#"><img src="<?php echo $this->webroot; ?>files/image/image/11/block-banner.jpg"></a>
	</div>
</div>