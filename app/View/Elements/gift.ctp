<section>
			<div class="container">
				<div class="col-md-12 hidden-sm hidden-xs gift">
					<div class="content-title">
						<h3>Rau sạch</h3>
					</div>
					<div class="prod-content">
						<div class="row">
						<?php 
						$products = $this->requestAction('products/gift'); 
								$i = 0;
								foreach ($products as $product):
									$i++;
								
								?>
							<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="prodgrid">
					<div class="prodimg">
						<a href="#">
						<img src="<?php echo 'files/product/image/'.$product['Product']['id'].'/'.$product['Product']['image']; ?>" class="img-responsive">
						</a>
					</div>
					<div class="prodinfo">
							<h2><?php echo $this->Html->link($product['Product']['name'],array('controller' => 'products','action' => 'view/'.$product['Product']['id']));?></h2>
						<div class="prodaction">
							<div class="pricebox">
								<p class="special-price"> <small>Giá: </small><?php echo ($product['Product']['sale_price']); ?>₫</p>
								<p class="old-price"><small>Giá: </small><?php echo ($product['Product']['price']); ?>₫</p>
							</div>
							<div class="action">
								<form action="">
									<?php echo $this->Form->end();?> <?php echo $this->Html->link('Mua hàng', array('action' => 'view/'.$product['Product']['id']),array('class' => 'btn btn-default'));?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
						<?php if($i == 3){ break; } endforeach; 
						?>
						</div>
					</div>
				</div>
			</div>
		</section>