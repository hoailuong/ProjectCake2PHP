<div class="users view">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3">
				<h3 class="padding"> Hình đại diện</h3>
				
				<?php   echo $this->html->image('/files/user/image/'.$user['User']['id'].'/'.$user['User']['image'],array('width'=>'200px','class' => 'img-responsive'));
                                ?>
			</div>
			<div class="col-md-7">
				<table class="table table-responsive">
					<h3> Thông Tin Cơ Bản</h3>
					<tr>
						<td>Tên khách hàng:</td>
						<td><?php echo h($user['User']['username']); ?></td>
					</tr>
					<tr>
						<td>Địa chỉ Email:</td>
						<td><?php echo h($user['User']['email']); ?></td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td><?php echo h($user['User']['phone']); ?></td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td><?php echo h($user['User']['address']); ?></td>
					</tr>
				</table>
				<table class="table table-responsive">
				
					<tr>
						<td><?php echo $this->Form->postLink(__('Xóa Tài Khoản'), array('action' => 'delete', $user['User']['id']), array(), __('Bạn có chắn chắn xóa # %s không?', $user['User']['id'])); ?></td>
					</tr>
				</table>
				<h3></h3>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>
