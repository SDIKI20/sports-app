<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/member" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-3">
    <h2>Add Member</h2>
    <form action="<?php echo URLROOT; ?>/member/add" method="post">
        <div class="form-group mb-3">
            <label>Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Phone:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Address:</label>
            <textarea name="address" class="form-control"><?php echo $data['address']; ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label>Join Date:</label>
            <input type="date" name="join_date" class="form-control" value="<?php echo $data['join_date']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Team:</label>
            <select name="team_id" class="form-control">
                <option value="">No Team</option>
                <?php foreach($data['teams'] as $team) : ?>
                    <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
