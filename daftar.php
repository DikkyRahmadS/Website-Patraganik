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
					<h2 class="text-black">Daftar</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-black">Home</a>
					<a href="daftar.php" class="text-black">Daftar</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section_gap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="contact-title">Daftar Akun</h2>
			</div>
			<div class="col-lg-12 mb-4 mb-lg-0">
				<form class="form-contact contact_form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control" name="nama" id="nama" type="text" placeholder="Masukkan Nama">
							</div>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control" name="fotoprofil">
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" name="email" type="text" placeholder="Masukkan Email">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" name="password" type="text" placeholder="Masukkan Password">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>No. Telepon</label>
								<input class="form-control" name="telepon" type="number" placeholder="Masukkan No. Telepon">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control w-100" name="alamat" cols="30" rows="9" placeholder="Masukkan Alamat"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group mt-lg-3">
						<button type="submit" name="daftar" class="main_btn float-right">Daftar</button>
					</div>
				</form>


			</div>

		</div>
	</div>
</section>
<?php
if (isset($_POST["daftar"])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$namafoto = $_FILES['fotoprofil']['name'];
	$lokasifoto = $_FILES['fotoprofil']['tmp_name'];

	if (!empty($lokasifoto)) {
		// Check the file size (in bytes)
		$maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
		if ($_FILES['fotoprofil']['size'] <= $maxFileSize) {
			move_uploaded_file($lokasifoto, "foto/$namafoto");
			$ambil = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
			$yangcocok = $ambil->num_rows;
			if ($yangcocok == 1) {
				echo "<script>alert('Pendaftaran Gagal, email sudah ada')</script>";
				echo "<script>location='daftar.php';</script>";
			} else {
				$koneksi->query("INSERT INTO pengguna (nama, email, password, alamat, telepon, fotoprofil, level)
                                    VALUES ('$nama','$email','$password','$alamat','$telepon','$namafoto','Pelanggan')");
				echo "<script>alert('Pendaftaran Berhasil')</script>";
				echo "<script>location='login.php';</script>";
			}
		} else {
			echo "<script>alert('Ukuran foto harus kurang dari 2MB.');</script>";
		}
	} else {
		echo "<script>alert('Anda belum memilih foto.');</script>";
	}
}
?>
<?php
include 'footer.php';
?>