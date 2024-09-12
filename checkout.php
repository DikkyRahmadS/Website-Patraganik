<?php

namespace Midtrans;

require_once 'Midtrans.php';

Config::$serverKey = 'SB-Mid-server-NhSDYN-g37iNmCxxnGDpfqmZ';
Config::$clientKey = 'SB-Mid-client-ODPVWdQLUfjiXjot';

printExampleWarningMessage();

Config::$isSanitized = Config::$is3ds = true;


function printExampleWarningMessage()
{
	if (strpos(Config::$serverKey, 'your ') != false) {
		echo "<code>";
		echo "<h4>Please set your server key from sandbox</h4>";
		echo "In file: " . __FILE__;
		echo "<br>";
		echo "<br>";
		echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-NhSDYN-g37iNmCxxnGDpfqmZ\';');
		die();
	}
}


session_start();
include 'koneksi.php';
if (!isset($_SESSION["pengguna"])) {
	echo "<script> alert('Anda belum login');</script>";
	echo "<script> location ='login.php';</script>";
}
$idakun = $_SESSION["pengguna"]["id"];
$ambildata = $koneksi->query("SELECT *FROM pengguna WHERE id='$idakun'");
$akun = $ambildata->fetch_assoc();
?>

<?php include 'header.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>


<section class="banner_area">
	<div class="banner_inner d-flex align-items-center" style="background-image: url('assets_home/img/header.jpg');">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-black">Checkout</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-red">Home</a>
					<a href="checkout.php" class="text-red">Checkout</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="checkout_area section_gap">
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
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php $totalberat = 0; ?>
						<?php $totalbelanja = 0; ?>
						<?php foreach ($_SESSION["keranjang"] as $idbarang => $jumlah) : ?>
							<?php
							$ambil = $koneksi->query("SELECT * FROM barang 
					WHERE idbarang='$idbarang'");
							$pecah = $ambil->fetch_assoc();
							$totalharga = $pecah["hargabarang"] * $jumlah;
							$subberat = $pecah["beratbarang"] * $jumlah;
							$totalberat += $subberat;

							?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['namabarang']; ?></td>
								<td class="image-prod">
									<img src="foto/<?php echo $pecah["fotobarang"]; ?>" style="width: 150px;border-radius:10px">
								</td>
								<td>Rp <?php echo number_format($pecah['hargabarang']); ?></td>
								<td><?php echo $jumlah; ?></td>
								<td>Rp <?php echo number_format($totalharga); ?></td>
							</tr>
							<?php $nomor++; ?>
							<?php $totalbelanja += $totalharga; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="billing_details">
			<div class="row">
				<div class="col-lg-12">
					<h3>Check out Detail</h3>
					<form class="contact_form" method="post">
						<div class="row">
							<div class="col-md-6 form-group p_star">
								<label>Nama</label>
								<input type="text" readonly value="<?php echo $_SESSION["pengguna"]['nama'] ?>" class="form-control valid mb-3" required>
							</div>
							<div class="col-md-6 form-group p_star">
								<label>No. HP</label>
								<input type="text" readonly value="<?php echo $_SESSION["pengguna"]['telepon'] ?>" class="form-control valid mb-3" required>
							</div>
							<div class="col-md-12 form-group">
								<label>Alamat Lengkap</label>
								<input type="hidden" name="totalberatnya" value="<?php echo $totalberat ?>">
								<textarea class="form-control valid mb-3" rows="5" name="alamatpengiriman" placeholder="Masukkan Alamat" required></textarea>
							</div>
							<div class="col-md-6 form-group p_star">
								<label>Provinsi</label>
								<select class="form-control" name="nama_provinsi">

								</select>
							</div>
							<div class="col-md-6 form-group p_star">
								<label>Kota</label>
								<select class="form-control" name="nama_distrik">

								</select>
							</div>
							<div class="col-md-12 form-group p_star">
								<div class="form-group">
									<label>Pilih Metode Pembayaran</label>
									<select name="metodepembayaran" id="metodepembayaran" class="form-control" onchange="handlemetodepembayaran()" required>
										<option value="">Pilih</option>
										<option value="Virtual Account">Virtual Account</option>
										<option value="COD">COD</option>
									</select>
								</div>
							</div>
						</div>
						<div class="tampil" id="tampil" style="display: none;">
							<div class="row">
								<div class="col-md-6 form-group p_star">
									<label>Ekspedisi</label>
									<select class="form-control" name="nama_ekspedisi" id="ekspedisi1">

									</select>
								</div>
								<div class="col-md-6 form-group p_star">
									<label>Layanan</label>
									<select class="form-control" name="nama_paket" id="layanan1">

									</select>
								</div>
							</div>
						</div>
						<div class="tampil2" id="tampil2" style="display: none;">
							<div class="row">
								<div class="col-md-12 form-group ">
									<label>Ekspedisi <span class="text-danger">Silahkan pesan gosend/grabsend sendiri agar penitikan lokasi tepat</span></label>
									<select class="form-control" name="nama_ekspedisi2" id="ekspedisi2">
										<option value="Gosend">Gosend</option>
										<option value="Grabsend">Grabsend</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<input type="hidden" id="dua" name="dua" value="<?php echo $totalbelanja ?>">
							<div class="col-md-12 form-group p_star">
								<label>Total Belanja</label>
								<input class="form-control valid mb-3" type="number" readonly required value="<?= $totalbelanja ?>">
							</div>
							<div class="col-md-12 form-group p_star">
								<label>Ongkos Kirim</label>
								<input class="form-control valid mb-3" name="ongkir" value="0" type="number" readonly required id="res">
							</div>
							<div class="col-md-12 form-group p_star">
								<label>Grand Total</label>
								<input class="form-control valid mb-3" id="grandtotal" name="grandtotal" value="<?= $totalbelanja ?>" required readonly type="number">
							</div>
							<input type="hidden" name="totalbelanja" id="totalbelanja" value="<?= $totalbelanja ?>">
							<input type="hidden" name="total_berat" value="1">
							<input type="hidden" name="provinsi">
							<input type="hidden" name="distrik">
							<input type="hidden" name="tipe">
							<input type="hidden" name="kodepos">
							<input type="hidden" name="ekspedisi">
							<input type="hidden" name="paket">
							<input type="hidden" name="ongkir">
							<input type="hidden" name="estimasi">
							<button class="main_btn btn-block" name="checkout">Selesaikan Transaksi</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php
if (isset($_POST["checkout"])) {
	$notransaksi = 'TP' . date("Ymdhis");
	$id = $_SESSION["pengguna"]["id"];
	$tanggalbeli = date("Y-m-d");
	$waktu = date("Y-m-d H:i:s");
	$alamatpengiriman = $_POST["alamatpengiriman"];
	$totalbeli = $totalbelanja;
	$totalberatnya = $_POST["totalberatnya"];
	$ongkir = $_POST["ongkir"];
	$provinsi = $_POST["nama_provinsi"];
	$kota = $_POST["nama_distrik"];
	$metodepembayaran = $_POST['metodepembayaran'];
	if ($metodepembayaran == 'Virtual Account') {
		$ekspedisi = strtoupper($_POST["nama_ekspedisi"]);
		$layanan = $_POST["nama_paket"];
		$koneksi->query(
			"INSERT INTO pembelian(notransaksi,
				id, tanggalbeli, totalbeli, alamatpengiriman, totalberat, ongkir, statusbeli, waktu,kota, provinsi, ekspedisi, layanan, metodepembayaran)
				VALUES('$notransaksi','$id', '$tanggalbeli', '$totalbeli', '$alamatpengiriman','$totalberat','$ongkir', '', '$waktu','$kota','$provinsi','$ekspedisi','$layanan','$metodepembayaran')"
		);
		$idbeli_barusan = $koneksi->insert_id;
		$item_details = array();
		foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) {
			$ambil = $koneksi->query("SELECT*FROM barang WHERE idbarang='$idbarang'");
			$perbarang = $ambil->fetch_assoc();
			$nama = $perbarang['namabarang'];
			$harga = $perbarang['hargabarang'];
			$berat = $perbarang['beratbarang'];

			$subberat = $perbarang['beratbarang'] * $jumlah;
			$subharga = $perbarang['hargabarang'] * $jumlah;
			$koneksi->query("INSERT INTO pembelianproduk (idbeli, idproduk, nama, harga, berat, subberat, subharga, jumlah)
					VALUES ('$idbeli_barusan','$idbarang', '$nama','$harga','$berat', '$subberat', '$subharga','$jumlah')");

			$koneksi->query("UPDATE barang SET stokbarang=stokbarang -$jumlah
					WHERE idbarang='$idbarang'");

			$item_details[] = array('id' => $idbarang, 'price' => $harga, 'quantity' => $jumlah, 'name' => $nama);
		}

		$transaction_details = array(
			'order_id' => $notransaksi,
			'gross_amount' => $totalbeli,
		);
		// Optional

		$billing_address = array(
			'first_name'    => $akun['nama'],
			'last_name'     => "",
			'address'       => $alamatpengiriman,
			'city'          => $kota,
			'postal_code'   => "30118",
			'phone'         => $akun['telepon'],
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $akun['nama'],
			'last_name'     => "",
			'address'       => $alamatpengiriman,
			'city'          => $kota,
			'postal_code'   => "30118",
			'phone'         => $akun['telepon'],
			'country_code'  => 'IDN'
		);
		// Optional
		$customer_details = array(
			'first_name'    => $akun['nama'],
			'last_name'     => "",
			'email'         => $akun['email'],
			'phone'         => $akun['telepon'],
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);
		// Fill transaction details
		$transaction = array(
			'transaction_details' => $transaction_details,
			'customer_details' => $customer_details,
			'item_details' => $item_details,
		);

		$snap_token = '';
		try {
			$snap_token = Snap::getSnapToken($transaction);
		} catch (\Exception $e) {
		}

		$koneksi->query("UPDATE pembelian SET snapkode='$snap_token' WHERE idbeli='$idbeli_barusan'") or die(mysqli_error($koneksi));
	} else {
		$ekspedisi = strtoupper($_POST["nama_ekspedisi2"]);
		$layanan = $_POST["nama_ekspedisi2"];
		$ongkir = 0;
		$koneksi->query(
			"INSERT INTO pembelian(notransaksi,
				id, tanggalbeli, totalbeli, alamatpengiriman, totalberat, ongkir, statusbeli, waktu,kota, provinsi, ekspedisi, layanan, metodepembayaran)
				VALUES('$notransaksi','$id', '$tanggalbeli', '$totalbeli', '$alamatpengiriman','$totalberat','$ongkir', 'Menunggu konfirmasi admin', '$waktu','$kota','$provinsi','$ekspedisi','$layanan','$metodepembayaran')"
		);
		$idbeli_barusan = $koneksi->insert_id;
		$item_details = array();
		foreach ($_SESSION['keranjang'] as $idbarang => $jumlah) {
			$ambil = $koneksi->query("SELECT*FROM barang WHERE idbarang='$idbarang'");
			$perbarang = $ambil->fetch_assoc();
			$nama = $perbarang['namabarang'];
			$harga = $perbarang['hargabarang'];
			$berat = $perbarang['beratbarang'];

			$subberat = $perbarang['beratbarang'] * $jumlah;
			$subharga = $perbarang['hargabarang'] * $jumlah;
			$koneksi->query("INSERT INTO pembelianproduk (idbeli, idproduk, nama, harga, berat, subberat, subharga, jumlah)
					VALUES ('$idbeli_barusan','$idbarang', '$nama','$harga','$berat', '$subberat', '$subharga','$jumlah')");
			$koneksi->query("UPDATE barang SET stokbarang=stokbarang -$jumlah
					WHERE idbarang='$idbarang'");
		}
	}
	unset($_SESSION["keranjang"]);
	echo "<script> alert('Pembelian Sukses');</script>";
	echo "<script> location ='riwayat.php';</script>";
}
?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
<script>
	$(document).ready(function() {
		$.ajax({
			type: 'post',
			url: 'dataprovinsi.php',
			success: function(hasil_provinsi) {
				$("select[name=nama_provinsi]").html(hasil_provinsi);
			}
		});

		$("select[name=nama_provinsi]").on("change", function() {
			var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
			$.ajax({
				type: 'post',
				url: 'datadistrik.php',
				data: 'id_provinsi=' + id_provinsi_terpilih,
				success: function(hasil_distrik) {
					$("select[name=nama_distrik]").html(hasil_distrik);
				}
			});
		});
		$.ajax({
			type: 'post',
			url: 'dataekspedisi.php',
			success: function(hasil_ekspedisi) {
				$("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
			}
		});

		$("select[name=nama_ekspedisi]").on("change", function() {
			//dapetin data ongkir

			//dapetin ekspedisi terpilih
			var ekpedisi_terpilih = $("select[name=nama_ekspedisi]").val();
			//dapetin id_distrik yg dipilih pengguna
			var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
			//dapetin total berat dari inputan
			var total_berat = $("input[name=total_berat]").val();
			$.ajax({
				type: 'post',
				url: 'datapaket.php',
				data: 'ekspedisi=' + ekpedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + total_berat,
				success: function(hasil_paket) {
					console.log(hasil_paket);
					$("select[name=nama_paket]").html(hasil_paket);

					//taro ekspedisi terpilih di inputan ekspedisi
					$("input[name=ekspedisi]").val(ekpedisi_terpilih);
				}
			})
		});
		$("select[name=nama_distrik]").on("change", function() {
			var prov = $("option:selected", this).attr("nama_provinsi");
			var dist = $("option:selected", this).attr("nama_distrik");
			var tipe = $("option:selected", this).attr("tipe_distrik");
			var kodepos = $("option:selected", this).attr("kodepos");

			$("input[name=provinsi]").val(prov);
			$("input[name=distrik]").val(dist);
			$("input[name=tipe]").val(tipe);
			$("input[name=kodepos]").val(kodepos);
		});
		$("select[name=nama_paket]").on("change", function() {
			var paket = $("option:selected", this).attr("paket");
			var ongkir = $("option:selected", this).attr("ongkir");
			var etd = $("option:selected", this).attr("etd");

			$("input[name=paket]").val(paket);
			$("input[name=ongkir]").val(ongkir);
			$("input[name=estimasi]").val(etd);
			var num2 = document.getElementById("totalbelanja").value;
			result = parseInt(ongkir) + parseInt(num2);
			document.getElementById("grandtotal").value = result;
		})
	});
</script>
<script>
	function handlemetodepembayaran() {
		var metodepembayaran = document.getElementById("metodepembayaran").value;
		var tampilDiv = document.getElementById("tampil");
		var tampilDiv2 = document.getElementById("tampil2");

		if (metodepembayaran == "COD") {
			tampilDiv.style.display = "none";
			tampilDiv2.style.display = "block";
			document.getElementById("ekspedisi1").removeAttribute("required");
			document.getElementById("layanan1").removeAttribute("required");
			document.getElementById("ekspedisi2").setAttribute("required", true);
		} else if (metodepembayaran == "Virtual Account") {
			tampilDiv.style.display = "block";
			tampilDiv2.style.display = "none";
			document.getElementById("ekspedisi1").setAttribute("required", true);
			document.getElementById("layanan1").setAttribute("required", true);
			document.getElementById("ekspedisi2").removeAttribute("required");
		} else {
			tampilDiv.style.display = "none";
			tampilDiv2.style.display = "none";
			document.getElementById("ekspedisi1").removeAttribute("required");
			document.getElementById("layanan1").removeAttribute("required");
			document.getElementById("ekspedisi2").removeAttribute("required");
			// document.getElementById("prov").setAttribute("required", true);
			// document.getElementById("kota").setAttribute("required", true);
			// document.getElementById("Virtual Account").setAttribute("required", true);
			// document.getElementById("layanan").setAttribute("required", true);
			// document.getElementById("ongkir").setAttribute("required", true);

		}
	}
</script>
<?php
include 'footer.php';
?>