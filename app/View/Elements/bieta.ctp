<div class="service-content hidden-sm hidden-xs">
								<div class="col-md-4">
									<div class="service-1 col-service">
										<div class="service-icon">
											<span class="glyphicon glyphicon-phone-alt"></span>
										</div>
										<div class="service-text">
											<span>Đặt hàng nhanh</span><br>
											<strong>0963.647.129</strong>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service-2 col-service">
										<div class="service-text">
											<span>Bạn chọn 1 trong 2 cách để <br>bạn mua hàng</span>
										</div>
										<div class="service-bottom">
											<strong style="text-align:center">
											<span class="glyphicon glyphicon-arrow-left"></span> Hoặc <span class="glyphicon glyphicon-arrow-right"></span></strong>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="service-3 col-service">
										<div class="service-icon">
											<span class="glyphicon glyphicon-shopping-cart"></span>
										</div>
										<div class="service-text">
											<?php echo $this->Html->link('Giỏ hàng', array('action' => 'view_cart'));?><br>
											<strong><span class="cart_count">
												<?php echo $this->Session->flash('cart'); ?>
		              <?php if ($this->Session->check('cart')): ?>
		                <?php $cart = $this->Session->read('cart');?>
		               <?php $total = 0; ?>
		              <?php foreach ($cart as $product): ?>
		                  <?php 
		                    $total = $total + $product['quantity'];
		                  ?>
		              <?php endforeach ?>
		              <?php echo $total; ?>
		              <?php else: echo 0; ?>
		              <?php endif ?>
											</span> Sản phẩm</strong>
										</div>
									</div>
								</div>
							</div>