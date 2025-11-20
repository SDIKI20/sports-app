<?php require APPROOT . '/views/layouts/header.php'; ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Events</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/event/add" class="btn btn-primary float-end">
            <i class="fa fa-plus"></i> Add Event
        </a>
    </div>
</div>
<div class="card card-body mb-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['events'] as $event) : ?>
            <tr>
                <td><?php echo $event->event_name; ?></td>
                <td><?php echo $event->event_date; ?></td>
                <td><?php echo $event->location; ?></td>
                <td><?php echo $event->type; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
