<section class="container">
    <div class="section container"> 
        <div class="row">
        <div class="col-md-10">
       		<div class="row list-news">
       		<?php
	        $news = $this->requestAction('news/listnews'); 
	        $i = 0;
	        foreach ($news as $news){
				if($i == 3){
	        		break;
	        	}
	        	$i++;
	    	?><div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12 no-padding">
					<div class="featured-thumb">
						<a href="#">
						<img src="<?php echo $this->webroot.'files/news/image/'.$news['News']['id'].'/'.$news['News']['image'];?>" class="img-responsive">
						</a>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 no-padding-right">
					<div class="entry-content">
						<div class="blog_entry-header-inner">
							<h2 class="blog_entry-title"><?php echo $this->Html->link($news['News']['title'],array('controller' => 'news','action' => 'view/'.$news['News']['id']));?> </h2>
						</div>
						<div class="entry-content">
							<?php if (strlen($news['News']['content']) >1000) {
								echo substr($news['News']['content'],0,1000).'<span>...</span>';
								}else{
									echo $news['News']['content'].'<span>...</span>';
								}
							?>
						</div>
						<p><?php echo $this->Html->link('Xem chi tiết', array('controller' => 'news','action' => 'view/'.$news['News']['id']));?> <i class="fa fa-angle-double-right"></i></p>
					</div>
				</div>
			</div>
			<div style="clear: both"></div>
				<?php 
			}

	        ?>
			</div>
		</div>

	</div>
	</div>
    </div>
</section>
