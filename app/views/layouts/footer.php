            <!-- Page content ends -->
            </main>
        </div> <!-- /.app-main -->
    </div> <!-- /.app-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function(){
            document.querySelector('.app-sidebar')?.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
