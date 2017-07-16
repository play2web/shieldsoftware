<div class="container">
    <div class="page-header">
        <h1>Products <?php echo $companyName;?></h1>
    </div>
    <!-- add song form -->
    <form action="<?php echo URL; ?>products/addproduct" method="POST">
        <div class="form-group">
            <label>Product name</label>
            <input type="text" name="product_name" value="" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Company name</label>
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
        <input type="submit" class="btn btn-primary" name="submit_add_product" value="Submit" />
    </form>
	
	
    <!-- main content output -->
    <div class="box">
        <h3>List of products</h3>
		
        <div class="table-responsive">
            <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Company name</td>
                    <td>Product name</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                <tr>
                    <td>
                        <?php if (isset($product->product_id)) echo htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?php if (isset($product->company_name)) echo htmlspecialchars($product->company_name, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?php if (isset($product->product_name)) echo htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td><a class="btn btn-danger" href="<?php echo URL . 'products/deleteproduct/' . htmlspecialchars($product->company_id, ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8') ; ?>">delete</a></td>
                    <td><a class="btn btn-success" href="<?php echo URL . 'products/editproduct/' . htmlspecialchars($product->company_id, ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars($product->product_id, ENT_QUOTES, 'UTF-8') ; ?>">edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
	
	</div>
</div>