<?php

namespace Midtrans;

require_once 'Midtrans.php';

Config::$serverKey = 'SB-Mid-server-NhSDYN-g37iNmCxxnGDpfqmZ';
Config::$clientKey = 'SB-Mid-client-ODPVWdQLUfjiXjot';

Config::$isSanitized = Config::$is3ds = true;

session_start();
include 'koneksi.php';
if (!isset($_SESSION["pengguna"])) {
	echo "<script> alert('Anda belum login');</script>";
	echo "<script> location ='login.php';</script>";
}
?>
<?php include 'header.php';
$id = $_SESSION["pengguna"]['id'];
// $ambil = $koneksi->query("SELECT *, pembelian.idbeli as idbelireal FROM pembelian where id = $id order by pembelian.tanggalbeli desc, pembelian.idbeli desc") or die(mysqli_error($koneksi));

?>
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center" style="background-image: url('assets_home/img/header.jpg');">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-black">Riwayat</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-red">Home</a>
					<a href="riwayat.php" class="text-red">Riwayat</a>
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
						<tr class="text-tengah">
							<th>No</th>
							<th>Tanggal</th>
							<th>Daftar</th>
							<th>Total</th>
							<th>Opsi</th>
							<th>Metode Pembayaran</th>
							<th>Status</th>
							<th>Nota</th>
						</tr>
					</thead>

					<tbody>
						<?php $nomor = 1;
						$ambil = $koneksi->query("SELECT *, pembelian.idbeli as idbelireal FROM pembelian WHERE pembelian.id='$id' order by pembelian.tanggalbeli desc, pembelian.idbeli desc");
						while ($pecah = $ambil->fetch_assoc()) {
							if ($pecah['metodepembayaran'] != 'COD') {
								if ($pecah['statusbeli'] != '') {
									$notransaksi = $pecah['notransaksi'];
									// echo $notransaksi;
									$status = \Midtrans\Transaction::status($notransaksi);
									$transaction = $status->transaction_status;
									if ($pecah['statusbeli'] == 'pending') {
										$koneksi->query("UPDATE pembelian SET statusbeli='$transaction' WHERE idbeli='$pecah[idbelireal]'") or die(mysqli_error($koneksi));
									}
								}
							}
						?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo tanggal($pecah['tanggalbeli']) . '<br>Jam ' . date('H:i', strtotime($pecah['waktu'])) ?></td>
								<td>
									<ul style="padding: 0;list-style-type: none;">
										<?php
										$ambildetail = $koneksi->query("SELECT * FROM pembelianproduk WHERE idbeli='$pecah[idbelireal]'");
										while ($detail = $ambildetail->fetch_assoc()) {
											echo '<li><b>- ' . $detail['nama'] . '</b></li>';
										}
										?>
									</ul>
								</td>
								<td>Rp. <?php echo number_format($pecah["totalbeli"]); ?></td>
								<td>
									<?php
									if ($pecah['metodepembayaran'] != 'COD') { ?>
										<button onclick="bayar('<?= $pecah['snapkode'] ?>')" class="genric-btn warning radius">Bayar</button>
									<?php } else { ?>
										<b>Bayar dengan kurir</b>
									<?php } ?>
								</td>
								<td><?php echo $pecah["metodepembayaran"]; ?></td>
								<td>
									<b>
										<?php
										if ($pecah['metodepembayaran'] != 'COD') {
											if ($pecah['statusbeli'] != '') {
												if ($transaction == 'settlement') {
													echo "<label class='text-success'>Lunas</label><br>";
													if ($pecah['statusbeli'] == 'Barang Telah Sampai ke Pemesan') {
										?>
														<a data-toggle="modal" data-target="#selesai<?= $nomor ?>" class="btn btn-success text-white">Konfirmasi Selesai</a>
												<?php
													} else {
														if ($pecah['statusbeli'] != 'settlement') {
															echo $pecah['statusbeli'];
														}
													}
												} else if ($transaction == 'pending') {
													echo "<label class='text-warning'>Pending, Mohon Selesaikan Pembayaran</a>";
												} else if ($transaction == 'deny') {
													echo "<label class='text-danger'>Di Tolak</a>";
												} else if ($transaction == 'expire') {
													echo "<label class='text-danger'>Gagal, Pembayaran anda telah melewati batas pembayaran</a>";
												} else if ($transaction == 'cancel') {
													echo "<label class='text-success'>Gagal</a>";
												} else {
													echo "<label class='t ext-success'>Gagal</a>";
												}
											} else {
												echo 'Belum Dibayar';
											}
										} else {
											if ($pecah['statusbeli'] == 'Barang Telah Sampai ke Pemesan') {
												?>
												<a data-toggle="modal" data-target="#selesai<?= $nomor ?>" class="btn btn-success text-white">Konfirmasi Selesai</a>
										<?php
											} else {
												echo $pecah['statusbeli'];
											}
										}
										?>
									</b>
									<p>
									<a href="https://wa.me/6289654242785" data-target="<?= $nomor ?>" class="btn btn-success text-white">Komplain ?</a></p>
								</td>
								<td>
									<a class="genric-btn primary radius" target="_blank" href="notacetak.php?id=<?= $pecah['idbeli'] ?>">Nota</a>
								</td>
							</tr>
							<?php $nomor++; ?>
						<?php  } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php
$no = 1;
$id = $_SESSION["pengguna"]['id'];
$ambil = $koneksi->query("SELECT *, pembelian.idbeli as idbelireal FROM pembelian WHERE pembelian.id='$id' order by pembelian.tanggalbeli desc, pembelian.idbeli desc");
while ($pecah = $ambil->fetch_assoc()) { ?>
	<div class="modal fade" id="selesai<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan Selesai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post">
					<div class="modal-body">
						<h5>Apakah anda yakin ingin mengkonfirmasi pesanan telah selesai ?</h5>
					</div>
					<div class="modal-footer">
						<input type="hidden" class="form-contol" value="<?= $pecah['idbelireal'] ?>" name="idbeli">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" name="selesai" value="selesai" class="btn btn-biru">Konfirmasi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
	$no++;
} ?>
<?php
if (isset($_POST["selesai"])) {
	$koneksi->query("UPDATE pembelian SET statusbeli='Selesai'
		WHERE idbeli='$_POST[idbeli]'");
	echo "<script>alert('Pesanan berhasil di konfirmasi selesai')</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>
<div style="padding-top:600px"></div>
<?php
include 'footer.php';
?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
<script type="text/javascript">
	function bayar(id) {
		snap.pay(id);
	};
</script>