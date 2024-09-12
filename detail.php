<?php
session_start();
include 'koneksi.php';
?>
<?php
$idbarang = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM barang WHERE idbarang='$idbarang'");
$detail = $ambil->fetch_assoc();
$kategori = $detail["id_kategori"];
?>
<?php include 'header.php'; ?>
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center" style="background-image: url('assets_home/img/bgatas.webp');">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-white">Produk Detail</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-white">Home</a>
					<a href="#" class="text-white">Produk Detail</a>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_product_img">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="foto/<?php echo $detail["fotobarang"]; ?>" alt="First slide" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div>
					<h3><?php echo $detail["namabarang"] ?></h3>
					<br>
					<h2>Rp. <?php echo number_format($detail["hargabarang"]); ?></h2>
					<br>
					<p>Jumlah Ketersediaan Produk : <?php echo $detail["stokbarang"]; ?></p>
					<p>
						<?php echo $detail["deskripsibarang"]; ?>
					</p>
					<form method="post">
						<div class="form-group">
							<div class="mb-3">
								<label for="qty">Masukkan Jumlah Produk :</label>
								<input type="number" min="1" name="jumlah" max="<?php echo number_format($detail["stokbarang"]); ?>" required value="1" required class="form-control">
							</div>
							<div class="card_area">
								<button class="main_btn float-end float-right" name="beli"><i class="fa fa-shopping-cart"></i> Beli</button>
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST["beli"])) {
						$jumlah = $_POST["jumlah"];
						$_SESSION["keranjang"][$idbarang] = $jumlah;
						echo "<script> alert('Produk Masuk Ke Keranjang');</script>";
						echo "<script> location ='keranjang.php';</script>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>

<?php
include 'footer.php';
?>