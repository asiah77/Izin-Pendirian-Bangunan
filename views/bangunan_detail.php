<?php 
    $id = $_GET['id'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-12>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Bangunan</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                      

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                         <td>Jenis Bangunan</td>
                         <?php
                            $sql = "SELECT * FROM tbl_bangunan inner join tbl_jenis on tbl_bangunan.id_jenis_bangunan=tbl_jenis.id_jenis_bangunan where id_bangunan='$id'";
                                    $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');
                                    $data = mysqli_fetch_array($query);//proses query ke database
                                        // print_r($data);
                            ?>
                            <td><?= $data['nama_jenis_bangunan']; ?></td>
                            
                        </tr>
                        <tr>
                            <td>Alamat Bangunan</td> <td><?= $data['alamat_bangunan']; ?></td>
                        </tr>
                        <tr>
                            <td>Luas Tanah</td> <td><?= number_format($data['luas_tanah']); ?> m2</td>
                        </tr>
                        <tr>
                            <td>Luas Bangunan</td> <td><?= number_format($data['luas_bangunan']); ?> m2</td>
                        </tr>
                        <tr>
                            <td>Pajak Bangunan</td> <td>Rp. <?= number_format($data['pajak_bangunan']); ?> /Bln</td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=datavoucer&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Bangunan </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

