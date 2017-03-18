<section>
			<div class="container">
				<div class="row details">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<a href="#" title="">
							<img src="<?php echo $this->webroot.'files/product/image/'.$product['Product']['id'].'/'.$product['Product']['image'];?>" class="img-responsive">
						</a>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<h1><?php $sp['id'] = $product['Product']['id']; echo $product['Product']['name'];?></h1>
						<p class="price">
							<span class="price"><?php echo number_format($product['Product']['sale_price']);?>₫</span> <span class="old-price"><?php echo number_format($product['Product']['price']);?>₫</span>
						</p>
						<div class="service-content hidden-sm hidden-xs">
							<div class="col-md-5">
								<div class="service-1 col-service">
									<div class="service-icon">
										<i class="fa fa-phone-square"></i>
									</div>
									<div class="service-text">
										<a href="tel:0963.647.129">
										<span>Đặt hàng nhanh</span><br>
										<strong>0963.647.129</strong>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="arrow">
									<img src="<?php echo $this->webroot; ?>files/image/image/13/deatail_03.png">
								</div>
							</div>
							<div class="col-md-5">
								<div class="service-3 col-service">
									<div class="service-icon">
										<i class="fa fa-cart-plus"></i>
									</div>
									<div class="service-text">
										<a href="#">
										<?php echo $this->Html->link('Giỏ hàng', array('action' => 'view_cart'));?><br>
										<strong><span class="cart_count">
											0
										</span> Sản phẩm</strong>
										</a>
									</div>
								</div>
							</div>
						</div>
							<div class="bg-selector-wrapper">
								<div class="bg_selector">
									<div class="col-md-6 col-sm-6 col-xs-12 no-padding-left">
										
										<label>Số lượng</label>
										<input type="number" class="input-control" name="quantity" value="1" min="1" id="quantity">
										</div>
									<div class="col-md-6">
										
									</div>
								</div>
								<div class="row">
			                        <div class="col-md-4">
                        	          
                        	          <button><?php echo $this->Form->postLink('Thêm vào giỏ hàng','/products/add_to_cart/'.$product['Product']['id'], array('escape' => false,'class'=>"btn btn-default")); ?></button>

			                        </div>
			                        
			                        <div class="col-md-5"></div>
		                        </div>
							</div>
					</div>
				</div>
				<div class="row prod-infor">
					<div class="col-md-9 col-sm-12 col-xs-12 information">
						<h1>Đặc điểm nổi bật</h1>
						<div class="rte">
							<p><?php echo $product['Product']['name'];?></p></br>
						<p><?php echo $product['Product']['description'];?></p>	
						</div>
					</div>
					<div class="col-right col-md-3 hidden-sm hidden-xs">
						<div class="policy">
							<div class="content">
								 <?php
								        $types = $this->requestAction('types/menu');
								        foreach ($types as $type)
								        {
								          ?>
										<div class="policy-1">
										<a href="<?php echo $this->webroot.'types/view/'.$type['Type']['id']?>"><span class="glyphicon glyphicon-gift"></span> <?php echo $type['Type']['name'];?></a>
									</div>
							          <?php
									        }
									  ?>
							</div>
						</div>
						<div class="right category">
							<div class="title">
								<h2>Sản phẩm liên quan</h2>
							</div>
							<div class="content">
							<?php 
							$products = $this->requestAction('products/khuyenmai'); 
				$i = 0;
				foreach ($products as $product): 
					$i = $i + 1; 
				?>
								<div class="pro-detail">
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4 img">
											<a href="#">
												<img src="<?php echo $this->webroot.'files/product/image/'.$product['Product']['id'].'/'.$product['Product']['image'];?>" class="img-responsive">
											</a>
										</div>
										<div class="col-md-8 col-sm-8 col-xs-12 infor">
											<a href="#">
												<h2><?php echo $this->Html->link($product['Product']['name'],array('controller' => 'products','action' => 'view/'.$product['Product']['id']));?></h2>
											</a>
											<div class="prodaction">
												<div class="pricebox">
													<p class="special-price"> <small>Giá: </small><?php echo ($product['Product']['sale_price']); ?>₫</p>
										<p class="old-price"><small>Giá: </small><?php echo ($product['Product']['price']); ?>₫</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<?php
										 if($i == 3){ break; } endforeach; 
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="row comment">
					<div class="col-md-9">
						<h1>Nhận xét của khách hàng</h1>
						<!-- <form class="form-group">
							<textarea class="form-control" rows="3"></textarea><br>
							<button type="button" class="btn btn-success">Gửi</button>
						</form> -->


						<?php echo $this->Session->flash(); ?>
							<?php if (!empty($comments)): ?>
								<?php foreach ($comments as $comment): ?>									
										<div class="row">
											<div class="col-md-12">
												<b><?php echo $comment['User']['username']; ?></b>
												<p><?php echo $comment['Comment']['content']; ?><br></p>
												<i><?php echo $comment['Comment']['created']; ?></i>
												<?php if($this->Session->check('user')){
													if($this->Session->read('user.admin') != 0){
														echo $this->Form->postLink('Xóa Comment này',array('controller' => 'comments','action'=> 'delete',$comment['Comment']['id']));

													}
													}?>
												<hr>
											</div>
										</div>
									<?php endforeach; ?>
									<div class="row">
										<div class="col-md-12">
											<?php else: ?>
												<p class="comment">Chưa có nhận xét nào</p>
											<?php endif; ?>
											<?php if($this->Session->check('session')){ ?>
												<h4>Chia sẻ ý kiến của bạn nào !!!</h4>
												<?php //echo $this->element('errors'); ?>
												<?php// if (!empty($user_info)): ?>
												
												<?php echo $this->Form->create('Comment',array('action'=>'add','novalidate'=>true,'class'=>'commentform')); ?>
												<?php
												$user = $this->Session->read('session');
												$user_id = $user['User']['id'];
													
													echo $this->Form->input('content',array('label'=>'','rows'=>'5','class'=>'form-control','required'=>false));
													echo $this->Form->input('user_id',array('required'=>false,'label'=>'', 'type'=>'hidden','value'=>$user_id,'hidden'=>true));
													echo $this->Form->input('product_id',array('required'=>false,'label'=>'','type'=>'hidden','value'=>$sp['id']));
													
												?>
											<?php echo $this->Form->button('Đăng',array('type'=>'submit','class'=>'btn btn-success', 'style' => 'margin-top: 15px')); ?>
											<?php echo $this->Form->end(); ?>
											<?php }else{ ?>
											<h4>Đăng nhập để nhận xét nhé !!!</h4>
											<?php } ?>
										</div>
									</div>



					</div>
				</div>
			</div>
		</section>