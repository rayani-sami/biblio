$(document).ready(function(){


    $("#current_password").keyup(function(){

        var current_password= $("#current_password").val();

        //alert(current_password)
        $.ajax({

            type:'post',
            url:'/admin/check-admin-password',
            data:{current_password:current_password},

            success:function(resp){
               if(resp=="false"){
                 $("#check_password").html("<font color='red'>Current password invalid </font>");
            } else if (resp=="true"){
                 $("#check_password").html("<font color='green'>Current password valid </font>");}
             },error:function(){
                alert ('error');
            }
        });

    })





})
/***update section status */
$(document).on("click",".updateSectionStatus",function(){
    var  status= $(this).children("i").attr("status");
    var section_id=$(this).attr("section_id");
 // alert(section_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-section-status',
      data:{status:status,section_id:section_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});

/***update niveau status */
$(document).on("click",".updateNiveauStatus",function(){
    var  status= $(this).children("i").attr("status");
    var niveau_id=$(this).attr("niveau_id");
 // alert(niveau_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-niveau-status',
      data:{status:status,niveau_id:niveau_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});

   /***update user status */
$(document).on("click",".updateAdminStatus",function(){
    var  status= $(this).children("i").attr("status");
    var admin_id=$(this).attr("admin_id");
 // alert(niveau_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-admin-status',
      data:{status:status,admin_id:admin_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});

   /***update rapport status */
   $(document).on("click",".UpdateRapportStatus",function(){
    var  status= $(this).children("i").attr("status");
    var rapport_id=$(this).attr("rapport_id");
 // alert(niveau_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-rapport-status',
      data:{status:status,rapport_id:rapport_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});


/***update user status */
$(document).on("click",".updateUserStatus",function(){
    var  status= $(this).children("i").attr("status");
    var user_id=$(this).attr("user_id");
 // alert(niveau_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-user-status',
      data:{status:status,user_id:user_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});


//parent niveau  level
$("#section_id").change(function()
{
  var section_id=$(this).val();
  $.ajax({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:'get',
    url:'/admin/append-niveau-level',
    data:{section_id:section_id},

    success:function(resp){
          $("#appendNiveauLevel").html(resp);
     },error:function(){
         alert ('error');
     }
     })
});













// dynamique javascript form delete
$(document).on("click",".confirmDelete",function(){
    var module = $(this) .attr('module');
   var moduleid = $(this) .attr('moduleid');
 //  alert(module);
 //  return false;
    Swal.fire({

        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          window.location="/admin/delete-"+module+"/"+moduleid;
        }
      }) })

