<?php
echo $this->Html->script('tinymce/tinymce.min');
?>
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<div class="products form">
<?php echo $this->Form->create('Product', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Product'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Tên sản phẩm', 'class' => 'form-control'));
		echo $this->Form->input('image' ,array('label' => 'Hình ảnh', 'class' => 'form-control', 'type' => 'file'));
		echo $this->Form->input('description',array('label' => 'Mô tả', 'class' => 'form-control', 'required' => false));
		echo $this->Form->input('price',array('label' => 'Giá', 'class' => 'form-control'));
		echo $this->Form->input('sale_price',array('label' => 'Giá đã giảm', 'class' => 'form-control'));
		echo $this->Form->input('slug',array('label' => 'Slug', 'class' => 'form-control'));
		echo $this->Form->input('category_id',array('label' => 'Danh mục sản phẩm', 'class' => 'form-control'));
		
		echo $this->Form->input('status',array('label' => 'Còn hàng', 'class' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
