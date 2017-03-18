<?php
echo $this->Html->script('tinymce/tinymce.min');
?>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label' => 'Tên khách hàng', 'class' => 'form-control'));
		echo $this->Form->input('email',array('label' => 'Email', 'class' => 'form-control'));
		echo $this->Form->input('phone',array('label' => 'Số điện thoại', 'class' => 'form-control'));
		echo $this->Form->input('address',array('label' => 'Địa chỉ', 'class' => 'form-control'));
		echo $this->Form->input('status', array('label' => 'Đã giao','class' => 'checkbox'));
		echo $this->Form->input('cart_infor',array('label' => 'Thông tin giỏ hàng', 'class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Order.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Order.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
	</ul>
</div>
