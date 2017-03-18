<div>
	<b>Thông tin khách hàng</b>
	<ul>
		<li>Tên khách hàng: <?php echo $order['Order']['name'];?></li>
		<li>Email khách hàng: <?php echo $order['Order']['email'];?></li>
		<li>Địa chỉ khách hàng: <?php echo $order['Order']['address'];?></li>
		<li>Điện thoại khách hàng: <?php echo $order['Order']['phone'];?></li><hr>
	</ul><hr>
	<b>Thông tin sản phẩm:</b>
			<?php 
				$order_info = $order['Order']['cart_infor'];
				$products = json_decode($order_info,true);
			?>

			<table class="table">
			<tr><th>Tên sản phẩm</th><th>Giá bán</th><th>số lượng</th></tr>
				<?php foreach($products as $products){?>
				<tr><td><?php echo $products['name'];?></td><td><?php echo $products['sale_price'];?> VNĐ</td><td><?php echo $products['quantity'];?></td></tr>

			<?php }?></table>
		<hr>
			
	<b>Thông tin đơn hàng:</b>
		<?php $payment = $this->Session->read('payment');
					$payment = json_decode($payment_info,true);?>
				<ul>
					<li>Tổng số tiền đơn hàng: 	<?php echo number_format($payment['total']);;?> ₫</li>
					<?php if(isset($payment['coupon'])){?>
					<li>Giá phải trả: 	<?php echo $payment['pay'];?> VNĐ</li>
					<?php }?>
					<li>Tình Trạng: <?php if($order['Order']['status'] == 0){
						echo 'Đơn hàng chưa được giao dịch';}else{
							echo 'Đơn hàng đã được giao ';
							}?>
					</li>
					<li>Đơn hàng được đặt vào ngày: <?php echo h($order['Order']['created']); ?></li>
				</ul>
</div>

		
<div class="actions">
	<b><?php echo __('Hành động: '); ?></b>
		<?php echo $this->Html->link(__('Xác nhận đã chuyển'), array('action' => 'done', $order['Order']['id']),array('class' => 'btn btn-primary')); ?> | 
		<?php echo $this->Form->postLink(__('Xóa đơn hàng'), array('action' => 'delete', $order['Order']['id']), array(), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>  | <?php echo $this->Html->link(__('Danh sách đơn hàng'), array('action' => 'index')); ?>
</div>
