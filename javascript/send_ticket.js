$(document).ready(function(){
 //Ticket object
 let killButton=false;
function Tickets(fullname,email,hAddress,pCategory,pName,Wnumber,fCategory,messagee)
{   this.fullname=fullname;
    this.email=email;
    this.hAddress=hAddress;
    this.pCategory=pCategory;
    this.pName=pName;
    this.Wnumber=Wnumber;
    this.fCategory=fCategory;
    this.messagee=messagee;
};


function fullnameCheck(fullname)
{
if(fullname.length<1||fullname.indexOf(' ')<=0)
{return false;}
else{return true;}
};
function emailCheck(email){
    var regex=/(?:((?:[\w-]+(?:\.[\w-]+)*)@(?:(?:[\w-]+\.)*\w[\w-]{0,66})\.(?:[a-z]{2,6}(?:\.[a-z]{2})?));*)/g;
    if(!regex.test(email))
    {
    return false;
    } else{
    return true;    
    }
}


$(document).on('focusout','.ticketFullName',function(){
    $('.ticketFullName').removeClass('shakeit');
        let fname=$('.ticketFullName').val();
        if(!fullnameCheck(fname))
        {
            $('.ticketFullName').addClass('shakeit');
        }

});

$(document).on('focusout','.ticketEmail',function(){
    $('.ticketEmail').removeClass('shakeit');
        let email=$('.ticketEmail').val();
        if(!emailCheck(email))
        {
            $('.ticketEmail').addClass('shakeit');
        }
});
////////////HOME ADDRESS 
$(document).on('focusout','.ticketHaddress',function(){
    $('.ticketHaddress').removeClass('shakeit');
    if($(this).val()<5)
{
$('.ticketHaddress').addClass('shakeit');
}
});
//////////PRODUCT NAME
$(document).on('focusout','.ticketPName',function(){
    $('.ticketPName').removeClass('shakeit');
    if($(this).val()<5)
{
$('.ticketPName').addClass('shakeit');
}
});
//////////////////WARRANTY NUMBER
$(document).on('focusout','.ticketWNumber',function(){
    $('.ticketWNumber').removeClass('shakeit');
    if($(this).val()<8||$(this).val>16)
{
$('.ticketWNumber').addClass('shakeit');
}
});
$(document).on('click',':input[type="text"]',function(){

    $(':input[type="submit"]').prop('disabled', false);
})

$(document).on('click',':input[type="submit"]',function(){
    console.log($('.ticketEmail').val());
    var ticket= new Tickets(
    $('.ticketFullName').val(),
    $('.ticketEmail').val(),
    $('.ticketHaddress').val(),
    $('.ticketPCategory').val(),
    $('.ticketPName').val(),
    $('.ticketWNumber').val(),
    $('.ticketFCategory').val(),
    $('.ticketMessage').val()
    )
    console.log(ticket.hAddress,ticket.email);
    if(ticket.fullname==""){killButton=true;$('.ticketFullName').addClass('shakeit');}
    if(ticket.email==""){killButton=true;$('.ticketEmail').addClass('shakeit');}
    if(ticket.hAddress==""){killButton=true;$('.ticketHaddress').addClass('shakeit');}
    if(ticket.pName==""){killButton=true;$('.ticketPName').addClass('shakeit');}
    if(ticket.Wnumber==""){killButton=true;$('.ticketWNumber').addClass('shakeit');}
    if(ticket.messagee==""){killButton=true;$('.ticketMessage').addClass('shakeit');}

        if(killButton==true)
        {
            $(':input[type="submit"]').prop('disabled', true);
        }

        

    
});



////filledChanged
$(document).on('click','.ticketFullName',function(){
$(this).removeClass('filled');});

$(document).on('click','.ticketEmail',function(){
    $(this).removeClass('filled');});
});