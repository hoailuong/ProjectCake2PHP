<?php if ($this->Session->check('cart')): ?>
<section>
	<div class="container">
		<div class="col-main">
			<div class="order">
				<div class="title">
					<h2>Giỏ hàng của bạn</h2>
				</div>
				
				<div class="template-cart">
						<div class="table-responsive">
							
							<table class="table table-bordered">
								<thead>
									<tr><th id="image">Ảnh</th>
									<th id="name">Sản phẩm</th>
									<th id="price">Giá</th>
									<th id="quantity">Số lượng</th>
									<th>Xóa</th>
								</tr>
								</thead>
								<?php $cart = $this->Session->read('cart');
								if(isset($cart)){
									foreach ($cart as $product):
							?>
								<tbody>
									<tr>
										<td>
											<a href="#">
												<img src="<?php echo $this->webroot.'files/product/image/'.$product['id'].'/'.$product['image'];?>">
											</a>
										</td>
										<td>
											<a href="#"><?php echo $product['name'];?></a>
											
										</td>
										<td><span class="price"><?php echo number_format($product['sale_price']);?>₫</span></td>
										<td>
											<?php echo $this->Form->create('Product',array('action' => 'update_cart'));?>
											<?php echo $this->Form->input('id', array('value' => $product['id'], 'type' => 'hidden')); ?>
												<?php echo $this->Form->input('quantity', array('value' => $product['quantity'], 'label' => false, 'div' => false,'min' => 1, 'type' =>'number')); ?>
												<?php echo $this->Form->button('Cập nhật',array('type' => 'submit','label' => false, 'class' => 'btn btn-default'));?>
											<?php echo $this->Form->end();?>
										</td>
										<td><?php echo $this->Form->postLink('<i class="fa fa-trash"></i>',array('action' => 'delete_cart/'.$product['id']),array('escape' => false,));?></td>
									</tr>
								</tbody>
								<?php  endforeach; }?>
							</table>
							
						</div>
						<div class="order-bottom">
			                <div class="total">Tổng tiền: <span><?php echo number_format($payment['total']); ?>₫</span> &nbsp; &nbsp;
								
								<div class="btn-order">
									<a href="<?php echo $this->webroot;?>" title="">Quay lại của hàng</a>
								</div>&nbsp;
								<div class="btn-order">
									<a href="#" title=""><?php echo $this->Form->postLink('Hủy giỏ hàng',array('action' => 'empty_cart'));?></a>
								</div>&nbsp;
								<div class="btn-order">
									<?php echo $this->Html->link('Thanh toán',array('controller' => 'orders','action' => 'checkout'));?>
								</div>
			                </div>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php else: ?>
	    <div class="container" style="font-family: serif; font-size: 20px; padding-bottom: 25px">Không có sản phẩm nào trong giỏ hàng của bạn!</div>
	<?php endif ?>