<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
	        $images = $this->requestAction('images/slide'); 
	        $i = 0;
	        foreach ($images as $image){

	        	if($i == 3){
	        		break;
	        	}
	        	$i++;
	    ?>
	        <div class="item <?php if($i == 1){echo 'active'; }?>">
				<img src="<?php echo $this->webroot.'files/image/image/'.$image['Image']['id'].'/'.$image['Image']['image'];?>" class="img-responsive">
					<div class="carousel-caption">
						<div class="navbar-header">
							<div class="container">
								<div class="row text">
									<div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-2">
										<div class="logo">
											<a title="FreshFood-LV" href="/">
											<img alt="FreshFood-LV" src="<?php echo $this->webroot; ?>files/image/image/8/logo.png" class="img-responsive">
											</a>
										</div>
										<div class="slogan">
											<span>Cửa hàng thực phẩm sạch</span>
										</div>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-1 col-sm-offset-2">
										<?php echo $this->Form->create('Product',array('action' => 'get_keyword'));?>
											<?php echo $this->Form->input('keyword',array('label' => '','div' => false,'placeholder' => 'Nhập từ khoá tìm kiếm....','class'=>'form-control search',)); ?>

											<button type="submit" name="search" id="search-btn"><span class="glyphicon glyphicon-search"></span></button>
										<?php echo $this->Form->end(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }
				

	        ?>
		
	</div>
	

</div>