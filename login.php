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
					<h2 class="text-black">Login</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-black">Home</a>
					<a href="login.php" class="text-black">Login</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section_gap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="contact-title">Login Akun</h2>
			</div>
			<div class="col-lg-12 mb-4 mb-lg-0">
				<form class="form-contact contact_form" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" name="email" id="name" type="email" placeholder="Masukkan Email">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" name="password" type="password" placeholder="Masukkan Password">
							</div>
						</div>
					</div>
					<div class="form-group mt-lg-3">
						<button type="submit" name="simpan" class="main_btn float-right">Login</button>
					</div>
				</form>


			</div>

		</div>
	</div>
</section>
<?php
if (isset($_POST["simpan"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM pengguna
		WHERE email='$email' AND password='$password' limit 1");
	$akunyangcocok = $ambil->num_rows;
	if ($akunyangcocok == 1) {
		$akun = $ambil->fetch_assoc();
		if ($akun['level'] == "Pelanggan") {
			$_SESSION["pengguna"] = $akun;
			echo "<script> alert('Anda sukses login');</script>";
			echo "<script> location ='index.php';</script>";
		} elseif ($akun['level'] == "Admin") {
			$_SESSION['admin'] = $akun;
			echo "<script> alert('Anda sukses login');</script>";
			echo "<script> location ='admin/index.php';</script>";
		}
	} else {
		echo "<script> alert('Anda gagal login, Cek akun anda');</script>";
		echo "<script> location ='login.php';</script>";
	}
}
?>
<?php
include 'footer.php';
?>