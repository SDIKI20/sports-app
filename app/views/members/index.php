<?php require APPROOT . '/views/layouts/header.php'; ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Members</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/member/add" class="btn btn-primary float-end">
            <i class="fa fa-plus"></i> Add Member
        </a>
    </div>
</div>
<div class="card card-body mb-3">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Team</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['members'] as $member) : ?>
                <tr>
                    <td><?php echo $member->full_name; ?></td>
                    <td><?php echo $member->email; ?></td>
                    <td><?php echo $member->phone; ?></td>
                    <td><?php echo $member->team_name; ?></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/member/edit/<?php echo $member->id; ?>" class="btn btn-dark btn-sm">Edit</a>
                        <form class="d-inline" action="<?php echo URLROOT; ?>/member/delete/<?php echo $member->id; ?>" method="post" onsubmit="return confirm('Are you sure?');">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
