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
                    <h2 class="text-black">Tentang Kami</h2>
                </div>
                <div class="page_link">
                    <a href="index.php" class="text-black">Home</a>
                    <a href="tentangkami.php" class="text-black">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section_gap">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15937.269968054425!2d104.81963097675997!3d-3.0090196649376693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9df037797147%3A0x3b66a6d58f3d100!2sDPPU%20Pulau%20Layang!5e0!3m2!1sid!2sid!4v1685521350269!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


            </div>

            <div class="col-lg-4">
                <div class="media contact-info">
                <p>Patraganik III adalah salah satu program binaan CSR Pertamina RU III yang
merupakan kawasan pengelolaan sampah terpadu yang telah berkontribusi dalam
konservasi lingkungan hidup, khususnya dalam pengelolaan sampah di Kota
Palembang.
Sampah yang diolah kemudian dijadikan pupuk organik dengan tiga jenis produk,
yaitu pupuk cair, pupuk curah, dan pupuk granula, yang dipasarkan melalui outlet
penjualan Patraganik III dan kerja sama dengan berbagai instansi seperti Dinas
Kebersihan dan Tata Kota Palembang.</p>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>JL. Pulau Layang, Sungai Pinang, Kec. Plaju, Kab. Banyuasin.</h3>
                        <p>Sumatera Selatan 30967</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654"> 0852 7975 2323</a></h3>
                    </div>
                </div>
                <br>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@colorlib.com">Patraganik.III.plaju@gmail.com</a></h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>