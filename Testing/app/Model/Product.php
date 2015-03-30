<?php
class Product extends AppModel{

	public $hasMany = array(
        'ProductCategory' =>array(
            'className'=>'ProductCategory',
            'foreignKey' => 'product_id',
            'dependent' => true
        ),
        'ProductRelate' =>array(
            'className'=>'ProductRelate',
            'foreignKey' => 'product_id',
            'dependent' => true
        ),
        'ProductAttribute' =>array(
            'className'=>'ProductAttribute',
            'foreignKey' => 'product_id',
            'dependent' => true
        ),
        'ProductDiscount' =>array(
            'className'=>'ProductDiscount',
            'foreignKey' => 'product_id',
            'dependent' => true
        ),
        'ProductSpecial' =>array(
            'className'=>'ProductSpecial',
            'foreignKey' => 'product_id',
            'dependent' => true
        ),
        'ProductImage' =>array(
            'className'=>'ProductImage',
            'foreignKey' => 'product_id',
            'dependent' => true
        )
   	);

    public $validate = array(
            'name' => array(
                'require' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Product name must be required!'
                )
            ),

            'sub_title' => array(
                'require' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Sub Title must be required!'
                )
            ),

            'meta_title' => array(
                'require' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Meta Tag Title must be required!'
                )
            ),
            
            'model' => array(
                'require' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'Model Name must be required!'
                )
            )
    );


    public function get_products(){

        /* Fetch All Products whose status is 1 (enable) */
        $products = $this->find('all',array(
                        'conditions'=>array(
                                'status'=>1
                        ), 
                        'order' => array(
                                'sort_order'
                        )
                    ));
        return $products;

    }
    
    
    public function setemaildata($cart_products,$min_order_price,$ShippingPrice,$cart_data){
        $html = '';
        //$html .= '<p id="fillshipping">Free Shipping</p>';
        $html .='<div class="my-cart-main">';
            $html .='<table border="0" width="100%">';
                $html.='<tbody>';
                    $html .='<tr class="my-cart-table-heading">
                                <td>Items</td>
                                <td align="center"><span class="left-border">Item ID</span></td>
                                <td align="center"><span class="left-border">Price</span></td>
                                <td align="center"><span class="left-border">Quantity</span></td>
                                <td align="center"><span class="left-border">Subtotal </span></td>
                            </tr>';
                    $total_price = 0;
                    foreach($cart_products as $cart_product){
                        $current_date = strtotime(date('Y-M-d'));
                            $discount_price = false;
                            if (isset($cart_product['ProductDiscount'][0])) {
                                foreach ($cart_product['ProductDiscount'] as $product_discount) {
                                    $start_date = strtotime($product_discount['date_start']);
                                    $end_date = strtotime($product_discount['date_end']);
                                    if ($current_date >= $start_date && $current_date <= $end_date) {
                                        $discount_price = $product_discount['price'];
                                        $discount_percentage = number_format((($cart_product['Product']['price'] - $product_discount['price']) * 100) / $cart_product['Product']['price']);
                                        break;
                                    } else {
                                        $discount_price = $cart_product['Product']['price'];
                                    }
                                }
                            } else {
                                $discount_price = $cart_product['Product']['price'];
                            }
                            $html .='<tr class="top-border">';
                                $html .='<td valign="top"  class="image-pic">'.$cart_product['Product']['name'].'</td>';
                                $html .='<td valign="top"  align="center">'.$cart_product['Product']['id'].'</td>';
                                $html .='<td align="center" width="110">RM '.$discount_price.'</td>';
                                $html .='<td align="center"  width="110">'.$cart_data[$cart_product['Product']['id']].'</td>';
                                $html .='<td align="center"  width="110">'.number_format($discount_price*$cart_data[$cart_product['Product']['id']],2,'.','').'</td>';
                                $total_price = $total_price+ $discount_price*$cart_data[$cart_product['Product']['id']];
                           $html .='</tr>';
                    }
                    $html .='<tr class="my-cart-table-heading border-bottom">';
                        $html .='<td colspan="6">';
                            $html .= '<div class="total-amo">';  
                                     $html .= '<span class="total-main">Subtotal: RM '.$total_price.'</span>';
                                               // $first_price = $total_price;
                                     $html .= '<span class="total-main">';
                                            if($total_price<=$min_order_price['Orderprices']['price']){
                                                    $total_price = $total_price+$ShippingPrice['ShippingPrice']['price'];
                                                    $html .= 'Shipping: RM'.$ShippingPrice['ShippingPrice']['price'];
                                            }else{
                                                    $html .='Free Shipping';
                                            }
                                     $html .= '</span>';
                                     $html .='Total RM '.$total_price;
                                                             
                           $html .= '</div>';
                        $html .='</td>';
                    $html .='</tr>';
                $html.='</tbody>';
            $html .='</table>';
        $html .='</div>';
        
        return  $html;
    }
    
    
    public function paymentemail($order_products,$min_order_price,$ShippingPrice){
        $html = '';
        //$html .= '<p id="fillshipping">Free Shipping</p>';
        $html .='<div class="my-cart-main">';
            $html .='<table border="0" width="100%">';
                $html.='<tbody>';
                    $html .='<tr class="my-cart-table-heading">
                                <td>Items</td>
                                <td align="center"><span class="left-border">Item ID</span></td>
                                <td align="center"><span class="left-border">Price</span></td>
                                <td align="center"><span class="left-border">Quantity</span></td>
                                <td align="center"><span class="left-border">Subtotal </span></td>
                            </tr>';
                    $total_price = 0;
                    foreach($order_products as $order_product){
                        //echo $order_product['OrderDetail']['id'];
                        $product = array();
                        $product = $this->find('first',array('conditions'=>array('id'=>$order_product['OrderDetail']['product_id'])));
                        //pr($product);
                            $html .='<tr class="top-border">';
                                $html .='<td valign="top"  class="image-pic">'.$product['Product']['name'].'</td>';
                                $html .='<td valign="top"  align="center">'.$order_product['OrderDetail']['product_id'].'</td>';
                                $html .='<td align="center" width="110">RM '.$order_product['OrderDetail']['product_amount'].'</td>';
                                $html .='<td align="center"  width="110">'.$order_product['OrderDetail']['quantity'].'</td>';
                                $html .='<td align="center"  width="110">'.number_format($order_product['OrderDetail']['total_amount'],2,'.','').'</td>';
                                $total_price = $total_price+ $order_product['OrderDetail']['total_amount'];
                           $html .='</tr>';
                    }
                    $html .='<tr class="my-cart-table-heading border-bottom">';
                        $html .='<td colspan="6">';
                            $html .= '<div class="total-amo">';  
                                     $html .= '<span class="total-main">Subtotal: RM '.$total_price.'</span>';
                                               // $first_price = $total_price;
                                     $html .= '<span class="total-main">';
                                            if($total_price<=$min_order_price['Orderprices']['price']){
                                                    $total_price = $total_price+$ShippingPrice['ShippingPrice']['price'];
                                                    $html .= 'Shipping: RM'.$ShippingPrice['ShippingPrice']['price'];
                                            }else{
                                                    $html .='Free Shipping';
                                            }
                                     $html .= '</span>';
                                     $html .='Total RM '.$total_price;
                                                             
                           $html .= '</div>';
                        $html .='</td>';
                    $html .='</tr>';
                $html.='</tbody>';
            $html .='</table>';
        $html .='</div>';
        
        return  $html;
    }

}