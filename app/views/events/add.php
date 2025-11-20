<?php require APPROOT . '/views/layouts/header.php'; ?>
<a href="<?php echo URLROOT; ?>/event" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-3">
    <h2>Add Event</h2>
    <form action="<?php echo URLROOT; ?>/event/add" method="post">
        <div class="form-group mb-3">
            <label>Event Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group mb-3">
            <label>Date:</label>
            <input type="datetime-local" name="date" class="form-control" value="<?php echo $data['date']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Location:</label>
            <input type="text" name="location" class="form-control" value="<?php echo $data['location']; ?>">
        </div>
        <div class="form-group mb-3">
            <label>Type:</label>
            <select name="type" class="form-control">
                <option value="Competition">Competition</option>
                <option value="Training">Training</option>
                <option value="Social">Social</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control"><?php echo $data['description']; ?></textarea>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
