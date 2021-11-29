$(document).ready(function() {
    $('.product-search').select2();
});

// contact page hide class
$("body").on("click",".side-menu-section .menu-link", function(){
    let className = ($(this).attr('data-className'));
    $(".common-hide").hide();
    $("."+className).show();
})