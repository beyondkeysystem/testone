<div class="header-top">
  <div class="container">
    <div class="row">
      <ul class="header-top-left">
            <li><a href="/contactus"><i class="fa fa-map-marker"></i> <?php echo __('HaRiMau'); ?></a></li>
            <li><a href="https://www.facebook.com/harimau1malaysia"><i class="fa fa-facebook"></i> <?php echo __('Find us on Facebook'); ?></a></li>
      </ul>
      <ul class="header-top-right">
            <?php if($this->Session->read("Auth.User")){ ?>
              <li><a href="/users/logout"><i class="fa fa-lock"></i> <?php echo __('Logout'); ?> </a></li>  
            <?php }else{ ?>
              <li><a href="/users/login"><i class="fa fa-lock"></i> <?php echo __('Login in'); ?> </a></li>
              <li><a href="/users/login"><i class="fa fa-user"></i> <?php echo __('Sign up'); ?> </a></li>
            <?php }?>
            <li><a href="/users/order"><i class="fa fa-user"></i> <?php echo __('My Orders'); ?></a></li>
            <li class="cart-total" >
                <?php
                    $cart_data = $this->Session->read('cart_data');
                    $total = 0;
                    if(!empty($cart_data)){
                        foreach($cart_data as $key => $val){
                            $total = $total+$val;
                        }
                    }
                ?>
                <?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i>'.__('Cart').' (<span id="cart_count">'.$total.'</span>)','/store/cart',array('escape'=>false,'class'=>'cart-link'));?>
                <div class="cart-dec" id="top_cart">
                    <!-- <ul class="cart-dec-main clearfix">
                       <li>
                           <a class="pro1" href="javascript:void(0)">
                               <?php echo $this->Html->image('../css/images/aa2.jpg');?>
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
                       </li>	
                   </ul>
                   <div class="check-out clearfix">
                       <div class="check-out-left">
                           Subtotal ( <a href="javascript:void(0)"> 2 </a> items) <a href="javascript:void(0)"> RM 70.00</a>
                       </div>
                       <input type="button" value="Checkout" class="check-btn">
                   </div> -->
            </div>
        </li>
      </ul>
    </div>
  </div>
</div>