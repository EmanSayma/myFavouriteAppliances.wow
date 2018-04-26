<div id="productsModel" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form method="post" id="product_form" data-toggle="validator" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Create New Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>

				</div>
				<div class="modal-body">
					{{csrf_field()}}
					<span id="form_output"></span>
					<div class="form-group">
						<label>Enter Product Name</label>
						<input type="text" name="name" id="name" class="form-control" data-error="Please enter product name."  required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<label>URL Slug</label>
						<input type="text" name="slug" id="slug" class="form-control" data-error="Please enter article slug." data-minlength="5" pattern="[a-zA-Z-_]+" maxlength="255" required>
						<div id="output-error" class="help-block with-errors"></div>
					</div>				
					<div class="row">
	                  <div class="col-md-6">
	                   <div class="form-group">
	                     <label for="category_id"> Category</label>
	                     <select class="form-control" name="category_id" id="category_id">           
	                      </select>
	                     </div>
	                   </div>
	                   <div class="col-md-6">
	                   	 <div class="form-group">
							<label>Price</label>
							<input type="number" name="price" step="any" id="price" class="form-control" data-error="Please enter product price."  required>
							<div class="help-block with-errors"></div>
						 </div>
	                   </div>
	                 </div>
	                <div class="row">
	                  <div class="col-md-6"> 	
						<div class="form-group">
							<label>Brand</label>
							<input type="text" name="brand" id="brand" class="form-control" data-error="Please enter product brand."  required>
							<div class="help-block with-errors"></div>
						</div>
					  </div>
					   <div class="col-md-6"> 		
	                   <div class="form-group">
							<label>Stock</label>
							<input type="number" name="stock" id="stock" class="form-control" data-error="Please enter product stock."  required>
							<div class="help-block with-errors"></div>
						</div>
					   </div>
				    </div>
					<div class="form-group">
						<label>Features</label>
						<textarea name="features" id="features" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
                    <div class="form-group">
						<label>Overview</label>
						<textarea name="overview" id="overview" class="form-control" data-error="Please enter product overview."  required></textarea>
						 <div class="help-block with-errors"></div>
					</div>
					  <img id="current_image" style="width:40%" src="">

					<div class="form-group">
                          <input type="file" name="cover_image" id="cover_image" class="filestyle" data-buttonBefore="true" data-size="sm" data-placeholder="No file" data-buttonName="btn-primary" data-buttonText="Cover Image" data-icon="false" data-error="Please select image to the product."  >                         
                   </div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="product_id" id="product_id" value="">
					<input type="hidden" name="button_action" id="button_action" value="insert">
					<input type="submit" name="submit" id="action" value="Add" class="btn btn-success">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>