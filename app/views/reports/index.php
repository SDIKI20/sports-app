<?php require APPROOT . '/views/layouts/header.php'; ?>
<h1>Reports</h1>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Member Report</h5>
                <p class="card-text">Export list of all members to CSV.</p>
                <a href="<?php echo URLROOT; ?>/report/export_members" class="btn btn-primary">Export CSV</a>
                <a href="<?php echo URLROOT; ?>/report/export_pdf" class="btn btn-danger">Export PDF</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Financial Report</h5>
                <p class="card-text">Export all subscription and payment data.</p>
                <a href="<?php echo URLROOT; ?>/report/export_finance" class="btn btn-success">Export CSV</a>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
