<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/event/participants/<?php echo $data['event_id']; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body mt-3">
    <h2>Register Member to Event</h2>
    <form action="<?php echo URLROOT; ?>/event/register/<?php echo $data['event_id']; ?>" method="post">
        <div class="form-group mb-3">
            <label>Select Member</label>
            <select name="member_id" class="form-control">
                <?php foreach($data['members'] as $m): ?>
                    <option value="<?php echo $m->id; ?>"><?php echo $m->full_name; ?> - <?php echo $m->email; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Register">
    </form>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
