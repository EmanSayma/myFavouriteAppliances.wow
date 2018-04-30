$(document).ready(function(){
     


////////////////////////////////////////////////////////////////////
    $('#wishlist-form').on('submit',function(event){
       event.preventDefault();

       if ($( ".btn-wish" ).hasClass( "btn-secondary" )){
       // Add item to wishlist
 

         var form_data={
                    ' _token':$("#wishlist-form").find("input[name='_token']").val(),
                    'product_id':$('input#product_id').val(),
                    'button_action':'store'
                     };

       $.ajax({
         url:'/products/addToWishlist',
         method:"POST",
         data:form_data,
         dataType:"json",
         
            success:function(data)
             {          
              $( ".btn-wish" ).removeClass( "btn-secondary" ).addClass( "btn-danger" );
             $( ".btn-wish" ).html('<i class="fa fa-heart " aria-hidden="true"></i>');
             $('.btn-wish').attr("disabled", "disabled");
             $( ".button_action" ).val('delete');

            }   

       });
       }
       
   });

    //////////////////////////////////////////////////////////////////

});