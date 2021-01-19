<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Laporan Permohonan Izin</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="130px">Nama Pengaju</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Bangunan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            // $sql = "SELECT * FROM tb_produk INNER JOIN (tb_order INNER JOIN tb_detail_order 
                            //         ON tb_order.id_order=tb_detail_order.id_order) 
                            //         ON tb_produk.id=tb_detail_order.id_produk order by total_bayar desc";
                            $sql="SELECT * FROM tbl_permohonan inner join tbl_jenis on tbl_permohonan.id_jenis_bangunan=tbl_jenis.id_jenis_bangunan";
                            // $sql="SELECT tb_detail_order.id_produk,tb_detail_order.jumlah,tb_detail_order.id_order
                            // FROM tb_detail_order
                            // JOIN tb_order
                            // ON tb_detail_order.id_produk=tb_produk.id_produk
                            // JOIN tb_order
                            // ON tb_detail_order.id_order=tb_orders.id_order";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            
                            // $totalitem=0;
                            // $totaljual=0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                // echo   "<pre>";
                                // print_r($data);
                                // echo   "</pre>";

                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $data['nama_pemohon'] ?></td>
                                <td><?= $data['nik'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td>
                                    <?= tanggal_indo($data['tanggal_pengajuan']) ?>
                                </td>
                                <td><?= $data['nama_jenis_bangunan'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9">
                                    <a href="report/laporan_semua.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Semua Data

                                    </a>
                                    <a href="#cetak_perbulan" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Perbulan

                                    </a>
                                    <a href="#cetak_pertahun" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Pertahun

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

<div id="cetak_perbulan" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>

        <form target="_blank" action="report/laporan_perbulan.php" method="post">
            <h4>Pilih bulan </h4>
            <select name="bulan" class="form-control">
                <option value="12"> Desember </option>
                <option value="11"> November </option>
                <option value="10"> Oktober </option>
                <option value="09"> September </option>
                <option value="08"> Agustus </option>
                <option value="07"> Juli </option>
                <option value="06"> Juni </option>
                <option value="05"> Mei </option>
                <option value="04"> April </option>
                <option value="03"> Maret </option>
                <option value="02"> Februari </option>
                <option value="01"> Januari </option>
            </select>
            <h4>Pilih tahun</h4>
            <select name="tahun" class="form-control">
                <?php
            for ($i=substr(date("d-m-Y"),6,4); $i > substr(date("d-m-Y"),6,4)-5; $i--) { ?>
                <option value="<?=$i?>"> <?=$i?> </option>
                <?php  }
          ?>
            </select>

            <button type="submit">OK</button>
        </form>
    </div>
</div>

<div id="cetak_pertahun" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>

        <form target="_blank" action="report/laporan_pertahun.php" method="post">
            <h4>Pilih tahun</h4>
            <select name="tahun" class="form-control">
                <?php
            for ($i=substr(date("d-m-Y"),6,4); $i > substr(date("d-m-Y"),6,4)-4; $i--) { ?>
                <option value="<?=$i?>"> <?=$i?> </option>
                <?php  }
          ?>
            </select>
            

            <button type="submit">OK</button>
        </form>
    </div>
</div>
<?php
// FUNGSI
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
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
				'Des'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}