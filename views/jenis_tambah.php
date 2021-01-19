

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Jenis Bangunan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">

						<div class="form-group">
                            <label for="nama_jenis_bangunan" class="col-sm-3 control-label">Jenis Bangunan</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_jenis_bangunan" class="form-control" id="inputEmail3" placeholder="Jenis Bangunan">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="pajak_bangunan" class="col-sm-3 control-label">Pajak Bangunan</label>
                            <div class="col-sm-9">
                                <input type="number" name="pajak_bangunan" class="form-control" id="inputEmail3" placeholder="Pajak Bangunan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=kategoribangunan&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Bangunan
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nama_jenis_bangunan=$_POST['nama_jenis_bangunan'];
    $pajak_bangunan=$_POST['pajak_bangunan'];
    //buat sql
    $sql="INSERT INTO tbl_jenis VALUES ('','$nama_jenis_bangunan', '$pajak_bangunan')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Kategori Error");
    if ($query){
        echo "<script>window.location.assign('?page=jenis&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
