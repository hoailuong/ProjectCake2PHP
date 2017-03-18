<?php
echo $this->Html->script('tinymce/tinymce.min');
?>
<script>
  tinymce.init({
    selector: 'textarea'
  });
	</script>
<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Coupon'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
	</ul>
</div>
