<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/subscription" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-3">
    <h2>Record Payment</h2>
    <form action="<?php echo URLROOT; ?>/subscription/add" method="post">
        <div class="form-group mb-3">
            <label>Member: <sup>*</sup></label>
            <select name="member_id" class="form-control">
                <?php foreach($data['members'] as $member) : ?>
                    <option value="<?php echo $member->id; ?>"><?php echo $member->full_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Amount: <sup>*</sup></label>
            <input type="number" step="0.01" name="amount" class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['amount']; ?>">
            <span class="invalid-feedback"><?php echo $data['amount_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" value="<?php echo $data['date']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="paid">Paid</option>
                <option value="pending">Pending</option>
                <option value="overdue">Overdue</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Type:</label>
            <select name="type" class="form-control">
                <option value="monthly">Monthly</option>
                <option value="annual">Annual</option>
                <option value="donation">Donation</option>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
