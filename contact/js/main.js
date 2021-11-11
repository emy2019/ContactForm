$(document).ready(function(){

var username = true,
    email = true,
    phon = true,
    msg = true;

    // For Username 
    $(".username").on("blur",function(){
        if($(this).val().length < 4){
          $(this).css("border","1px solid #dc3545").parent().find(".custom-alert").fadeIn(200);
          $(this).parent().find(".star").fadeIn(200)
          username = true;

        }else{
            $(this).css("border","1px solid #28a745").parent().find(".custom-alert").fadeOut(200);
            $(this).parent().find(".star").fadeOut(200);

            username = false;

        }
    })

    // For Email 

    $(".email").on("blur",function(){

        if($(this).val() === ''){
          $(this).css("border","1px solid #dc3545").parent().find(".custom-alert").fadeIn(200);
          $(this).parent().find(".star").fadeIn(200)
          
          email = true;

        }else{
            $(this).css("border","1px solid #28a745").parent().find(".custom-alert").fadeOut(200);
            $(this).parent().find(".star").fadeOut(200)
           
            email = false
        } 
    })
/*
    // For Phone 
    $(".phone").on("blur",function(){

        if($(this).val() === ''){
            $(this).css("border","1px solid #f00").parent().find(".custom-alert").text(" You Must Enter Your Cell Phone").fadeIn(200);
            $(this).parent().find(".star").fadeIn(200);
            phone = true;

        }else if ($(this).val().length  < 10 ){
            $(this).css("border","1px solid #f00").parent().find(".custom-alert").text(" Your Cell Phone Is Lesser Than 10 Numbers").fadeIn(200)
            $(this).parent().find(".star").fadeIn(200)
            phone = true;

        }else{
            $(this).css("border","1px solid #080").parent().find(".custom-alert").fadeOut(200);
            $(this).parent().find(".star").fadeOut(200)
            phone = false;


        }
    })
    */

    $(".msg").on("blur",function(){
        if($(this).val().length  < 10){
          $(this).css("border","1px solid #dc3545").parent().find(".custom-alert").fadeIn(200);
          $(this).parent().find(".star").fadeIn(200)
          
          msg = true;

        }else{
            $(this).css("border","1px solid #28a745").parent().find(".custom-alert").fadeOut(200);
            $(this).parent().find(".star").fadeOut(200);

            msg = false;

        }
    })


    $(".form").on("submit", function(e){
        if( username === true || email === true || msg === true){
            e.preventDefault()
             $(".username , .email,.phone,.msg").blur();
        }
    })
})



