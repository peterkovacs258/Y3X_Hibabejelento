$(document).ready(function(){

$("#RegShow").on("click",function(){
$('#main').load("html/Index_Reg.html");
});

$("#LoginShow").on("click",function(){
 $("#main").load("html/Index_Login.html");
});

});