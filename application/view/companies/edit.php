<div class="container">
    <div class="page-header">
        <h1>Edit a company</h1>
    </div>
    <!-- add form -->
    <form action="<?php echo URL; ?>companies/updatecompany" method="POST">
        <div class="form-group">
            <input autofocus type="text" name="company_name" class="form-control" value="<?php echo htmlspecialchars($company->company_name, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($company->company_id, ENT_QUOTES, 'UTF-8'); ?>" />          
        </div>
		<input type="submit" name="submit_update_company" class="btn btn-primary" value="Update" />
    </form>
</div>

