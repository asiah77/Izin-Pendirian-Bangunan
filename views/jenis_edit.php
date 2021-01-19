<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM tbl_jenis WHERE id_jenis_bangunan='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data Kategori</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="id_jenis_bangunan" class="col-sm-3 control-label">ID</label>
                             <div class="col-sm-9">
								<input type="text" name="id_jenis_bangunan" value="<?=$data['id_jenis_bangunan']?>"class="form-control" id="inputEmail3" placeholder="" readOnly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_jenis_bangunan" class="col-sm-3 control-label">Jenis Bangunan</label>
                             <div class="col-sm-9">
								<input type="text" name="nama_jenis_bangunan" value="<?=$data['nama_jenis_bangunan']?>"class="form-control" id="inputEmail3" placeholder="Jenis Bangunan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pajak_bangunan" class="col-sm-3 control-label">Pajak Bangunan</label>
                             <div class="col-sm-9">
								<input type="text" name="pajak_bangunan" value="<?= number_format($data['pajak_bangunan'])?>"class="form-control" id="inputEmail3" placeholder="Jenis Bangunan">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Jenis</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=jenis&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Kategori
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
    $sql="UPDATE tbl_jenis SET nama_jenis_bangunan = '$nama_jenis_bangunan', pajak_bangunan = '$pajak_bangunan' WHERE id_jenis_bangunan='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit Kategori Error");
    if ($query){
        echo "<script>window.location.assign('?page=kategorivoucer&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



