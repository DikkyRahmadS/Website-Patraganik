<?php
$kategori = $koneksi->query("SELECT * FROM kategori");
$jumlahkategori = $kategori->num_rows;

$barang = $koneksi->query("SELECT * FROM barang");
$jumlahbarang = $barang->num_rows;

$member = $koneksi->query("SELECT * FROM pengguna where level = 'Pelanggan'");
$jumlahmember = $member->num_rows;

$pembelian = $koneksi->query("SELECT * FROM pembelian");
$jumlahpembelian = $pembelian->num_rows;
?>
<main class="app-content">
    <div class="app-title" style="background-color: #4feb34;">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>Patraganik III</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Akun Member</h4>
                    <p><b><?php echo $jumlahmember ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Produk</h4>
                    <p><b><?php echo $jumlahbarang ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Pembelian</h4>
                    <p><b><?php echo $jumlahpembelian ?></b></p>
                </div>
            </div>
        </div>
    </div>
</main>