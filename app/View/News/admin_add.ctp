<?php
echo $this->Html->script('tinymce/tinymce.min');
?>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<div class="news form">
<?php echo $this->Form->create('News', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add News'); ?></legend>
	<?php
		echo $this->Form->input('title',array('label' => 'Tiêu đề', 'class' => 'form-control'));
		echo $this->Form->input('content',array('label' => 'Nội dung', 'class' => 'form-control', 'required' => false));
		echo $this->Form->input('image', array('label' => 'Hình ảnh', 'class' => 'form-control', 'type' => 'file'));
		echo $this->Form->input('type_id',array('label' => 'Danh mục tin tức', 'class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
	</ul>
</div>
