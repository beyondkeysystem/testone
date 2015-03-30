<?php
if(!isset($cart) || count($cart) == 0){
?>
<ul class="cart-dec-main clearfix">
    <li>
         <center>Your cart is empty！</center>
     </li>
</ul>
<?php
}else{
?>
<ul class="cart-dec-main clearfix">
     <?php
          $total_price = "";
          $total_quantity = "";
          foreach($cart as $item_id=>$val){
            $total_price += $val['price'] * $val['quantity'];
            $total_quantity += $val['quantity'];
    ?>
              <li id="<?=md5($val['item_no'])?>">
                 <a class="pro1" href="javascript:void(0)">
                     <?php echo $this->Html->image('../uploads/thumbs/'.$val['image'],array('style'=>'width:60px; height:60px'));?>
                 </a>
                 <a class="pro2" href="javascript:void(0)">&nbsp;&nbsp;&nbsp;&nbsp;<?=strlen($val['name']) > 17 ? substr($val['name'],0,17)."..." : $val['name']?> </a>
                 <span class="pro3">RM <?=$val['price']?> x <?=$val['quantity']?></span>
                 <a href="javascript:void(0)" class="pro-remove" onclick="delete_cart_product(<?=$item_id?>,'<?=md5($val['item_no'])?>');"> <i class="fa fa-remove"></i> </a>
             </li>
    <?php    
            }
     ?>
<!--      <li>
         <a class="pro1" href="javascript:void(0)">
             <?php echo $this->Html->image('../uploads/thumbs/'.$cart['image']);?>
         </a>
         <a class="pro2" href="javascript:void(0)">HaRiMau  Note (... </a>
         <span class="pro3">RM 17.5 x 2</span>
         <a href="javascript:void(0)" class="pro-remove"> <i class="fa fa-remove"></i> </a>
     </li>
     <li>
         <a class="pro1" href="javascript:void(0)"><?php echo $this->Html->image('../css/images/aa3.jpg');?> </a>
         <a class="pro2" href="javascript:void(0)">HaRiMau  Note (... </a>
         <span class="pro3">RM 17.5 x 2</span>
         <a href="javascript:void(0)" class="pro-remove"> <i class="fa fa-remove"></i> </a>
     </li>	 -->
 </ul>
 <div class="check-out clearfix">
     <div class="check-out-left">
         Subtotal ( <a href="javascript:void(0)"> <?=$total_quantity?> </a> items) <a href="javascript:void(0)"> RM <?=$total_price?></a>
     </div>

     <a href="/store/cart"><input type="button" value="Checkout" class="check-btn"></a>
 </div>
<?php
}
?>