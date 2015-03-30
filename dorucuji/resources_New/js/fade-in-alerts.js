$( document ).ready(function() {

    $(".alert").hide();

    $(".alert").each(function(index) {
        $(this).delay(400*index).slideDown();
    });

});