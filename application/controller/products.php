<?php

/**
 * Class Products
 */
class Products extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {				
		$products = $this->model->getAllProducts();
		$companies = $this->model->getAllCompanies();
		$companyName= "all companies";
			
		require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';		
    }
	
	 /**
     * PAGE: Company products
     */
    public function company($company_id)
    {
        // if we have an id of a company
        if (isset($company_id)) {
		
            $products = $this->model->getAllProductsFromCompany($company_id);
			$companies = $this->model->getAllCompanies();
			$company = $this->model->getCompany($company_id);
			$companyName= $company->company_name;
			
            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/products/index.php';
            require APP . 'view/_templates/footer.php';
			
        } else {
            // redirect user
            header('location: ' . URL . 'products/index.php');
        }
	}
	
	/**
     * Add Product
     */
	public function addProduct()
    {
        // if we have POST data to create a new product entry
        if (isset($_POST["submit_add_product"])) {
            $this->model->addProduct($_POST["product_name"], $_POST["product_company"]);
        }

        // where to go after product has been added
        header('location: ' . URL . 'products/company/' .$_POST["product_company"]);
    }
	
	/**
     * ACTION: deleteProduct
     */
    public function deleteProduct($company_id, $product_id)
    {
        // if we have an id of a Company that should be deleted
        if (isset($product_id)) {
            // do deleteProduct() in model/model.php
            $this->model->deleteProduct($product_id);
        }

        // where to go after Product has been deleted
        header('location: ' . URL . 'products/company/' .$company_id);
    }
	
	/**
     * ACTION: editProduct
     */
    public function editProduct($company_id, $product_id)
    {
        // if we have an id of a company that should be edited
        if (isset($product_id)) {
            // do getCompany() in model/model.php
            $product = $this->model->getProduct($company_id, $product_id);
			$companies = $this->model->getAllCompanies();

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $company_id easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/products/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to company index page (as we don't have a company_id)
            header('location: ' . URL . 'products/company/' .$company_id);
        }
    }
	
	 /**
     * ACTION: updateProduct
     */
    public function updateProduct()
    {
        // if we have POST data
        if (isset($_POST["submit_update_product"])) {
            $this->model->updateProduct($_POST["product_id"], $_POST["product_name"], $_POST["product_company"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'products/company/' .$_POST["product_company"]);
    }
	
}
