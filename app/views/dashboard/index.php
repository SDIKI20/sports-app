<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h1 class="mb-0">Dashboard</h1>
        <p class="text-muted">Welcome back, <?php echo $_SESSION['user_username']; ?></p>
    </div>
    <div class="col-md-4 text-md-end">
        <div class="btn-group">
            <a href="<?php echo URLROOT; ?>/member/add" class="btn btn-primary">Add New Member</a>
            <a href="<?php echo URLROOT; ?>/event/add" class="btn btn-outline-secondary">Create Event</a>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Members</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['member_count']; ?></h5>
                <p class="card-text">Active Members</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Teams</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['team_count']; ?></h5>
                <p class="card-text">Registered Teams</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Events</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['event_count']; ?></h5>
                <p class="card-text">Upcoming Events</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Income</div>
            <div class="card-body">
                <h5 class="card-title">$<?php echo number_format($data['total_income'], 2); ?></h5>
                <p class="card-text">Total Revenue</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Quick Actions</div>
            <div class="card-body">
                <a href="<?php echo URLROOT; ?>/member/add" class="btn btn-primary mb-2">Add New Member</a>
                <a href="<?php echo URLROOT; ?>/event/add" class="btn btn-success mb-2">Create Event</a>
                <a href="<?php echo URLROOT; ?>/subscription/add" class="btn btn-info mb-2">Record Payment</a>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
