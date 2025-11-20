<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/event" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body mt-3">
    <h2>Participants</h2>
    <a href="<?php echo URLROOT; ?>/event/register/<?php echo $data['event_id']; ?>" class="btn btn-primary mb-3">Register Member</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Registered At</th>
                <th>Attended</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['participants'] as $p): ?>
                <tr>
                    <td><?php echo $p->full_name; ?></td>
                    <td><?php echo $p->email; ?></td>
                    <td><?php echo $p->phone; ?></td>
                    <td><?php echo $p->registered_at; ?></td>
                    <td><?php echo $p->attended ? 'Yes' : 'No'; ?></td>
                    <td>
                        <form action="<?php echo URLROOT; ?>/event/attendance/<?php echo $data['event_id']; ?>" method="post" class="d-inline">
                            <input type="hidden" name="member_id" value="<?php echo $p->member_id; ?>">
                            <input type="checkbox" name="attended" value="1" <?php echo $p->attended ? 'checked' : ''; ?> onchange="this.form.submit()"> Mark attended
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
