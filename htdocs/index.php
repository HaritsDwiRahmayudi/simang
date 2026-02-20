<?php

// --- 1. MODE DIAGNOSA (BIAR ERRORNYA MUNCUL TEKS) ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ----------------------------------------------------

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// --- 2. PERBAIKAN JALUR (HAPUS "/../") ---
// Karena index.php sekarang sejajar dengan folder storage, vendor, dll.

// Cek Mode Maintenance
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register Composer (Perhatikan: Gak pake titik dua lagi)
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel
/** @var Application $app */
$app = require_once __DIR__.'/bootstrap/app.php';

$app->handleRequest(Request::capture());