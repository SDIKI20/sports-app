<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/member" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body mt-3">
    <div class="row">
        <div class="col-md-3">
            <?php if(!empty($data['member']->photo)) : ?>
                <img src="<?php echo URLROOT . '/' . $data['member']->photo; ?>" class="img-fluid" alt="Photo">
            <?php else: ?>
                <img src="<?php echo URLROOT; ?>/public/img/avatar.png" class="img-fluid" alt="Photo">
            <?php endif; ?>
        </div>
        <div class="col-md-9">
            <h2><?php echo $data['member']->full_name; ?></h2>
            <p><strong>Email:</strong> <?php echo $data['member']->email; ?></p>
            <p><strong>Phone:</strong> <?php echo $data['member']->phone; ?></p>
            <p><strong>Team:</strong> <?php echo isset($data['member']->team_name) ? $data['member']->team_name : ''; ?></p>
            <p><strong>Major:</strong> <?php echo isset($data['member']->major) ? $data['member']->major : ''; ?></p>
            <p><strong>Skills:</strong> <?php echo !empty($data['skills']) ? implode(', ', $data['skills']) : '-'; ?></p>
            <div class="mt-3">
                <a href="<?php echo URLROOT; ?>/member/exportPdf/<?php echo $data['member']->id; ?>" class="btn btn-primary">Export PDF</a>
                <a href="<?php echo URLROOT; ?>/member/edit/<?php echo $data['member']->id; ?>" class="btn btn-secondary">Edit</a>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
