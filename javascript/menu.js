$(document).ready(function(){
    //MAIN LOADES
    $(document).on('click','#goBack',function(){
        $(".main").load("html/BasicMenu.html");
    });
    
$(document).on('click','#contact',function(){
    console.log('adsad');
        $('.main').hide();
        $('.main').load("html/Contact.html");
        $('.main').show('1000');
});
    
$(document).on('click','#makeTicket',function(){
    $('.main').hide();
    $('.main').load("html/MakeTicket.html");
    $('.main').show('1000');
});


});

