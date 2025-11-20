<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/report" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body mt-3">
    <h2>Search Members By Skill</h2>
    <form method="get" action="<?php echo URLROOT; ?>/report/searchBySkill">
        <div class="input-group mb-3">
            <input type="text" name="skill" class="form-control" placeholder="e.g. shooting, defense" value="<?php echo isset($data['skill']) ? $data['skill'] : ''; ?>">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <?php if(isset($data['results'])): ?>
        <h4>Results (<?php echo count($data['results']); ?>)</h4>
        <table class="table table-striped">
            <thead>
                <tr><th>Name</th><th>Email</th><th>Phone</th><th>Team</th></tr>
            </thead>
            <tbody>
                <?php foreach($data['results'] as $m): ?>
                <tr>
                    <td><?php echo $m->full_name; ?></td>
                    <td><?php echo $m->email; ?></td>
                    <td><?php echo $m->phone; ?></td>
                    <td><?php echo isset($m->team_id) ? $m->team_id : ''; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
