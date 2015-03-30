
//to show click menu is active
$("nav ul li a").click(function(){  
     $("nav ul li").removeClass('active');
     $(this).stop().animate();
     $(this).parent().addClass('active');
});

//to show default url is active
$(function () {
    setNavigation();
});

function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    $("nav ul li a").each(function () {
    	var href = $(this).attr('href');
        if (href != undefined && path.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
        }
    });
}
