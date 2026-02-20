<?php
// Script buat "Menjembatani" folder storage ke public
$target = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public';
$link = $_SERVER['DOCUMENT_ROOT'] . '/storage';

if(file_exists($link)){
    echo "<h1>Link sudah ada!</h1> Coba hapus folder 'public/storage' dulu lewat File Manager, baru jalankan file ini lagi.";
} else {
    symlink($target, $link);
    echo "<h1>BERHASIL!</h1> Folder Storage sudah terhubung. Gambar & PDF harusnya sudah bisa dibuka.";
}
?>