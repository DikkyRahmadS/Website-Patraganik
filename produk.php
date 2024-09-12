<?php
session_start();
include 'koneksi.php';
include 'header.php';
$ambil = $koneksi->query("SELECT *FROM barang LEFT JOIN kategori ON barang.id_kategori=kategori.id_kategori order by idbarang desc");
if (!empty($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
} else {
    $keyword = "";
}
?>

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center" style="background-image: url('assets_home/img/header.jpg');">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2 class="text-black">Produk</h2>
                </div>
                <div class="page_link">
                    <a href="index.php" class="text-black">Home</a>
                    <a href="produk.php" class="text-black">Produk</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">

                <div class="latest_product_inner">
                    <div class="row">
                        <?php while ($perbarang = $ambil->fetch_assoc()) { ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="card-img" src="foto/<?php echo $perbarang['fotobarang'] ?>" style="height:200px;width:75%" alt="" />
                                    </div>
                                    <div class="product-btm">
                                        <a href="detail.php?id=<?php echo $perbarang['idbarang']; ?>" class="d-block">
                                            <h4><?php echo $perbarang['namabarang'] ?></h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">Rp <?php echo number_format($perbarang['hargabarang']) ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<?php
include 'footer.php';
?>