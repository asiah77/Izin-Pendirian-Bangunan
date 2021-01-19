<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Jenis Bangunan</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM tbl_jenis WHERE id_jenis_bangunan='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">ID</td> <td><?= $data['id_jenis_bangunan'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Bangunan</td> <td><?= $data['nama_jenis_bangunan'] ?></td>
                        </tr>
                        <tr>
                            <td>Pajak Bangunan</td> <td><?= number_format($data['pajak_bangunan']) ?></td>
                        </tr>
                        
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=kategorivoucer&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Bangunan </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

