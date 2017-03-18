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
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('id'); ?></th>
			<th><?php echo __('Họ và Tên'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Mật khẩu'); ?></th>
			<th><?php echo __('Số điện thoại'); ?></th>
			<th><?php echo __('Địa chỉ'); ?></th>
			<th><?php echo __('Ngày tạo'); ?></th>
			<th><?php echo __('Hình ảnh'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo ($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['phone']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['address']); ?>&nbsp;</td>
		<td><?php echo ($user['User']['created']); ?>&nbsp;</td>
		<td><img src="<?php echo $this->webroot.'files/user/image/'.$user['User']['id'].'/'."thumb_".$user['User']['image'];?>">&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
