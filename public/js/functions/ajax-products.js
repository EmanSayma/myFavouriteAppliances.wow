var tableId = '#products_table';
var url= '/admin/products';

$(document).ready(function(){

   $(tableId).DataTable({
       "processing":true,
       "serverSide":true,
       "ajax":url+"/getProducts",
       "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
       "columns":[
            {"data":"checkbox", orderable:false,searchable:false},
            {"data":"name"},
            {"data":"created_at"},
            {"data":"action", orderable:false, searchable:false}
       ]
   });

//////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////
   $('#add_product').click(function(){
     
      fetchCategories();
      $('textarea').ckeditor();
      CKEDITOR.instances['overview'].setData('');
      $('#current_image').attr('src','');
      $('#productsModel').modal('show');
      $('#product_form')[0].reset();
      $('#form_output').html('');
      $('#button_action').val('insert');
      $('#action').val('Add');

   });
////////////////////////////////////////////////////////////////////////////
   $('#product_form').on('submit',function(event){
       event.preventDefault();
      // var form_data= $(this).serialize();
       var form_data= new FormData();

      if(document.getElementById('cover_image').files[0] != null )
      {
       var property= uploadImage('cover_image');
       form_data.append('cover_image',property);
      }
         form_data.append(' _token',$('#product_form').find("input[name='_token']").val());
         form_data.append('category_id',$("#category_id").val());     
         form_data.append('name',$("#name").val());
         form_data.append('slug',$("#slug").val());
         form_data.append('overview',$("#overview").val());
          form_data.append('price',$("#price").val());
         form_data.append('brand',$("#brand").val());
         form_data.append('features',$("#features").val());
         form_data.append('stock',$("#stock").val());
         form_data.append('button_action',$("#button_action").val());
         form_data.append('product_id',$('#product_id').val());

       $.ajax({
       	 url:url+"/postProduct",
       	 method:"POST",
       	 data:form_data,
       	 dataType:"json",
         contentType:false,
         cache:false,
         processData:false,
       	 success:function(data)
       	 {
       	 	if(data.error.length>0)
       	 	{
              $('#form_output').html(showStaticNotification ('warning',data.error));
       	 	}
       	 	else
       	 	{
              $('#productsModel').modal('hide');
              showNotification ('top','right','info', data.success);
              $('#product_form')[0].reset();
              
              CKEDITOR.instances['overview','features'].setData('');
              $('#current_image').attr('src','');
              $('#form_output').html('');
              $('#action').val('Add');
              $('.modal-title').text('Create New Product');
              $('#button_action').val('insert');
              $('#products_table').DataTable().ajax.reload();
       	 	}
       	 }

       })
   });

/////////////////////////////////////////////////////////////////////////
   $(document).on('click','.edit',function(){
       var id=$(this).attr("id");
       $.ajax({
       	  url:url+"/fetchProduct",
       	  method:'get',
       	  data:{id:id},
       	  dataType:'json',
       	  success:function(data)
       	  {
       	  	var category_id= data.category_id;
            fetchCategories(category_id);
            $('#name').val(data.name);
            $('#slug').val(data.slug);
            $('#price').val(data.price);
            $('#stock').val(data.stock);
            $('#brand').val(data.brand);
            $('#features').val(data.features);            
       	  	$('#overview').val(data.overview);
            $('#current_image').attr('src',`/storage/cover_images/${data.cover_image}`);
       	  	$('#product_id').val(id);
            $('textarea').ckeditor();
       	  	$('#productsModel').modal('show');
       	  	$('#form_output').html('');
       	  	$('#action').val('Edit');
       	  	$('.modal-title').text('Edit Product');
       	  	$('#button_action').val('update');

       	  }
       })
   });
////////////////////////////////Delete Functions ///////////////////////

   $(document).on('click','.delete',function(){
       var id=$(this).attr('id');
       swalDelete(id,url+'/deleteProduct',tableId);
   });
//////////////////////////////////////////////////////
$(document).on('click','#bulk_delete',function(){
        var id=[];
      
           $('input:checked').each(function(){
                 id.push($(this).val());
           }); 
           if(id.length>0)
           {

            swalDelete(id,url+'/deleteMultipleProducts',tableId);
          }
          else
          {
            swal("Please select at least one checkbox!", {
               icon: "warning",
                });
          }

   });

//////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
$('#slug').keyup(function(e){
         var form_data={
                    'slug':$('#slug').val(),
                    'product_id':$('#product_id').val()

                     };

        $.ajax({
         url:url+'/checkSlugUnique',
         method:"get",
         data:form_data,
         dataType:"json",
         
         success:function(data)
         {          
         if(data.error.length>0)
          {
              $('#output-error').html(data.error);

          }
         else
           {
              $('#output-error').html('');
           
           }
         }

       });
   });



////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////

function fetchCategories(category_id=null){

  $('#category_id option').each(function() {
     $(this).remove();
      });
  $.ajax({
          url:"/admin/categories/fetchCategories",
          method:'get',
          dataType:'json',
          success:function(data)
          {
            var categories='';
             $.each(data, function (k,v) {
            
             $('#category_id').append(`<option value="${v.id}">${v.name}</option>`);
                if(category_id == v.id)
             {
               $('#category_id option').attr("selected","selected");
             }       

             });        

          }
       });
}
/////////////////////////////////////////////////////////
 });
