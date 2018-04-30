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
   /////////////////////////////////////////////////////////////////////////
       } /*elseif ($( ".btn-wish" ).hasClass( "btn-danger" )){
        // remove item from wishlist
          var form_data={
                    'product_id':$('input#product_id').val(),
                    'button_action':'delete'
                     };

		       $.ajax({
		         url:'/products/deleteFromWishlist',
		         method:"get",
		         data:form_data,
		         dataType:"json",
		         
		            success:function(data)
		             {          
		               $( ".btn-wish" ).removeClass( "btn-danger" ).addClass( "btn-secondary" );
                       $( ".btn-wish" ).html('<span>Add to Wishlist</span>');
                      $( ".button_action" ).val('store');
		            }   

		       });
       


       }*/

       

   });
});