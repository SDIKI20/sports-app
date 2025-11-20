<?php require APPROOT . '/views/layouts/header.php'; ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Teams</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/team/add" class="btn btn-primary float-end">
            <i class="fa fa-plus"></i> Add Team
        </a>
    </div>
</div>
<div class="card card-body mb-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Coach</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['teams'] as $team) : ?>
            <tr>
                <td><?php echo $team->name; ?></td>
                <td><?php echo $team->coach; ?></td>
                <td><?php echo $team->category; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
