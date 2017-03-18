<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username',array('label' => 'Họ và tên', 'class' => 'form-control'));
		echo $this->Form->input('email',array('label' => 'Email', 'class' => 'form-control'));
		echo $this->Form->input('password',array('label' => 'Mật khẩu', 'class' => 'form-control'));
		echo $this->Form->input('phone',array('label' => 'Số điện thoại', 'class' => 'form-control'));
		echo $this->Form->input('address',array('label' => 'Địa chỉ', 'class' => 'form-control'));
		echo $this->Form->input('image',array('label' => 'Hình ảnh', 'class' => 'form-control', 'type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
