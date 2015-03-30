$(document).ready(function(){
    $('#a-reload').click(function() {
	var $captcha = $("#img-captcha");
        $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
	return false;
    });
    
    $('#UserPartnerprofileForm').submit(function(){
         
        var postalcode = $('#PartnerProfilePostalCode').val();
        if(postalcode){
            if(fnfilladdress(postalcode) == '0'){
                return false;
            }
        }
        
    });
});

function fnsubmitposting(){
    document.getElementById('ObituaryViewNoticeForm').submit();
}


function fnchageusertype(obj){
    //alert(obj.value);
    if(obj.value =='Personal'){
        var element = '/Elements/signup';
    }else if(obj.value =='Partner'){
        var element = '/Elements/partnersignup';
    }
    $.ajax({
        type: "POST",
        url: siteUrl+"users/changeusertype",
        data: { element:element }
        })
        .done(function( msg ) {
            //alert(msg);
            $("#fillusertype").html( msg );
            Custom.init();
        });
}



function fnaddmoreelement(obj){
    var hist_length = $(".countrelation").length;
        var ids = '';
        if(hist_length >0){
          ids = $(".countrelation")[hist_length-1].id;
          //alert(ids);return false;
        }else{
            ids = 0;
        }
        //return false;
    $.ajax({
        type: "POST",
        url: siteUrl+"obituaries/addmoreelement",
        data: { hist_length:hist_length+1,id:ids }
        })
        .done(function( msg ) {
            $(".Relationshipcls").append( msg );
        });
    }
function fnaddmoreimageel(obj){
    var hist_length = $(".countrelation").length;
        var ids = '';
        if(hist_length >0){
          ids = $(".countrelation")[hist_length-1].id;
          //alert(ids);return false;
        }else{
            ids = 0;
        }
        //return false;
    $.ajax({
        type: "POST",
        url: siteUrl+"directory_services/addmoreimage",
        data: { hist_length:hist_length+1,id:ids }
        })
        .done(function( msg ) {
            $(".addmoreimages").append( msg );
        });
    }
    
function fnremoveimages(obj,ids){
    var str = obj.id
    var result = str.split('_');
    //ids = $(".countrelation")[hist_length-1].id;
    $("#"+result[1]).remove();
}
function fnremoveelement(obj,ids){
    if(ids !=''){
        $.ajax({
        type: "POST",
        url: siteUrl+"obituaries/removeelement",
        data: {id:ids }
        })
        .done(function( msg ) {
            //$(".Relationshipcls").append( msg );
        });
    }
    var str = obj.id
    var result = str.split('_');
    //ids = $(".countrelation")[hist_length-1].id;
    $("#"+result[1]).remove();
}

function fnfilladdress(val){
    if(val !=''){
        if(parseInt(val)){
            $.ajax({
            type: "POST",
            url: siteUrl+"users/getaddress",
            data: {'postalcode':val}
            })
            .done(function( msg ) {
                if($.trim(msg) != "error")
                {
                    $("#PartnerProfileCompanyAddress1").val(msg);
                }else{
                    alert('Postal Code is Not valid');
                    $("#PartnerProfilePostalCode").focus();
                     
                }
            });
        }else{
            alert('Postal code is not valid.');
            $("#PartnerProfilePostalCode").focus();
            return false;
        }
    }else{
        $("#PartnerProfileCompanyAddress1").val('');
    }
}

$(document).on("click", function(e) {
    var elem = $(e.target);
    if(!elem.hasClass("hasDatepicker") && 
        !elem.hasClass("ui-datepicker") && 
        !elem.hasClass("ui-icon") && 
        !elem.hasClass("ui-datepicker-next") && 
        !elem.hasClass("ui-datepicker-prev") && 
        !$(elem).parents(".ui-datepicker").length){
            $('.hasDatepicker').datepicker('hide');
    }
    if(!elem.hasClass("hasTimepicker") && 
        !elem.hasClass("ui-timepicker") && 
        !elem.hasClass("ui-icon") && 
        
        !$(elem).parents(".ui-timepicker").length){
            $('.hasTimepicker').timepicker('hide');
    }
});

$(function() {

  jQuery.urlShortener.settings.apiKey = 'AIzaSyBU0CRSIimkUsvU_lDqVf2TVrmskIJ9OdI';

});

function openTwitterPopUp(page_url, text) {
    $.urlShortener({
        longUrl: page_url,
        success: function (shortUrl) {
              top.location.href = "https://twitter.com/intent/tweet?text="+text+"&url="+encodeURIComponent(shortUrl);

        }
    });

}

function openFbPopUp(name, link, picture, caption, description) {
        FB.ui(
          {
            method: 'feed',
            name: name,
            link: link,
            picture: picture,
            caption: caption,
            description: description
          },
          function(response) {
            if (response && response.post_id) {
              //alert('Post was published.');
            } else {
              //alert('Post was not published.');
            }
          }
        );
    }
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '445212828824149',
      status     : false,
      xfbml      : false
    });

    FB.Canvas.setSize({height:100});
    setTimeout("FB.Canvas.setAutoGrow()",500);
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));