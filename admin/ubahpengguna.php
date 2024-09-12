<?php
$ambil = $koneksi->query("SELECT * FROM pengguna");
$pecah = $ambil->fetch_assoc();
$id = $pecah['id'];
?>
<main class="app-content">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-4 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">My Profile</h4>
                <p class="card-description text-center">
                  <img src="assets_admin/docs/<?= $pecah['fotoprofil']; ?>" style="border:3px solid black;width: 200px;height: 200px;border-radius: 7px;" />

                </p>

                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="<?= $pecah['nama'] ?>">
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
                    <input type="text" name="password" class="form-control">

                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <input id="file" type="file" name="fotoprofil" class="form-control">
                  </div>

                  <button type="submit" name="ubah" class="btn btn-info mr-2">Update</button>
                  <a href="javascript:history.back()" class="btn btn-light">Batal</a>
                </form>

                <?php
                if (isset($_POST['ubah'])) {
                  $pass = $pecah['password'];
                  $password2 = sha1($_POST['password']);

                  $namafoto = $_FILES['fotoprofil']['name'];
                  $lokasifoto = $_FILES['fotoprofil']['tmp_name'];
                  $ukuranFoto = $_FILES['fotoprofil']['size']; // Get the file size in bytes

                  if (!empty($lokasifoto)) {
                    $maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
                    if ($ukuranFoto <= $maxFileSize) {
                      move_uploaded_file($lokasifoto, "assets_admin/docs/$namafoto");
                      $koneksi->query("UPDATE pengguna SET nama='$_POST[nama]',email='$_POST[email]',alamat='$_POST[alamat]', telepon='$_POST[telepon]', fotoprofil='$namafoto', password='$password2' WHERE id='$id'");

                      echo "<script>alert('Profil di perbarui');</script>";
                      echo "<script>location='index.php?halaman=beranda';</script>";
                    } else {
                      echo "<script>alert('Ukuran foto harus kurang dari 2MB.');</script>";
                    }
                  } else {
                    $koneksi->query("UPDATE pengguna SET nama='$_POST[nama]',email='$_POST[email]',alamat='$_POST[alamat]', telepon='$_POST[telepon]', password='$password2' WHERE id='$id'");

                    echo "<script>alert('Profil di perbarui');</script>";
                    echo "<script>location='index.php?halaman=beranda';</script>";
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>