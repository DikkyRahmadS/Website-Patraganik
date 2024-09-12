<?php
session_start();
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pengguna ");
$pecah = $ambil->fetch_assoc();
$id = $pecah['id'];
?>
<?php include 'header.php'; ?>

<section class="banner_area">
	<div class="banner_inner d-flex align-items-center" style="background-image: url('assets_home/img/header.jpg');">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-black">Akun</h2>
				</div>
				<div class="page_link">
					<a href="index.php" class="text-black">Home</a>
					<a href="ubahpelanggan.php" class="text-black">Akun</a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section_gap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="contact-title">My Profile </h2>
			</div>
			<div class="form-group">
				<img src="foto/<?php echo $pecah['fotoprofil']; ?>" width="200">
			</div>
			<div class="col-lg-12">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama']; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="<?= $pecah['email'] ?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?= $pecah['alamat'] ?>">
					</div>
					<div class="form-group">
						<label>No.telpon</label>
						<input type="text" class="form-control" name="telepon" value="<?= $pecah['telepon'] ?>">
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input type="text" name="password" class="form-control" >
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Ganti Foto</label>
						<input type="file" class="form-control" name="foto" >
					</div>

					<button class="btn btn-primary float-right btn-round mt-2" name="ubah">Simpan</button>
				</form>
				<?php
				if (isset($_POST['ubah'])) {
					$pass = $pecah['password'];
					$password2 = sha1($_POST['password']);

					$namafoto = $_FILES['foto']['name'];
					$lokasifoto = $_FILES['foto']['tmp_name'];

					if (!empty($lokasifoto)) {
						$maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
						if ($_FILES['foto']['size'] <= $maxFileSize) {
							move_uploaded_file($lokasifoto, "foto/$namafoto");
							$koneksi->query("UPDATE pengguna SET nama='$_POST[nama]',email='$_POST[email]',alamat='$_POST[alamat]', telepon='$_POST[telepon]',  fotoprofil = '$namafoto',  password='$password2' WHERE id='$id'");

							echo "<script>alert('Profil di perbarui');</script>";
							echo "<script>location='index.php?halaman=pengguna';</script>";
						} else {
							echo "<script>alert('Ukuran foto harus kurang dari 2MB.');</script>";
						}
					} else {
						$koneksi->query("UPDATE pengguna SET nama='$_POST[nama]',email='$_POST[email]',alamat='$_POST[alamat]', telepon='$_POST[telepon]',  password='$password2' WHERE id='$id'");

						echo "<script>alert('Profil di perbarui');</script>";
						echo "<script>location='index.php?halaman=pengguna';</script>";
					}
				}

				?>
			</div>
		</div>
	</div>
	</div>
	</div>
	</main>