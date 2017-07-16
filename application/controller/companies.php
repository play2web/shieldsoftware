<?php

/**
 * Class Companies
 */
class Companies extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // getting all companies
        $companies = $this->model->getAllCompanies();

       // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/companies/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	/**
     * Add company
     */
	public function addCompany()
    {
        // if we have POST data to create a new company entry
        if (isset($_POST["submit_add_company"])) {
            $this->model->addCompany($_POST["company_name"]);
        }

        // where to go after company has been added
        header('location: ' . URL . 'companies/index');
    }

	/**
     * ACTION: deleteCompany
     */
    public function deleteCompany($company_id)
    {
        // if we have an id of a Company that should be deleted
        if (isset($company_id)) {
            // do deleteCompany() in model/model.php
            $this->model->deleteCompany($company_id);
        }

        // where to go after Company has been deleted
        header('location: ' . URL . 'companies/index');
    }
	
	 /**
     * ACTION: editCompany
     */
    public function editCompany($company_id)
    {
        // if we have an id of a company that should be edited
        if (isset($company_id)) {
            // do getCompany() in model/model.php
            $company = $this->model->getCompany($company_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $company_id easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/companies/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to company index page (as we don't have a company_id)
            header('location: ' . URL . 'companies/index');
        }
    }
	
	 /**
     * ACTION: updateCompany
     */
    public function updateCompany()
    {
        // if we have POST data
        if (isset($_POST["submit_update_company"])) {

            $this->model->updateCompany($_POST["company_name"], $_POST["company_id"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'companies/index');
    }
}