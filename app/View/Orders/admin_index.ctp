<?php
echo $this->Html->script('jquery.dataTables.min'); 
echo $this->Html->css('jquery.dataTables');
?>

<script>
$(document).ready( function ()
 {
    $('#table_id').DataTable();
} );
</script>
<div class="orders index">
	<h2><?php echo __('Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('Mã code'); ?></th>
			<th><?php echo __('Tên sản phẩm'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Số điện thoại'); ?></th>
			<th><?php echo __('Địa chỉ'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th><?php echo __('Status'); ?></th>
			<th><?php echo __('Thông tin giỏ hàng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['name']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['email']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['phone']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['address']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['verify']); ?>&nbsp;</td>
		<td><?php
		if(h($order['Order']['status']) == 1){
			echo 'Đã giao';
		}elseif (h($order['Order']['status']) == 0) {
			echo 'Chưa giao';
		}
		?>&nbsp;</td>
		<td><?php echo h($order['Order']['cart_infor']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
	</ul>
</div>
