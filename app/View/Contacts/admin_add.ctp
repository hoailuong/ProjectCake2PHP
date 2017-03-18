<?php
echo $this->Html->script('tinymce/tinymce.min');
?>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<div class="contacts form">
<?php echo $this->Form->create('Contact'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Contact'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Tên khách hàng', 'class' => 'form-control'));
		echo $this->Form->input('email',array('label' => 'Email', 'class' => 'form-control'));
		echo $this->Form->input('content',array('label' => 'Nội dung', 'class' => 'form-control', 'required' => false));
		echo $this->Form->input('status',array('label' => 'Đã đọc', 'class' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?></li>
	</ul>
</div>
