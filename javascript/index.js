$(document).ready(function(){

$("#RegShow").on("click",function(){
$('#main').load("html/Index_Reg.html");
});

$("#LoginShow").on("click",function(){
 $("#main").load("html/Index_Login.html");
});


/*$("form").submit(function() {
    $(this).find('input[type="submit"]').prop("disabled", true);
    $('#main').load("html/Index_Reg.html");
    $(":small").html("asdasdasd");

});
*/

});