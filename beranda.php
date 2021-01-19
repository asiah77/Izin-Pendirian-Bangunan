<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-info">
                <?php if (isset($_SESSION['username'])) { ?>
                <strong>Selamat Datang <strong><?=$_SESSION['username']; ?></strong>
                    <?php } else { ?>
                    <strong>Selamat Datang <strong>Pengunjung</strong>
                        <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sistem Perizinan Mendirikan Bangunan</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="30%">Jenis Bangunan</th>
                                <th>Alamat Bangunan</th>
                                <th>Luas Tanah</th>
                                <th>Luas Bangunan</th>
                                <th>Pajak</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = 'SELECT * FROM tbl_bangunan inner join tbl_jenis ON tbl_bangunan.id_jenis_bangunan=tbl_jenis.id_jenis_bangunan';
                            $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                // echo "<pre>";
                                // print_r($data);
                                // echo "</pre>";
                                ++$nomor; //Penambahan satu untuk nilai var nomor?>
                            <tr>
                                <td><?= $nomor; ?></td>
                                <td><?= $data['nama_jenis_bangunan']; ?></td>
                                <td><?= $data['alamat_bangunan']; ?></td>
                                <td><?= number_format($data['luas_tanah']); ?> m2</td>
                                <td><?= number_format($data['luas_bangunan']); ?> m2</td>
                                <td>Rp. <?= number_format($data['pajak_bangunan']); ?> /Bln</td>
                                <!-- <td>
                                     <center><a href="<?= 'beli.php?id='.$data['id_bangunan']; ?>" class="btn btn-success"><li class="fa fa-cart-plus"></li> Ajukan</a></center>
                                </td> -->
                            </tr>
                            <!--Tutup Perulangan data-->
                            <?php
                            } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!--akhir colomn kedua-->


    </div>
</div>