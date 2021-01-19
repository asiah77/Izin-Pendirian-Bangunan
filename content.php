<?php

@$page = $_GET['page'];
@$aksi = $_GET['actions'];
//seleksi page atau halaman yang dipilih oleh pengguna
//Menggunakan IF
if (empty($page)) {
    require 'beranda.php';
} elseif ($page == 'keranjang') {
    require 'keranjang.php';
} elseif ($page == 'ajukan') {
    require 'ajukan.php';
} else {
    $file = 'views/'.$page.'_'.$aksi.'.php';
    if (file_exists($file)) {
        require 'views/'.$page.'_'.$aksi.'.php';
    } else {
        require 'beranda.php';
    }
}
