<div class="container">
     <div class="page-header">
        <h1>Edit a product</h1>
    </div>
    <!-- add song form -->
	 <div class="form-group">
        <form action="<?php echo URL; ?>products/updateproduct" method="POST">
		 <div class="form-group">
           <label>Name</label>
           <input autofocus class="form-control" type="text" name="product_name" value="<?php echo htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8'); ?>" required />
		 </div>
		<div class="form-group">	
          <label>Product company</label>		
           <select name="product_company" class="form-control">
			<?php 
			 foreach ($companies as $company) {
				 if ($company_id == $company->company_id) {
					 $selected= "selected";
				 }
				 else{
					 $selected= "";
				 }
				 echo '<option value="'.$company->company_id.'" '.$selected.'>'.$company->company_name.'</option>';				 
			 } 
			?>
			</select>
		</div>
			<input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" class="btn btn-primary" name="submit_update_product" value="Update" />			
        </form>
	</div>	
</div>

