<?php require APPROOT . '/views/layouts/header.php'; ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Subscriptions & Payments</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/subscription/add" class="btn btn-primary float-end">
            <i class="fa fa-plus"></i> Record Payment
        </a>
    </div>
</div>
<div class="card card-body mb-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Member</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['subscriptions'] as $sub) : ?>
            <tr>
                <td><?php echo $sub->full_name; ?></td>
                <td>$<?php echo $sub->amount; ?></td>
                <td><?php echo $sub->date; ?></td>
                <td>
                    <span class="badge bg-<?php echo ($sub->status == 'paid') ? 'success' : 'warning'; ?>">
                        <?php echo ucfirst($sub->status); ?>
                    </span>
                </td>
                <td><?php echo ucfirst($sub->type); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
