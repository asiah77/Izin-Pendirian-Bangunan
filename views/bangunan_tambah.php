<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Bangunan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                                <label for="id_jenis_bangunan"class="col-sm-3 control-label">Jenis Bangunan</label>
                                <div class="col-sm-9">
                                <?php
                                    $sql = 'SELECT * FROM tbl_jenis';
                                    $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');
                                    ?>
                                <select name="id_jenis_bangunan" class="form-control">
                                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $data['id_jenis_bangunan']; ?>">
                                        <?= $data['nama_jenis_bangunan']; ?></option>
                                    <?php } ?>
                                </select>
                                </div>

                        </div>
                        <div class="form-group">
                            <label for="alamat_bangunan" class="col-sm-3 control-label">Alamat Bangunan</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat_bangunan" class="form-control" id="inputEmail3"
                                    placeholder="Inputkan alamat Bangunan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="luas_tanah" class="col-sm-3 control-label">Luas Tanah</label>
                            <div class="col-sm-9">
                                <input type="number" name="luas_tanah" class="form-control" id="inputEmail3"
                                    placeholder="Inputkan Luas Tanah" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="luas_bangunan" class="col-sm-3 control-label">Luas Bangunan</label>
                            <div class="col-sm-9">
                                <input type="number" name="luas_bangunan" class="form-control" id="inputEmail3"
                                    placeholder="Inputkan Luas Bangunan" required>
                            </div>
                        </div>
                        <!-- 
   -->


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Bangunan</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=arsip&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Arsip
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
                                        //buat sql
                                        $sql = "INSERT INTO tbl_bangunan VALUES ('','$jenis_bangunan','$alamat_bangunan','$luas_tanah','$luas_bangunan')";
                                        $query = mysqli_query($koneksi, $sql) or die('SQL Simpan Arsip Error');
                                        if ($query) {
                                            echo "<script>window.location.assign('?page=bangunan&actions=tampil');</script>";
                                        } else {
                                            echo "<script>alert('Simpan Data Gagal');<script>";
                                        }
                                    }

?>