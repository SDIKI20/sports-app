<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/team" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-3">
    <h2>Add Team</h2>
    <form action="<?php echo URLROOT; ?>/team/add" method="post">
        <div class="form-group mb-3">
            <label>Team Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Coach:</label>
            <input type="text" name="coach" class="form-control" value="<?php echo $data['coach']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Category:</label>
            <input type="text" name="category" class="form-control" value="<?php echo $data['category']; ?>">
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
