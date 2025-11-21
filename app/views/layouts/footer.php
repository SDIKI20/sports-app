            <!-- Page content ends -->
            </main>
        </div> <!-- /.app-main -->
    </div> <!-- /.app-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
    <script>
    // Attach a confirmation dialog to logout links/buttons
    (function(){
        document.addEventListener('DOMContentLoaded', function(){
            var logoutElems = document.querySelectorAll('.logout-btn, .logout-icon');
            logoutElems.forEach(function(el){
                el.addEventListener('click', function(e){
                    var href = el.getAttribute('href') || el.dataset.href;
                    var confirmMsg = 'Are you sure you want to logout?';
                    if(!confirm(confirmMsg)){
                        e.preventDefault();
                        e.stopPropagation();
                        return false;
                    }
                    // allow default to proceed
                });
            });
        });
    })();
    </script>
</body>
</html>
