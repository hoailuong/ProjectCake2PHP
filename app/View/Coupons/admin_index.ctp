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
<div class="coupons index">
	<h2><?php echo __('Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('id'); ?></th>
			<th><?php echo __('Mã giảm giá'); ?></th>
			<th><?php echo __('Phần trăm giảm'); ?></th>
			<th><?php echo __('Ngày bắt đầu'); ?></th>
			<th><?php echo __('Ngày kết thúc'); ?></th>
			<th><?php echo __('Mô tả'); ?></th>
			<th><?php echo __('Ngày tạo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($coupons as $coupon): ?>
	<tr>
		<td><?php echo ($coupon['Coupon']['id']); ?>&nbsp;</td>
		<td><?php echo ($coupon['Coupon']['code']); ?>&nbsp;</td>
		<td><?php echo ($coupon['Coupon']['percent']); ?>&nbsp;</td>
		<td><?php echo ($coupon['Coupon']['start day']); ?>&nbsp;</td>
		<td><?php echo ($coupon['Coupon']['end day']); ?>&nbsp;</td>
		<td><?php echo ($coupon['Coupon']['description']); ?>&nbsp;</td>
		<td><?php echo ($coupon['Coupon']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coupon['Coupon']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $coupon['Coupon']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?></li>
	</ul>
</div>
