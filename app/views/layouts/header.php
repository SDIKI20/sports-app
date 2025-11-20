<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>
    <?php if(isset($_SESSION['user_id'])): ?>
    <div class="app-wrapper d-flex">
        <aside class="app-sidebar bg-white shadow-sm">
            <div class="sidebar-header p-3 text-center">
                <a class="brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
            </div>
            <nav class="nav flex-column p-2">
                <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard"><i class="fa fa-home me-2"></i><span class="nav-text">Dashboard</span></a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/member"><i class="fa fa-users me-2"></i><span class="nav-text">Members</span></a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/team"><i class="fa fa-flag me-2"></i><span class="nav-text">Teams</span></a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/event"><i class="fa fa-calendar me-2"></i><span class="nav-text">Events</span></a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/subscription"><i class="fa fa-dollar-sign me-2"></i><span class="nav-text">Finance</span></a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/report"><i class="fa fa-file-alt me-2"></i><span class="nav-text">Reports</span></a>
            </nav>
            <div class="sidebar-footer p-3 text-center">
                <a class="btn btn-sm btn-outline-secondary logout-btn" href="<?php echo URLROOT; ?>/auth/logout">Logout</a>
                <!-- Icon-only logout shown when sidebar is collapsed -->
                <a class="logout-icon" href="<?php echo URLROOT; ?>/auth/logout" title="Logout">
                    <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                </a>
            </div>
        </aside>
        <div class="app-main flex-fill">
            <header class="app-topbar bg-white border-bottom">
                <div class="container-fluid d-flex align-items-center justify-content-between py-2">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-light btn-sm me-2" id="sidebarToggle"><i class="fa fa-bars"></i></button>
                        <form class="d-none d-md-inline-block me-3">
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="search" placeholder="Search projects">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-3">Welcome, <?php echo $_SESSION['user_username']; ?></span>
                        <img src="https://i.pravatar.cc/40" class="rounded-circle" alt="avatar">
                    </div>
                </div>
            </header>
            <main class="app-content p-4 container-fluid">
            <!-- Page content starts -->
    <?php else: ?>
    <div class="container">
    <?php endif; ?>
