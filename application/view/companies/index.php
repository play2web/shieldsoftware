<div class="container">
    <div class="page-header">
        <h1>Companies</h1>
    </div>
    <!-- add form -->
    <form role="form" action="<?php echo URL; ?>companies/addcompany" method="POST">
        <div class="form-group">
            <label for="name">Add a company</label>
            <input type="name" class="form-control" id="name" name="company_name" placeholder="Enter name" required>
        </div>
        <input type="submit" class="btn btn-primary" name="submit_add_company" value="Submit" />
    </form>
    <!-- main content output -->
    <div class="box">
        <h3>List of companies</h3>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Company name</td>
                        <td>Delete</td>
                        <td>Edit</td>
                        <td>View products</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($companies as $company) { ?>
                    <tr>
                        <td>
                            <?php if (isset($company->company_id)) echo htmlspecialchars($company->company_id, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($company->company_name)) echo htmlspecialchars($company->company_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td><a class="btn btn-danger" href="<?php echo URL . 'companies/deletecompany/' . htmlspecialchars($company->company_id, ENT_QUOTES, 'UTF-8'); ?>">Delete company</a></td>
                        <td><a class="btn btn-success" href="<?php echo URL . 'companies/editcompany/' . htmlspecialchars($company->company_id, ENT_QUOTES, 'UTF-8'); ?>">Edit company</a></td>
                        <td><a class="btn btn-primary" href="<?php echo URL . 'products/company/' . htmlspecialchars($company->company_id, ENT_QUOTES, 'UTF-8'); ?>">View products</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>