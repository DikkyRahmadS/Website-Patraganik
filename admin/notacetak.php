<?php
function rupiah($angka)
{
    $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilrupiah;
}
include('../koneksi.php');
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM pembelian JOIN pengguna
ON pembelian.id=pengguna.id
WHERE pembelian.idbeli='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<html>

<head>
    <title>Cetak Resi Nota</title>
    <style>
        @page {
            margin: 3mm;
        }
    </style>
    <style>
        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;padding-top:50px'>
    <table style='width:660; font-size:16pt; font-family:calibri; border-collapse: collapspe;' border='0'>
        <tr>
            <td style="padding-left:80px"><img src="../foto/lgbr.png" style="width: 40px; height: 40px; margin-right: 15px; margin-top: -12px;">
            <td>
            <span style="font-size:28pt"><b>Nota Pesanan<b></span>
                <right>
                <td style="width:150px">
                    <span style="font-size:12pt">No. Nota</span>
                    <span style="font-size:12pt"> : <?= $pecah['notransaksi'] ?></span>
                </td>
                </right>
            </td>
        </tr>
    </table>
    <hr style="border-top: 1px solid black;width:660">
    <center>
        <table style='width:660; font-size:16pt; font-family:calibri; border-collapse: turunbawah;' border='0'>
            <tr>
                <td style="width:660px">
                <span style="font-size:12pt">Nama Pembeli : <br>
                <?= $pecah['nama'] ?></span>    
                </td>
                <right>
                <td style="width:150px">
                <span style="font-size:12pt">Penjual :<br>
                Patraganik III<br></br>
                </span>
                </td>
                </right>
            </tr>
            <tr>
                <td style="width:500px">
                <span style="font-size:12pt">Alamat Pembeli : <br>
                <?= $pecah['alamat'] ?>, <?php echo $pecah['kota']; ?>, <?php echo $pecah['provinsi']; ?></br>    
                </td>
                <right>
                <td style="width:150px">
                <span style="font-size:12pt">Alamat Penjual :<br>
                JL. Pulau Layang, Sungai Pinang, Kec. Plaju, Kab. Banyuasin, Sumatera Selatan 30967</br>
                </span>
                </td>
                </right>
            <tr>
            <tr>
                <td style="width:660px">
                <span style="font-size:12pt">No. HP : <br>
                <?= $pecah['telepon'] ?></br>
                </td>
            </tr>
    </table>
    <br>
    <table style='width:660; font-size:16pt; font-family:calibri; border-collapse: turunbawah;' border='0'>  
    <tr>
        <td>
        <span style="font-size:12pt">Tanggal Pemesanan:<br>
        <?= tanggal(date('Y-m-d', strtotime($pecah['tanggalbeli']))) ?><br>
        </span>
        <td>
        <span style="font-size:11pt">Metode Pembayaran : <br>
        <?= $pecah['metodepembayaran'] ?><br>
        </span>
        <right>
        <td style="width:150px">
        <span style="font-size:11pt">Jasa Kirim<br>
        <?= $pecah['ekspedisi'] ?></br>
        </span>
        </td>
        </right>
        </td>
    </tr>
        <tr>
           
                 
        </table>
        <br>
        <table cellspacing='0' cellpadding='0' style='width:660; font-size:12pt; font-family:calibri; border-collapse: turunbawah;' border='1'>
            <thead>
                <tr>
                    <th style="padding:5px;margin:5px">No</th>
                    <th width="40%">Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambildetail = $koneksi->query("SELECT * FROM pembelianproduk WHERE idbeli='$_GET[id]'"); ?>
                <?php while ($detail = $ambildetail->fetch_assoc()) { ?>
                    <tr>
                        <td align="center"><?php echo $nomor; ?></td>
                        <td align="center"><?php echo $detail['nama']; ?></td>
                        <td align="center">Rp. <?php echo rupiah($detail['harga']); ?></td>
                        <td align="center"><?php echo $detail['jumlah']; ?></td>
                        <td style="padding:5px;margin:5px"><?php echo rupiah($detail['subharga']); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
                <tr>
                    <td colspan="4" style="text-align:right">Total Harga : &nbsp;</b></em></td>
                    <td class="text-hijau" style="padding:5px;margin:5px"><?php echo rupiah($pecah['totalbeli']) ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right">Ongkir : &nbsp;</b></em></td>
                    <td class="text-hijau" style="padding:5px;margin:5px"><?php echo rupiah($pecah['ongkir']) ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right">Grand Total : &nbsp;</b></em></td>
                    <td class="text-hijau" style="padding:5px;margin:5px"><?php echo rupiah($pecah['totalbeli'] + $pecah['ongkir']) ?></td>
                </tr>
            </tbody>
        </table>
        
    </center>
</body>

</html>
<script>
    window.print();
</script>