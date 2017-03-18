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
<div class="images index">
	<h2><?php echo __('Hình ảnh'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered" id='table_id'>
	<thead>
	<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Description'); ?></th>
			<th><?php echo __('Image'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Slideshow'); ?></th>
			<th><?php echo __('Header'); ?></th>
			<th><?php echo __('Advertisement'); ?></th>
			<th><?php echo __('Background'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($images as $image): ?>
	<tr>
		<td><?php echo h($image['Image']['id']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['name']); ?>&nbsp;</td>
		<td><?php echo ($image['Image']['description']); ?>&nbsp;</td>
		<td><img src="<?php echo $this->webroot.'files/image/image/'.$image['Image']['id'].'/'."thumb_".$image['Image']['image'];?>">&nbsp;</td>
		
		<td><?php echo h($image['Image']['created']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['slideshow']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['header']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['advertisement']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['background']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $image['Image']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $image['Image']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $image['Image']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $image['Image']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?></li>
	</ul>
</div>
