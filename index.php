<?php
session_start();
include 'koneksi.php';
?>

<?php include 'header.php'; ?>
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row ">
                <div class="col-lg-12 ">
                    <p class="sub text-center">SELAMAT DATANG DI WEBSITE</p>
                    <h3 class="text-center"><span>Patraganik </span> III <br /></h3>
                    <center>
                        <a class="main_btn mt-40" href="login.php">Login</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-area section_gap_bottom_custom">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-truck"></i>
                        <h3> Pengiriman Luar Kota</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-money"></i>
                        <h3>100% Harga Terjangkau</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-blockchain"></i>
                        <h3>Pembayaran Aman</h3>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="flaticon-support"></i>
                        <h3>Layanan Call Center</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Produk Kami</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $ambil = $koneksi->query("SELECT *FROM barang LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori order by idbarang desc limit 2"); ?>
            <?php while ($perbarang = $ambil->fetch_assoc()) { ?>
                <div class="col-lg-6 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" style="height:300px;object-fit:cover" src="foto/<?php echo $perbarang['fotobarang'] ?>" alt="" />
                        </div>
                        <div class="product-btm">
                            <a href="detail.php?id=<?php echo $perbarang['idbarang']; ?>" class="d-block">
                                <h4><?php echo $perbarang['namabarang'] ?></h4>
                            </a>
                            <div class="mt-3">
                                <span class="mr-4">Rp <?php echo number_format($perbarang['hargabarang']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<br><br><br>

<?php
include 'footer.php';
?>