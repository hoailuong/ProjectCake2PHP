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
<div class="news index">
	<h2><?php echo __('Tin tức'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id="table_id">
	<thead>
	<tr>
			<th><?php echo __('Mã code'); ?></th>
			<th><?php echo __('Tiêu để'); ?></th>
			
			<th><?php echo __('Hình ảnh'); ?></th>
			<th><?php echo __('Ngày đăng'); ?></th>
			<th><?php echo __('Danh mục tin tức'); ?></th>
			<th class="actions"><?php echo __('Chức năng'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($news as $news): ?>
	<tr>
		<td><?php echo h($news['News']['id']); ?>&nbsp;</td>
		<td><?php echo h($news['News']['title']); ?>&nbsp;</td>
		
		<td><img src="<?php echo $this->webroot.'files/news/image/'.$news['News']['id'].'/'."thumb_".$news['News']['image'];?>">&nbsp;</td>
		<td><?php echo h($news['News']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($news['Type']['name'], array('controller' => 'types', 'action' => 'view', $news['Type']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $news['News']['id'])); ?>&nbsp;
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $news['News']['id'])); ?>&nbsp;
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $news['News']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $news['News']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New News'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
	</ul>
</div>
