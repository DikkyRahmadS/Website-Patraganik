<?php
session_start();
include 'koneksi.php';
?>
<?php include 'header.php'; ?>
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center" style="background-image: url('assets_home/img/header.jpg');">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-black">Keranjang</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-red">Home</a>
					<a href="keranjang.php" class="text-red">Keranjang</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Foto Produk</th>
							<th>Harga</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php if (!empty($_SESSION["keranjang"])) { ?>
							<?php foreach ($_SESSION["keranjang"] as $idbarang => $jumlah) : ?>
								<?php
										$ambil = $koneksi->query("SELECT * FROM barang 
								WHERE idbarang='$idbarang'");
										$pecah = $ambil->fetch_assoc();
										$totalharga = $pecah["hargabarang"] * $jumlah;
										?>
								<tr class="text-tengah">
									<td><?php echo $nomor; ?></td>
									<td><?php echo $pecah['namabarang']; ?></td>
									<td class="image-prod">
										<img src="foto/<?php echo $pecah["fotobarang"]; ?>" style="width: 150px;border-radius:10px">
									</td>
									<td>Rp <?php echo number_format($pecah['hargabarang']); ?></td>
									<td><?php echo $jumlah; ?></td>
									<td>Rp <?php echo number_format($totalharga); ?></td>
									<td>
										<a href="hapuskeranjang.php?id=<?php echo $idbarang ?>" class="genric-btn danger radius">Hapus</a>
									</td>
								</tr>
								<?php $nomor++; ?>
						<?php endforeach;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<div class="float-right">
			<a href="produk.php" class="main_btn">Lanjutkan Belanja</a>
			&nbsp;<a href="checkout.php" class="main_btn">Checkout</a>
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>