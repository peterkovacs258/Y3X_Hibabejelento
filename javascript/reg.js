$(document).ready(function(){
 //Password regex
 var pwReg = new RegExp("^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$");

// FULLL NAME VALIDATE
let errorName=true;
let errorPW=true;
let errorPWC=true;

$("#cn").on("focusout",function(){
errorName=false;
$('#cnSmall').hide().animate({
opacity:0.5,
},2,function(){
});
let cn=$("#cn").val();
if(cn.length<1||cn.indexOf(' ')<=0)
{
    $('#cnSmall').show().animate({
        opacity: 1,
      }, 500, function() {
      });
    errorName=true;
}


});


$("#pw").on("focusout",function(){
    errorPW=false;
    $("#pwSmall").hide().animate({
        opacity:0.5},150,function(){
    });
let pw=$("#pw").val();
if(pw.length<6)
{
    
    $("#pwSmall").html("Password must be more thaan 6 characters");
    $("#pwSmall").show().animate({opacity:1},2,function(){});
    errorPW=true;
}

});

$("#pwc").on("focusout",function(){
    errorPWC=false;
    $("#pwcSmall").hide().animate({
        opacity:0.5},150,function(){
    });
let pw=$("#pw").val();
let pwc=$("#pwc").val();
if(pwc!=pw)
{
    
    $("#pwcSmall").html("Paswords dont match");
    $("#pwcSmall").show().animate({opacity:1},2,function(){});
    errorPWC=true;
}

});

$("#regForm").submit(function() {											
    if(errorName == false && errorPW==false&&errorPWC==false) {

        return true;
                    
    } else {
        return false;	
    }

});




});