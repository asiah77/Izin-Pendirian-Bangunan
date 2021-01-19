<!DOCTYPE html>
<html>
    <head>
    <title>Cetak Data Permintaan Perbulan</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
  include '../config/koneksi.php';
        $ambilbln = $_POST['bulan'];
        $ambilthn = $_POST['tahun'];
        $bulanNama;
        if ($ambilbln == 12) {
            $bulanNama = 'DESEMBER';
        } elseif ($ambilbln == 11) {
            $bulanNama = 'NOVEMBER';
        } elseif ($ambilbln == 10) {
            $bulanNama = 'OKTOBER';
        } elseif ($ambilbln == 9) {
            $bulanNama = 'SEPTEMBER';
        } elseif ($ambilbln == 8) {
            $bulanNama = 'AGUSTUS';
        } elseif ($ambilbln == 7) {
            $bulanNama = 'JULI';
        } elseif ($ambilbln == 6) {
            $bulanNama = 'JUNI';
        } elseif ($ambilbln == 5) {
            $bulanNama = 'MEI';
        } elseif ($ambilbln == 4) {
            $bulanNama = 'APRIL';
        } elseif ($ambilbln == 3) {
            $bulanNama = 'MARET';
        } elseif ($ambilbln == 2) {
            $bulanNama = 'FEBRUARI';
        } elseif ($ambilbln == 1) {
            $bulanNama = 'JANUARI';
        }

        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        
                        <h3>DATA PERMOHONAN IZIN   <?php echo "$bulanNama $ambilthn"; ?></h3>
                        <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <label class="col-sm-12 control-label"><center><strong>IMB</strong></center></label>
                            <p align="center">
                              JL. Lintas Sumatera, Simpang Empat<br>
                              Kabupaten Asahan, Sumatera Utara, Kode Pos : 21223
                            </p>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
  <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="120px">Nama Pengaju</th>
                                <th width="120px">NIK</th>
                                <th>Alamat</th>
                                <th>Jenis Bangunan</th>
                                <th>Tanggal Pengajuan</th>
                                
                                <!-- <th>AKSI</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php

                            $sql = "SELECT * FROM tbl_permohonan inner join tbl_jenis on tbl_permohonan.id_jenis_bangunan=tbl_jenis.id_jenis_bangunan WHERE substr(tanggal_pengajuan,1,7)='$ambilthn-$ambilbln'";

                            $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');

                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            //
                            while ($data = mysqli_fetch_array($query)) {
                                ++$nomor; //Penambahan satu untuk nilai var nomor
                                ?>
                            <tr>
                                <td><?= $nomor; ?></td>
                                    <td><?= $data['nama_pemohon']; ?></td>
                                    <td><?= $data['nik']; ?></td>
                                    <td><?= $data['alamat']; ?></td>
                                    

                                    <td><?= $data['nama_jenis_bangunan']; ?></td>
                                    <td><?= tanggal_indo($data['tanggal_pengajuan']); ?></td>
                            </tr>
                            
                            <!--Tutup Perulangan data-->
                            <?php
                            } ?>
                            

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-right">
                                    Kisaran <?= date('d-m-Y'); ?>
                                    <br><br><br><br>
                                   <u>IMB<strong></u><br>
                                     Call : 08xx - xxxx - xxx
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
    </body>
</html>


<?php
// FUNGSI
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = [1 => 'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu',
            ];

    $bulan = [1 => 'Januari',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Juni',
                'Juli',
                'Agust',
                'Sept',
                'Okt',
                'Nov',
                'Des',
            ];
    $split = explode('-', $tanggal);
    $tgl_indo = $split[2].' '.$bulan[(int) $split[1]].' '.$split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));

        return $hari[$num].', '.$tgl_indo;
    }

    return $tgl_indo;
}
