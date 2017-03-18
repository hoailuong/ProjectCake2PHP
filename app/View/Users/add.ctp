<section>
	<div class="container">
		<div class="row register">
			<div class="col-md-6 col-sm-12 form">
				<div class="title">Đăng ký</div>
				<div class="content">
					<?php echo $this->Form->create('User',array('action' => 'add','class' => 'form-horizontal','type' => 'file')); ?>
						<div class="form-group">
							<label>Họ và Tên</label>
							<?php echo $this->Form->input('username',array('type' => 'text','label' => false,'placeholder' => 'Nhập tên của bạn tại đây','class' => 'form-control'));?>
						</div>
						<div class="form-group">
							<label>Email</label>
							<?php echo $this->Form->input('email',array('type' => 'email','label' => false,'placeholder' => 'Nhập email của bạn tại đây','class' => 'form-control'));?>
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<?php echo $this->Form->input('password', array('type' => 'password', 'label' =>false, 'placeholder' => 'Nhập password của bạn tại đây', 'class' =>'form-control'));?>
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<?php echo $this->Form->input('phone', array('type' => 'text', 'label' =>false, 'placeholder' => 'Nhập số điện thoại của bạn tại đây', 'class'=>'form-control'));?>
						</div>
						<div class="form-group">
							<label>Địa chỉ</label>
							<?php echo $this->form->input('address', array('type' => 'text', 'label' => false, 'placeholder' => 'Nhập địa chỉ của bạn tại đây', 'class' => 'form-control'));?>
						</div>
						<div class="form-group">
							<label>Hình ảnh</label>
							<?php echo $this->Form->input('image', array('class' => 'form-control','type' => 'file','label' => false));?>
						</div>
						<?php echo $this->form->button('Đăng ký', array('type' => 'submit', 'class' => 'btn btn-default', 'label' => false));?>
				</div>
			</div>
		</div>
	</div>
</section>
