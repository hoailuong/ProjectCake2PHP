
<div class="container-fluid">
	<div class="container">
		<div class="row header-top">
			<div class="col-md-4 col-sm-4 col-xs-12 left">
				<div class="row">
					
					<?php 
						if($this->Session->check('session')){
							$user = $this->Session->read('session');

							echo '<span class="glyphicon glyphicon-user" &nbsp; ></span>'.' '.$user['User']['username'].'| ';
							// echo $this->Html->link(' | Thông tin ', '/thong-tin');
							echo '<span class="glyphicon glyphicon-off" &nbsp; ></span>'.' '.$this->Html->link(' Đăng xuất | ', '/dang-xuat');
						}else{ ?>
						<span class="glyphicon glyphicon-floppy-disk" ></span>
					<?php echo $this->Html->link('Đăng nhập', '/dang-nhap');?>&nbsp;|
					<span class="glyphicon glyphicon-user"></span>
					<?php echo $this->Html->link('Đăng ký', '/dang-ky');?>&nbsp;|

					<?php	}

					?>
					<span class="glyphicon glyphicon-shopping-cart" ></span>
					<?php echo $this->Html->link('Giỏ hàng', array('action' => 'view_cart'));?>
					<span class="cart">
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
					</span>
				</div>
			</div>
			<div class="col-md-8 col-sm-8 right">
				<span class="glyphicon glyphicon-earphone"></span>&nbsp;Hotline: 123.456.789 | 0165.270.4385
			</div>
		</div>
	</div>
</div>