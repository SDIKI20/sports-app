<?php require APPROOT . '/views/layouts/header.php'; ?>
<div class="row mb-3">
    <div class="col-md-8">
        <h1>Reports & Analytics</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="<?php echo URLROOT; ?>/report/searchBySkill" class="btn btn-outline-secondary">Search By Skill</a>
    </div>
</div>

<div class="card card-body mb-3">
    <h4>Distribution of Members by Field</h4>
    <canvas id="majorsChart" width="400" height="200"></canvas>
</div>

<div class="card card-body mb-3">
    <h4>Most Popular Activities (Participants)</h4>
    <canvas id="eventsChart" width="400" height="200"></canvas>
</div>

<div class="card card-body mb-3">
    <h4>Subscriptions Over Time</h4>
    <canvas id="subsChart" width="800" height="250"></canvas>
</div>

<div class="card card-body mb-3">
    <h4>Members with Paid Subscriptions</h4>
    <p>
        <strong><?php echo $data['paidStats']['paid']; ?></strong> members have paid subscriptions out of <strong><?php echo $data['paidStats']['total']; ?></strong> total
        (<?php echo $data['paidStats']['percent']; ?>%).
    </p>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Prepare data from PHP
const majorData = <?php echo json_encode($data['majorDist']); ?>;
const eventData = <?php echo json_encode($data['topEvents']); ?>;
const subsData = <?php echo json_encode($data['subsOverTime']); ?>;

// Majors chart (pie)
const majorsLabels = majorData.map(r => r.major);
const majorsValues = majorData.map(r => parseInt(r.cnt));
const ctxMaj = document.getElementById('majorsChart').getContext('2d');
new Chart(ctxMaj, {
    type: 'pie',
    data: {
        labels: majorsLabels,
        datasets: [{ data: majorsValues, backgroundColor: majorsLabels.map((_,i)=>`hsl(${i*40 % 360} 70% 60%)`) }]
    },
    options: { responsive: true }
});

// Events chart (bar)
const eventsLabels = eventData.map(r => r.event_name);
const eventsValues = eventData.map(r => parseInt(r.participants));
const ctxEvt = document.getElementById('eventsChart').getContext('2d');
new Chart(ctxEvt, {
    type: 'bar',
    data: { labels: eventsLabels, datasets: [{ label: 'Participants', data: eventsValues, backgroundColor: 'rgba(54,162,235,0.6)'}] },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
});

// Subscriptions line chart
const subsLabels = subsData.map(r => r.month);
const subsValues = subsData.map(r => parseFloat(r.total));
const ctxSubs = document.getElementById('subsChart').getContext('2d');
new Chart(ctxSubs, {
    type: 'line',
    data: { labels: subsLabels, datasets: [{ label: 'Subscriptions (sum)', data: subsValues, borderColor: 'rgba(75,192,192,1)', fill: false }] },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
<?php require APPROOT . '/views/layouts/header.php'; ?>
<h1>Reports</h1>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Member Report</h5>
                <p class="card-text">Export list of all members to CSV.</p>
                <a href="<?php echo URLROOT; ?>/report/export_members" class="btn btn-primary">Export CSV</a>
                <a href="<?php echo URLROOT; ?>/report/export_pdf" class="btn btn-danger">Export PDF</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Financial Report</h5>
                <p class="card-text">Export all subscription and payment data.</p>
                <a href="<?php echo URLROOT; ?>/report/export_finance" class="btn btn-success">Export CSV</a>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
