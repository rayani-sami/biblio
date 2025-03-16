// registre  form validation user
$(document).ready(function(){
    $("#registerForm").submit(function(){
        var fromdata =$(this).serialize();
        $.ajax({
            url:'/user/register',
            type:'POST',
            data:fromdata,
            success:function(resp) {
               // alert(resp.url);
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#register-"+i).attr('style','color:red');
                        $("#register-"+i).html(error);
                    setTimeout(function(){
                        $("#register-"+i).css({
                            'display':'none'
                        });
                    },3000);
                  });
                }else if(resp.type=="success"){
                    alert(resp.message);
                    window.location.href=resp.url;
                }

             },error:function(){
            alert("Error");
             }
        })
    });
    // account validation
    $("#accountForm").submit(function(){
        var fromdata =$(this).serialize();
        $.ajax({
            url:'/user/account',
            type:'POST',
            data:fromdata,
            success:function(resp) {
               // alert(resp.url);
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#account-"+i).attr('style','color:red');
                        $("#account-"+i).html(error);
                    setTimeout(function(){
                        $("#account-"+i).css({
                            'display':'none'
                        });
                    },3000);
                  });
                }else if(resp.type=="success"){
                    $("#account-success").attr('style','color:green');
                    $("#account-success").html(resp.message);
                  //  alert(resp.message);
                   // window.location.href=resp.url;
                }

             },error:function(){
            alert("Error");
             }
        })
    });
    // password update validation
    $("#passwordForm").submit(function(){
        var fromdata =$(this).serialize();
        $.ajax({
            url:'/user/update-password',
            type:'POST',
            data:fromdata,
            success:function(resp) {
               // alert(resp.url);
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#password-"+i).attr('style','color:red');
                        $("#password-"+i).html(error);
                    setTimeout(function(){
                        $("#password-"+i).css({
                            'display':'none'
                        });
                    },3000);
                  });
                }else if(resp.type=="success"){
                    $("#password-success").attr('style','color:green');
                    $("#password-success").html(resp.message);
                  //  alert(resp.message);
                   // window.location.href=resp.url;
                }else if(resp.type=="incorrect"){
                    $("#password-error").attr('style','color:red');
                    $("#password-error").html(resp.message);
                  //  alert(resp.message);
                   // window.location.href=resp.url;
                }

             },error:function(){
            alert("Error");
             }
        })
    });
    // forgotpassword  form validation user

    $("#forgotForm").submit(function(){
        var fromdata =$(this).serialize();
        $.ajax({
            url:'/user/forgot-password',
            type:'POST',
            data:fromdata,
            success:function(resp) {
               // alert(resp.url);
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#forgot-"+i).attr('style','color:red');
                        $("#forgot-"+i).html(error);
                    setTimeout(function(){
                        $("#forgot-"+i).css({
                            'display':'none'
                        });
                    },3000);
                  });
                }else if(resp.type=="success"){
                    $("#forgot-success").attr('style','color:green');
                    $("#forgot-success").html(resp.message);
                  // alert(resp.message);
                   // window.location.href=resp.url;
                }

             },error:function(){
            alert("Error");
             }
        })
    });
    //login  form validation user
    $("#loginForm").submit(function(){
        var fromdata =$(this).serialize();
        $.ajax({
            url:'/user/login',
            type:'POST',
            data:fromdata,
            success:function(resp) {
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                        $("#login-"+i).attr('style','color:red');
                        $("#login-"+i).html(error);
                    setTimeout(function(){
                        $("#login-"+i).css({
                            'display':'none'
                        });
                    },3000);
                  });
                }else if(resp.type=="incorrect"){
                    $("#login-error").attr('style','color:red');
                    $("#login-error").html(resp.message);
                  // alert(resp.message);
                }else if(resp.type=="active"){
                    $("#login-error").attr('style','color:red');
                    $("#login-error").html(resp.message);
                  //alert(resp.message);
                }else if(resp.type=="success"){
                    window.location.href=resp.url;
                }

             },error:function(){
            alert("Error");
             }
        })
    });


    });
 function addSubscriber (){
        //alert("test");
        var subscriber_email =$("#subscriber_email").val()
       // alert(subscriber_email);
        var mailFormat =  /\S+@\S+\.\S+/;
        if (subscriber_email.match(mailFormat)) {

        } else {
          alert("Invalid address! please enter valid address");
          return false;
        }
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            type:'post',
            url:'add-subscriber-email',
            data:{subscriber_email:subscriber_email},
            success:function(resp){
              if(resp=="exists"){
                alert("Your email is already exists for Newsletter ") ;
              }else if(resp=="saved"){
                alert("thanks for subscribing");
              }
            },error:function(){
                alert("error");
            }
        })
     }
