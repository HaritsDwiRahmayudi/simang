<?php
// PAKSA TAMPILKAN ERROR
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h2>🕵️‍♂️ DIAGNOSA WEBSITE</h2>";

// 1. CEK FILESYSTEMS
echo "Pemeriksaan 1: config/filesystems.php ... <br>";
try {
    $fs = include('config/filesystems.php');
    if (is_array($fs)) {
        echo "<b style='color:green'>✅ AMAN! Syntax Benar.</b><br><br>";
    } else {
        echo "<b style='color:red'>❌ ISI FILE SALAH! Tidak mengembalikan array.</b><br><br>";
    }
} catch (ParseError $e) {
    echo "<b style='color:red'>❌ ERROR PARAH (Syntax Error)!</b><br>";
    echo "Pesan: " . $e->getMessage() . "<br>";
    echo "Di Baris: " . $e->getLine() . "<br><br>";
} catch (Throwable $e) {
    echo "<b style='color:orange'>⚠️ Error Lain: " . $e->getMessage() . "</b><br><br>";
}

// 2. CEK ROUTES
echo "Pemeriksaan 2: routes/web.php ... <br>";
try {
    // Kita cuma cek apakah file bisa dibaca tanpa meledak (Syntax Check)
    // Kalau syntax error, dia akan stop disini.
    include('routes/web.php'); 
} catch (ParseError $e) {
    echo "<b style='color:red'>❌ KETEMU! Error di routes/web.php</b><br>";
    echo "Masalah: " . $e->getMessage() . "<br>";
    echo "Di Baris: " . $e->getLine() . "<br>";
    exit;
} catch (Throwable $e) {
    // Kalau errornya "Class 'Route' not found", itu tandanya Syntax AMAN (karena Laravel belum loading)
    echo "<b style='color:green'>✅ AMAN! Syntax Routes Benar.</b> (Abaikan error Class not found)<br>";
}

echo "<hr><h3>KESIMPULAN:</h3>";
echo "Kalau dua-duanya Hijau (AMAN), berarti masalahnya di file <b>.env</b> atau <b>.htaccess</b>.";
?>