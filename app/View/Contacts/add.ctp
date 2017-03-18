<section>
	<div class="container">
		<div class="row contact">
			<div class="col-md-6 col-sm-12 form">
				<div class="title">Liên hệ</div>
				<div class="content">
					<?php echo $this->Form->create('Contact',array('controller' => 'add','action' => 'add'));?>
						<div class="form-group">
							<label >Họ và tên:<span>*</span></label>
							
							 <?php echo $this->Form->input('name',array('type' => 'text','label' => false,'placeholder' => 'Nhập tên của bạn tại đây','div' => false,'class' => 'form-control', 'required' ));?>
						</div>
						<div class="form-group">
							<label>Email:<span>*</span></label>
							
							<?php echo $this->Form->input('email',array('type' => 'text','label' => false,'placeholder' => 'Nhập email của bạn tại đây','div' => false,'class' => 'form-control', 'required' ));?>
						</div>
						<div class="form-group">
							<label>Nội dung: <span>*</span></label>
							<?php echo $this->Form->textarea('content',array('type' => 'textarea','label' => false,'placeholder' => 'Nhận xét của bạn...','div' => false,'class' => 'form-control','rows'=>'4'));?>
						</div>
						<?php echo $this->Form->button('Gửi liên hệ',array('type' => 'submit','class' => 'btn btn-default'));?>

					<?php echo $this->Form->end();?>
				</div>
			</div>
			<?php echo $this->element('address');?>
		</div>
	</div>
</section>