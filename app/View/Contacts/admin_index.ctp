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
<div class="contacts index">
	<h2><?php echo __('Liên hệ'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('Mã code'); ?></th>
			<th><?php echo __('Tên khách hàng'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Nội dung'); ?></th>
			<th><?php echo __('Ngày gửi'); ?></th>
			<th><?php echo __('Trạng thái'); ?></th>
			<th class="actions"><?php echo __('Chức năng'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($contacts as $contact): ?>
	<tr>
		<td><?php echo h($contact['Contact']['id']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
		<td><?php echo ($contact['Contact']['content']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['created']); ?>&nbsp;</td>
		<td><?php
			if(h($contact['Contact']['status']) == 1){
				echo "Đã đọc";
			}elseif (h($contact['Contact']['status']) == 0) {
				echo "Chưa đọc";
			}
		?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?>&nbsp;
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id'])); ?>&nbsp;
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $contact['Contact']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?></li>
	</ul>
</div>
