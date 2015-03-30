// JavaScript Document

// $.noConflict();

$("#change4").click(function(){
		$("#change4-open").slideDown()
	// $("#close1").toggleClass("icon-change-two");
});

$("#close4").click(function(){
		//$("#change1-open").slideDown()
	 $("#change4-open").slideUp();  
});


$("#change5").click(function(){
		$("#change5-open").slideDown()
	// $("#close1").toggleClass("icon-change-two");
});

$("#close5").click(function(){
		//$("#change1-open").slideDown()
	 $("#change5-open").slideUp();  
});

$('#language_selector').change(function(){
 	if($('#language_selector').val() == 'eng'){
	 	$('#english_link')[0].click();
 	}else if($('#language_selector').val() == 'chi'){
	 	$('#china_link')[0].click();
 	}else if($('#language_selector').val() == 'may'){
	 	$('#malaysia_link')[0].click();
 	}
 });



// $('.cart-total').one('mouseover',function(){
//   call_top_cart();
// });


$('.cart-total').mouseenter(function(){
  $.post('/store/cartview',
    {data:'hover'},
    function(data){
      if(data){
        $('#top_cart').html(data);
      }
    });
});

function delete_cart_product(product_id,liid){
	// alert(product_id);
	$.post('/store/deletecartsession',
  	{product_id: product_id },
  	function(data){
  		if(data){
  			var last_value = $('#cart_count').text();
  			$('#cart_count').html(last_value - data);
  			$('#'+liid).remove();
        location.reload();

  		}
  	});

}


function delete_cart_product1(product_id,liid){
	// alert(product_id);
	$.post('/store/deletecartsession',
  	{product_id: product_id },
  	function(data){
  		if(data){
  			var last_value = $('#cart_count').text();
  			$('#cart_count').html(last_value - data);
  			$('#'+liid).remove();
  			location.reload();
  		}
  	});

}

function empty_cart(){
	$.post('/store/emptycartsession',
  	{product_id: "" },
  	function(data){
  		if(data){
  			// var last_value = $('#cart_count').text();
  			// $('#cart_count').html(last_value - data);
  			// $('#'+liid).remove();
  			location.reload();
  		}
  	});
}

	
$("#buisness_enq").click(function(){
        //$('#emailaddress').val("partner@harimau.com");
        $('#emailaddress').val("1");
	console.log($('#emailaddress').val()+" Tester");
});

$("#general_enq").click(function(){
       // $('#emailaddress').val("info@harimau.com");
        $('#emailaddress').val("2");
	console.log($('#emailaddress').val()+" Tester");
});            


function fnaddtocart(product_id){
           $.ajax({
            type: "POST",
            url: "/store/addtocart",
            data: { product_id:product_id}
            })
            .done(function( msg ) {
                if(isNaN(msg)){
                    alert(msg);
                }else{
                    $('#cart_count').html(msg);
                    
                    $('html, body').animate({ scrollTop: $(".cart-total").offset().top }, 500);
                    
                    
                    
                }
            });
       }

function calc_item_price(product_id,quantity,price,max_quantity){
  var total = quantity * price;
  if(max_quantity >= quantity){
      $("#item_price"+product_id).text(total);
        $.post('/store/updatecartsesssion',
          {product_id: product_id, quantity:quantity},
          function(data){
            if(data){
              location.reload();
            }
          });    
  }else{
    $('#quantity_error_'+product_id).html('Maximum quantity exceed!!! <br/> Please buy less than '+max_quantity+' quantity');
    return false;
  }
}

 $('.add-link').on('click', function () {
        var cart = $('.cart-total');
        var imgtodrag = $(this).parent('.add-txt').parent('.store-box').find("img").eq(0);
        //alert(imgtodrag);
        //console.log(imgtodrag)
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 2000, 'easeInOutExpo');
            
            /*setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);*/

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });
    
    $('.add-to-cart').on('click', function () {
        var cart = $('.cart-total');
        var imgtodrag = $('#fill_image').find("img").eq(0);
        //alert(imgtodrag);
        //console.log(imgtodrag)
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 2000, 'easeInOutExpo');
            
            /*setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);*/

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });