
<section>
    <div class="section container">
       
        <div class="container">             		
					<?php if($notfound == false && isset($results)):?>
					<h4>Kết quả tìm kiếm của từ khóa <strong><i><?php echo $keyword;?></i></strong></h4>
					<?php $i = 0;?>
					<?php foreach($results AS $product):?>
						<div class="col-md-3">
	                       	<div class="thumbnail">
	                            <div class="hoverimg"><img class="img-responsive" src="<?php echo $this->webroot.'files/product/image/'.$product['Product']['id'].'/'.$product['Product']['image'];?>"/></div>
	                            <div class="caption">
	                                <h4><?php echo $this->Html->link($product['Product']['name'],array('controller' => 'products','action' => 'view/'.$product['Product']['id']));?></h4>
	                                <ul class="list-inline">
	                                    <li>
	                                    	<?php echo $this->Form->postLink('<i class="fa fa-exchange option"></i>','/products/view/'.$product['Product']['id'], array('escape' => false,)); ?>
	                                    </li>  

	                                    <li><p class="text"><?php echo number_format($product['Product']['sale_price']);?>.000 VNĐ</p></li>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
					    <?php $i += 1;?>
					    <?php if($i == 4){?>
					    	<div class="clr"></div>
					    <?php } ?>
					<?php endforeach;?>
					<?php if(isset($_GET['page'])){
					    $page = $_GET['page'];
					}else{
					    $page = 1;
					}
					?>

<?php if($i > 14 || $page != 1){
    echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
    echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
    }?> 
<?php elseif($notfound == true):?>
        <h4>Không có kết quả nào được tìm thấy! Vui lòng nhập lại</h4>
<?php endif;?>
</div>
    </div>
</section>
