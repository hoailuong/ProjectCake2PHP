<?php
echo $this->Html->script('tinymce/tinymce.min');
?>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<div class="news form">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit News'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('label' => 'Tiêu đề', 'class' => 'form-control'));
		echo $this->Form->input('content',array('label' => 'Nội dung', 'class' => 'form-control'));
		echo $this->Form->input('image', array('label' => 'Hình ảnh', 'class' => 'form-control', 'type' => 'file'));
		echo $this->Form->input('type_id',array('label' => 'Danh mục tin tức', 'class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('News.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('News.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
	</ul>
</div>
