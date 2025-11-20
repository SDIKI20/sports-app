<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sports_db');

// App Configuration
define('APPROOT', dirname(dirname(__FILE__)) . '/app');
// For XAMPP, if your folder is named 'sports-app', use: 'http://localhost/sports-app/public'
define('URLROOT', 'http://localhost/sports-app/public'); // Change this to your URL
define('SITENAME', 'Sports Association Manager');
define('APPVERSION', '1.0.0');
// Toggle database connection messages (set to true for local debugging)
define('SHOW_DB_MESSAGES', false);
