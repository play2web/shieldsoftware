<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all products from database
     */
    public function getAllProducts()
    {
        $sql = "SELECT product_id, product_name, company_name, company_id FROM products LEFT JOIN companies ON product_company = company_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

	 /**
     * Get all products based on company from database
     */
    public function getAllProductsFromCompany($company_id)
    {
        $sql = "SELECT product_id, product_name, company_name, company_id FROM products LEFT JOIN companies ON product_company = company_id WHERE company_id = :company_id";
		
        $query = $this->db->prepare($sql);
        $parameters = array(':company_id' => $company_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
		return $query->fetchAll();
    }

    /**
     * Add a product to database
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views.
     */
    public function addProduct($product_name, $product_company)
    {
        $sql = "INSERT INTO products (product_name, product_company) VALUES (:product_name, :product_company)";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_name' => $product_name, ':product_company' => $product_company);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

	 /**
     * Delete a product in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     */
    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

	 /**
     * Get a product from database
     */
    public function getProduct($product_company, $product_id)
    {
        $sql = "SELECT product_id, product_name, product_company FROM products WHERE product_id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a product in database
     */
    public function updateProduct($product_id, $product_name, $product_company)
    {
        $sql = "UPDATE products SET product_name = :product_name, product_company = :product_company WHERE product_id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_name' => $product_name, ':product_company' => $product_company, ':product_id' => $product_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
	 
	 /**
     * Get all Company from database
     */
    public function getAllCompanies()
    {
        $sql = "SELECT company_id, company_name FROM companies";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
	
	/**
     * Add a company to database
     */
    public function addCompany($company_name)
    {
        $sql = "INSERT INTO companies (company_name) VALUES (:company_name)";
        $query = $this->db->prepare($sql);
        $parameters = array(':company_name' => $company_name);
		
        $query->execute($parameters);
    }

	/**
     * Delete a company in the database
     */
    public function deleteCompany($company_id)
    {
        $sql = "DELETE FROM companies WHERE company_id = :company_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':company_id' => $company_id);

        $query->execute($parameters);
    }
	
     /**
     * Get a company from database
     */
    public function getCompany($company_id)
    {
        $sql = "SELECT company_id, company_name FROM companies WHERE company_id = :company_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':company_id' => $company_id);

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }
	
	 /**
     * Update a company in database
     */
    public function updateCompany($company_name, $company_id)
    {
        $sql = "UPDATE companies SET company_name = :company_name WHERE company_id = :company_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':company_name' => $company_name, ':company_id' => $company_id);

        $query->execute($parameters);
    }
}
