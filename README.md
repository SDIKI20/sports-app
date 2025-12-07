# Sports Association Management System

A pure PHP MVC application for managing sports associations, members, teams, events, and subscriptions.

## Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx Web Server (with mod_rewrite enabled)

## Installation

1. **Database Setup**
   - Create a new MySQL database named `sports_db`.
   - Import `database/schema.sql` to create tables.
   - Import `database/seed.sql` to populate initial data.

2. **Configuration**
   - Open `config/config.php` and update the database credentials if necessary.

3. **Dependencies**
   - For PDF generation, download [FPDF](http://www.fpdf.org/) and extract it to `vendor/fpdf/`.
   - Ensure the structure is `vendor/fpdf/fpdf.php`.

4. **Running the App**
   - Point your web server document root to the `public` folder.
   - Or use PHP built-in server:
     \`\`\`bash
     cd public
     php -S localhost:8000
     \`\`\`
   - Visit `http://localhost:8000`

## Running with XAMPP

1. **Move Files**
   - Copy the entire project folder into your XAMPP `htdocs` directory (e.g., `C:\xampp\htdocs\sports-app`).

2. **Database Setup**
   - Open XAMPP Control Panel and start **Apache** and **MySQL**.
   - Go to `http://localhost/phpmyadmin`.
   - Create a new database named `sports_db`.
   - Click **Import** and select `database/schema.sql`, then `database/seed.sql`.

3. **Configuration**
   - Open `config/config.php`.
   - Change `URLROOT` to match your folder path:
     \`\`\`php
     define('URLROOT', 'http://localhost/sports-app/public');
     \`\`\`
   - Ensure DB credentials match XAMPP defaults (User: `root`, Pass: empty).

4. **Access the App**
   - Open your browser and visit: `http://localhost/sports-app/public`

## Default Login
- **Username:** admin
- **Password:** password
