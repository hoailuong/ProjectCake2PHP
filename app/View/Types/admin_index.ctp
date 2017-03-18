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
<div class="types index">
	<h2><?php echo __('Danh mục tin tức'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('Mã code'); ?></th>
			<th><?php echo __('Tên danh mục'); ?></th>
			<th><?php echo __('Slug'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($types as $type): ?>
	<tr>
		<td><?php echo h($type['Type']['id']); ?>&nbsp;</td>
		<td><?php echo h($type['Type']['name']); ?>&nbsp;</td>
		<td><?php echo h($type['Type']['slug']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $type['Type']['id'])); ?>&nbsp;
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $type['Type']['id'])); ?>&nbsp;
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $type['Type']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $type['Type']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List News'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
	</ul>
</div>
