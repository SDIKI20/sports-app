// Minimal JS placeholder
document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('sidebarToggle');
    var sidebar = document.querySelector('.app-sidebar');
    if (!btn || !sidebar) return;

    btn.addEventListener('click', function () {
        // On small screens, use 'open' to slide in/out; on larger screens toggle 'collapsed'
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('open');
        } else {
            // Toggle collapsed state; also keep an 'expanded' helper for styling
            var collapsed = sidebar.classList.toggle('collapsed');
            if (collapsed) {
                sidebar.classList.remove('expanded');
            } else {
                sidebar.classList.add('expanded');
            }
        }
    });

    // Clicking outside sidebar on mobile closes it
    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 768 && sidebar.classList.contains('open')) {
            var target = e.target;
            if (!sidebar.contains(target) && target !== btn) {
                sidebar.classList.remove('open');
            }
        }
    });
});
