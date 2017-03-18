<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Coupon'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code',array('label' => 'Mã giảm giá', 'class' => 'form-control'));
		echo $this->Form->input('percent',array('label' => 'Phần trăm', 'class' => 'form-control'));
		echo $this->Form->input('start day',array('label' => 'Ngày bắt đầu', 'class' => 'form-control'));
		echo $this->Form->input('end day',array('label' => 'Ngày kết thúc', 'class' => 'form-control'));
		echo $this->Form->input('description',array('label' => 'Mô tả', 'class' => 'form-control', 'required' => false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Coupon.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Coupon.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
	</ul>
</div>
