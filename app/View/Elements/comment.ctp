<section>
	<div class="container">
		<div class="comment">
			<div class="row">
				<div class="col-md-12">
					<div class="content-title">
						<h3>Ý kiến khách hàng</h3>
					</div>
					<div class="people-content">
						<div class="row">
						<?php 
						 $comments = $this->requestAction('comments/collect');

						$i = 0;
						foreach ($comments as $comment): 
							$i = $i + 1; 
						?>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="img-people">
									<img src="<?php echo $this->webroot.'files/user/image/'.$comment['User']['id'].'/'.$comment['User']['image'];?>">
								</div>
								<div class="people-comment">
									<div class="comment-top">
										<p><?php echo ($comment['Comment']['content']); ?></p>
									</div>
									<span>Khách hàng: </span><span class="name"><?php echo $comment['User']['username'];?></span>
								</div>
							</div>
						<?php if($i == 4){ break; } endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
