<?php if ($this->Session->check('cart')): ?>
<section>
	<div class="container">
		<div class="row payment">
			<div class="title">
				<a href="<?php echo $this->webroot.'';?>" title="">FreshFood</a>
			</div>
			<div class="col-md-6">
			<?php echo $this->Form->create('Order',array('action' => 'checkout'));?>
				<h2>Thông tin mua hàng</h2>
				<h3 class="more"><a href="<?php echo $this->webroot.'dang-ky';?>" title="">Đăng ký tài khoản mua hàng </a>| <a href="#" title="">Đăng nhập</a></h3>
					<div class="form-group">
						
						<?php echo $this->Form->input('name',array('label' => false,'placeholder' => 'Họ và tên','class' => 'form-control', 'id' => 'exampleInputEmail1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email', 'class' => 'form-control', 'type' => 'email','id' => 'exampleInputEmail1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('phone',array('label' => false,'placeholder' => 'Số điện thoại','class' => 'form-control', 'id' => 'exampleInputEmail1'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('address',array('label' => false,'placeholder' => 'Địa chỉ','class' => 'form-control', 'id' => 'exampleInputPassword1'));?>

					</div>
					<?php echo $this->Form->button('Đặt hàng',array('type' => 'submit','label' => false,'class' => 'btn btn-primary') );?>
					<?php echo $this->Form->end();?>
			</div>

			<div class="col-md-6">
				<div class="order-summary">
					<div class="title">
						<h2>
							Đơn hàng
						</h2>
					</div>
					<div class="summary-body">
					
						<div class="summary-product-list">
							<div class="product-list">
							<?php $cart = $this->Session->read('cart');?>
						<?php foreach ($cart as $product):?>
								<div class="product ">
									<img src="<?php echo $this->webroot.'files/product/image/'.$product['id'].'/'.$product['image'];?>" class="img-responsive">
									<div class="product-info pull-left">
										<span class="product-info-name">
										<strong><?php echo $product['name'];?></strong> x <?php echo number_format($product['quantity']);?>
										</span>
									</div>
									<strong class="product-price">
									<?php echo number_format($product['sale_price']);?>₫
									</strong>
								</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
					
					<div class="summary">
						<div class="total-line">
							<span>
							Tổng cộng: 
							</span>
							<span class="price"><?php $payment = $this->Session->read('payment');?>
								<?php echo number_format($payment['total']); ?>₫</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php else: ?>
    Không có sản phẩm nào trong giỏ hàng của bạn!
<?php endif ?>