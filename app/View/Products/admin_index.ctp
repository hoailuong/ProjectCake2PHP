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

<div class="products index">
	<h2><?php echo __('Sản Phẩm'); ?></h2>
	<table class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('Mã code'); ?></th>
			<th><?php echo __('Tên sản phẩm'); ?></th>
			<th><?php echo __('Hình ảnh'); ?></th>
			<th><?php echo __('Giá'); ?></th>
			<th><?php echo __('Giá đã giảm'); ?></th>
			<th><?php echo __('Slug'); ?></th>
			<th><?php echo __('Ngày tạo'); ?></th>
			<th><?php echo __('Danh mục sản phẩm'); ?></th>
			<th><?php echo __('Status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo ($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo ($product['Product']['name']); ?>&nbsp;</td>
		<td><img src="<?php echo $this->webroot.'files/product/image/'.$product['Product']['id'].'/'."thumb_".$product['Product']['image'];?>">&nbsp;</td>
		<td><?php echo ($product['Product']['price']); ?>&nbsp;</td>
		<td><?php echo ($product['Product']['sale_price']); ?>&nbsp;</td>
		<td><?php echo ($product['Product']['slug']); ?>&nbsp;</td>
		<td><?php echo ($product['Product']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		
		<td><?php
		if (($product['Product']['status']) == 1) {
			echo "Còn hàng";
		}elseif (($product['Product']['status']) == 0) {
			echo "Hết hàng";
		}
		?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
