<?php
if (!isset($_SESSION['username'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Bangunan</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Bangunan</th>
                                <th>Alamat Bangunan</th>
                                <th>Luas Tanah</th>
                                <th>Luas Bangunan</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = 'SELECT * FROM tbl_bangunan inner join tbl_jenis on tbl_bangunan.id_jenis_bangunan=tbl_jenis.id_jenis_bangunan';
                            $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                // print_r($data['id_bangunan']);
                                ++$nomor; //Penambahan satu untuk nilai var nomor?>
                                <tr>
                                    <td><?= $nomor; ?></td>
                                    <td><?= $data['nama_jenis_bangunan']; ?></td>
                                    <td><?= $data['alamat_bangunan']; ?></td>
                                    <td style="text-align:right;"><?= number_format($data['luas_tanah']); ?> m2  </td>
                                    <td style="text-align:right;"><?= number_format($data['luas_bangunan']); ?> m2  </td>
                                    <td style="text-align:right;">
                                        <a href="?page=bangunan&actions=detail&id=<?= $data['id_bangunan']; ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=bangunan&actions=edit&id=<?= $data['id_bangunan']; ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
										
                                        <a href="?page=bangunan&actions=delete&id=<?= $data['id_bangunan']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus data <?= $data['nama_jenis_bangunan']; ?>?')">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=bangunan&actions=tambah" class="btn btn-info btn-sm">
                                        Tambah Bangunan
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>