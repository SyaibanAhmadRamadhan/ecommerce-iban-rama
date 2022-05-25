<?php
include 'config.php';
$query = mysqli_query($koneksi,'SELECT MAX(kode) as kodex  FROM  sepeda'); // mengambil nilai kode_barang terbesar
$data = mysqli_fetch_assoc($query);
$kodeBarang = $data['kodex'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$kodeBarang = "SPD" . sprintf("%03s", $urutan);

if(isset($_POST['submit'])){
    if (tambah($_POST)>0){
        echo "
            <script>
            alert('data berhasil ditambahkan!');
            document.location.href='index.php?page=sepeda';
            </script>
        ";
    }else{
        echo "
            <script>
            alert('data gagal ditambahkan!');
            document.location.href='index.php?page=tambah'';
            </script>
        ";
    }
}
?>

<style>
        .buton {
    float: right;
    display: block;
}
</style>
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <div class="buton">
<a href="index.php?page=sepeda"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>



<h3> <i class="fa-solid fa-circle-plus mr-3"></i> Tambah Data</i></h3><hr> 

    <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" size="4"  type="text" name="kode" required="required" value="<?php echo $kodeBarang; ?>" readonly>
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" size="4" type="text" name="name" required placeholder="Nama Barang...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" size="4" type="text" id="pcs" name="stock" onkeypress="return event.charCode >= 48 && event.charCode <=57" required placeholder="Stock Barang...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4" id="dengan-rupiah" type="text" name="harga" required placeholder="Harga Barang...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6">
                <select class="form-control"name="suplier" required>
                    <option value="">Pilih Suplier...</option>
                    <option value="Kota Jakarta Pusat">Kota Jakarta Pusat</option>
					<option value="Kota Jakarta Timur">Kota Jakarta Timur</option>
					<option value="Kota Depok">Kota Depok</option>
					<option value="Kota Bekasi">Kota Bekasi</option>
					<option value="Kota Bandung">Kota Bandung</option>
                </select>
                <br>
            </div>
		</div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6">
            <textarea name="komentar" cols="80" rows="4" ></textarea>
            <br>
            </div>
		</div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6">
                <input size="4" name="gambar" type="file" required>
                <br>
            </div>
		</div>

        <div class="item form-group">
			<div  class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Update">
			</div>
        </div>

</form>

 <script src="../method/js/rp.js"></script>
 <script src="../method/js/pcs.js"></script>


