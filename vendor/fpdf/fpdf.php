<?php
// Shim to load the bundled FPDF library (fpdf186) placed at project root
// This file allows existing require('../vendor/fpdf/fpdf.php') calls to work.
$real = __DIR__ . '/../../fpdf186/fpdf.php';
if(file_exists($real)){
    require_once $real;
} else {
    // Fallback: try common alternative path
    $alt = __DIR__ . '/fpdf.php';
    if(file_exists($alt)){
        require_once $alt;
    } else {
        trigger_error('FPDF library not found. Expected: ' . $real, E_USER_WARNING);
    }
}
