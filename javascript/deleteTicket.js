$(document).ready(function(){

//Uppon pressing delete button send ajax request
$(document).on('click','#deleteIcon',function(){
let res=confirm('Are you sure you want to delete this ticket?');

if(res)
{
    let ticketID=$(this).data('id');
    
    $.ajax({
        url:'php/deleteTicket.php',
        method:'POST',
        data:{id:ticketID},
        success:function(res){
            if(res=="true")
            {alert('Ticket was deleted');
            $(".main").load('html/User_Tickets.php');
            }
        },
        statusCode:{
            302:function(){alert('Something went wrong');}
        }

    });

}

});


});