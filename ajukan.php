<?php include 'config/koneksi.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <center><h2>LENGKAPI FORM PENGAJUAN</h2></center>
        <hr>
            <form method="post">
                
                <div class="form-group">
                    <label for="">Jenis Bangunan</label>
                    <?php
                    $sql = 'SELECT * FROM tbl_bangunan inner join tbl_jenis ON tbl_bangunan.id_jenis_bangunan=tbl_jenis.id_jenis_bangunan';
                    $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');
                    ?>
                    <select name="id_jenis_bangunan" class="form-control">
                        <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $data['id_jenis_bangunan']; ?>"> <?= $data['nama_jenis_bangunan']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                        <label for="nama_pemohon">Nama Pengaju</label>
                        <input type="text" name="nama_pemohon" placeholder="Isi Nama Anda" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="nik">NIK Pengaju</label>
                        <input type="text" name="nik" placeholder="Isi NIK Anda" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" placeholder="Isi Alamat Anda" class="form-control" required>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit">Ajukan</button>
                </div>


            </form>
            <?php if (isset($_POST['submit'])) {
                        $ib = $_POST['id_jenis_bangunan'];
                        // print_r($ib);
                        $np = $_POST['nama_pemohon'];
                        $nkp = $_POST['nik'];
                        // print_r($np);
                        $alm = $_POST['alamat'];
                        $tgl = date('Y-m-d H:i:s');
                        print_r($tgl);
                        $sql = "INSERT INTO tbl_permohonan VALUES ('','$ib','$np', '$nkp', '$alm', '$tgl')";
                        $query = mysqli_query($koneksi, $sql) or die('SQL Simpan Permohonan Error');
                        if ($query) {
                            echo "<script>window.location.assign('index.php');</script>";
                        } else {
                            echo "<script>alert('Simpan Data Gagal');<script>";
                        }
                    }?>
        </div>
    </div>
</div>