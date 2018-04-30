
  $(document).ready(function(){
 
    var id=$('#product_id').val();

       $.ajax({
         url:"/admin/products/fetchProduct",
         method:"get",
         data:{id:id},
         dataType:"json",
        
         success:function(data)
         {
          $('#name').text(data.name);
          $('#category').text(data.category);
          $('#brand').text(data.brand);
          $('#price').text(data.price);
          $('#stock').text(data.stock);
          $('#features').html(data.features);
          $('#overview').html(data.overview);
          $('#url').attr('href','/products/'+data.category_slug+'/'+data.slug);


          $('img').attr('src',`/storage/cover_images/${data.cover_image}`);


         }
       });


///////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////


 });
