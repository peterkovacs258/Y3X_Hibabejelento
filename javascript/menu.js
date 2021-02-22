$(document).ready(function(){
    //MAIN LOADES
    $(document).on('click','.goBack',function(){
        $('.main').hide();
        $(".main").load("html/BasicMenu.html");
        $('.main').show('1000');
    });
    
$(document).on('click','.contact',function(){
    console.log('adsad');
    $('.main').hide();
    $('.main').load("html/Contact.html");
        $('.main').show('1000');
});
    
$(document).on('click','.makeTicket',function(){
    $('.main').hide();
    $('.main').load("html/New_Ticket.php");
    $('.main').show('1000');
});

$(document).on("click",".myTickets",function(){
 $.ajax({
    url:"html/User_Tickets.php",
    method:"POST",
    success:function(response)
    {
      
        if(response!="false")
        {
            $('.main').hide();
            $(".main").html(response);
            $('.main').show('1000');
            //console.log("Megjött a válasz");
        }
        else{
           //$("#main").load("HasNoTicket.html");
           console.log("Fallse válasz érkezett");
        }
    }

 });
});

$(document).on("click",".myProfile",function(){
$.ajax({
    url:"html/My_Profile.php",
    method:"POST",
    success(response)
    {
        if(response=="false")
        {
            //Sikertelen lekérdezés
        }
        else
        {
            $(".main").hide();
            $(".main").html(response);
            $(".main").show("1000");
        }
    },statusCode:{
        500: function(){
                        //Adatbázis hiba
        }
    }

    

});

});

});

