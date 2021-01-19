<?php
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM 
tbl_bangunan where id_bangunan ='$id'") or die('SQL Edit error');
$data = mysqli_fetch_array($ambil);
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Bangunan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        
                        <div class="form-group">
                            <label for="id_jenis_bangunan" class="col-sm-3 control-label">Jenis Bangunan</label>
                            <div class="col-sm-9">
                                <?php
                                    $sqll = 'SELECT * FROM tbl_jenis';
                                    $queryy = mysqli_query($koneksi, $sqll) or die('SQL Anda Salah');
                                    ?>
                                <select name="id_jenis_bangunan" class="form-control">
                                    <?php while ($dataa = mysqli_fetch_array($queryy)) { ?>
                                    <option value="<?= $dataa['id_jenis_bangunan']; ?>">
                                        <?= $dataa['nama_jenis_bangunan']; ?></option>
                                    <?php } ?>
                                </select>
                                
                                              
                            </div>
                        </div>
						<div class="form-group">
                            <label for="alamat_bangunan" class="col-sm-3 control-label">Alamat Bangunan</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_bangunan" value="<?=$data['alamat_bangunan']; ?>"class="form-control" id="inputEmail3" placeholder="Input Alamat Bangunan">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="luas_tanah" class="col-sm-3 control-label">Luas Tanah</label>
                            <div class="col-sm-9">
                                <input type="number" name="luas_tanah" value="<?=$data['luas_tanah']; ?>"class="form-control" id="inputEmail3" placeholder="Input Luas Tanah">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="luas_bangunan" class="col-sm-3 control-label">Luas Bangunan</label>
                            <div class="col-sm-9">
                                <input type="number" name="luas_bangunan" value="<?=$data['luas_bangunan']; ?>"class="form-control" id="inputEmail3" placeholder="Input Luas Bangunan">
                            </div>
                        </div>
						      

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Bangunan </button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=bangunan&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Bangunan
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if ($_POST) {
    //Ambil data dari form
    $jenis_bangunan = $_POST['id_jenis_bangunan'];
    $alamat_bangunan = $_POST['alamat_bangunan'];
    $luas_tanah = $_POST['luas_tanah'];
    $luas_bangunan = $_POST['luas_bangunan'];
    // $tanggal_masuk = $_POST['tanggal_masuk'];
    // $keterangan = $_POST['keterangan'];
    //buat sql
    $sqli = "UPDATE tbl_bangunan SET id_jenis_bangunan = '$jenis_bangunan', alamat_bangunan = '$alamat_bangunan', luas_tanah = '$luas_tanah', luas_bangunan = '$luas_bangunan' WHERE id_bangunan  = '$id'";
    $queryin = mysqli_query($koneksi, $sqli) or die('SQL Edit  Error');
    if ($queryin) {
        echo "<script>alert('Berhasil');</script>";
        echo "<script>window.location.assign('?page=datavoucer&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    
}

?>



