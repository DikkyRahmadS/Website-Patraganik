-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2023 pada 08.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patraganik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `id_kategori` text NOT NULL,
  `namabarang` text NOT NULL,
  `keyword` text NOT NULL,
  `hargabarang` text NOT NULL,
  `beratbarang` text NOT NULL,
  `stokbarang` text NOT NULL,
  `fotobarang` text NOT NULL,
  `deskripsibarang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `id_kategori`, `namabarang`, `keyword`, `hargabarang`, `beratbarang`, `stokbarang`, `fotobarang`, `deskripsibarang`) VALUES
(4, '11', 'Pupuk Silika Silica Karbon SiCarbon+ Si Carbon', 'pupuk', '50000', '1', '10', 'rug-1679375540381-1.jpeg-510x510.jpg', 'keunggulan Pupuk Silika Karbon (SiCarbon+) : Membantu meningkatkan ketahanan tanaman terhadap berbagai tekanan lingkungan, seperti serangan hama dan penyakit, kekeringan, serta suhu ekstrem. Pupuk ini dapat merangsang pertumbuhan akar dan meningkatkan serapan nutrisi oleh tanaman. Mendukung kualitas hasil panen. Ekologis dan ramah lingkungan. Cocok untuk berbagai tanaman'),
(14, '16', 'Benih Bibit Biji Bunga Herba ', 'bibit', '20000', '1', '32', 'rug-1620025065250-0.jpeg-510x510.jpg', 'Berikut adalah beberapa keunggulan Benih Bibit Biji Bunga Herba:\r\nBenih bibit bunga herba menawarkan beragam pilihan jenis dan varietas bunga. \r\nMudah tumbuh\r\nPeningkatan kualitas tanah\r\nTanaman penutup tanah\r\nBunga dengan manfaat kesehatan'),
(30, '16', 'Benih Bibit Semangka Biji ', 'bibit', '60000', '1', '85', 'rug-1654242841266-1.jpeg-510x510.jpg', 'Varian Semangka Unggul, Benih bibit semangka biji yang kami tawarkan dipilih secara khusus dari varian unggul dengan kualitas terbaik. \r\nPotensi Hasil Melimpah, Benih bibit semangka biji ini memiliki potensi hasil melimpah dengan buah-buah besar dan manis.\r\nPertumbuhan yang Kuat, Bibit semangka biji kami telah diolah dan diawetkan dengan metode terbaik untuk memastikan pertumbuhan yang kuat dan tahan terhadap berbagai kondisi lingkungan. \r\nDaya Tahan Terhadap Penyakit, Bibit semangka biji ini telah dipilih karena ketahanannya terhadap penyakit dan hama. '),
(31, '17', 'Tanaman Krisan Aster Merah', 'tanaman', '150000', '1', '43', 'Tanaman-krisan-merah.jpg', 'Keindahan Varian Krisan Merah, Tanaman Krisan Aster Merah adalah varian Krisan yang menonjolkan warna merah yang cerah dan menawan. Bunga-bunga mungilnya membentuk kelopak- kelopak dengan tampilan yang unik dan menarik. Keindahan warna merahnya akan menjadi sorotan di mana pun tanaman ini ditempatkan.\r\nBunga Tahan Lama, Bunga Krisan Aster Merah terkenal karena daya tahan mereka yang luar biasa. \r\nPertumbuhan Mudah, Tanaman Krisan Aster Merah relatif mudah untuk ditanam dan dirawat. Mereka tidak memerlukan perawatan yang rumit dan cocok untuk para pecinta tanaman pemula. Panduan perawatan sederhana juga dapat disertakan untuk membantu pelanggan Anda dalam merawat tanaman dengan baik.'),
(32, '17', 'Tanaman Krisan Mini White', 'tanaman', '300000', '1', '32', 'Tanaman-Bunga-Krisan-Mini-White.jpg', 'Keindahan Bunga Mungil Berwarna Putih: Tanaman Krisan Mini White memiliki bunga-bunga mungil yang memukau dengan warna putih yang menakjubkan. Bunga putihnya memberikan kesan keanggunan dan kesederhanaan yang sempurna untuk dekorasi interior, hadiah istimewa, atau pernikahan.\r\n\r\nUkuran Ideal untuk Dekorasi: Tanaman Krisan Mini White adalah pilihan ideal untuk dekorasi karena ukurannya yang mungil dan kompak. Tanaman ini cocok untuk ditempatkan di atas meja, rak, atau di sudut ruangan yang membutuhkan sentuhan segar.\r\n\r\nTumbuh dengan Mudah: Krisan Mini White adalah tanaman yang mudah tumbuh dan dirawat, cocok untuk pemula maupun para pecinta tanaman berpengalaman. Dengan memberikan perawatan dasar yang tepat, tanaman ini akan tetap indah dan berbunga selama berbulan-bulan.'),
(34, '17', 'Tanaman Alpukat Hass', 'tanaman', '230000', '2', '51', 'tanaman-alpukat-hass2-510x680.jpg', '\r\nBuah Bergizi Tinggi: Buah alpukat Hass kaya akan nutrisi penting seperti lemak sehat, serat, vitamin E, kalium, dan antioksidan.\r\nTanaman Alpukat Hass adalah tanaman produktif yang dapat memberikan hasil panen yang melimpah jika dirawat dengan baik. Anda dapat menikmati buah-buahan yang lezat dan bergizi dari pohon alpukat sendiri.\r\nSetiap pembelian tanaman Alpukat Hass akan disertai dengan panduan perawatan lengkap yang mudah diikuti. Panduan ini akan membantu pelanggan Anda dalam merawat tanaman dengan benar dan memastikan pertumbuhannya yang sehat.\r\nTanaman Alpukat Hass akan dikemas dengan hati-hati untuk memastikan bahwa mereka tiba di lokasi pelanggan dalam kondisi prima. Kemasan ini akan melindungi tanaman selama pengiriman dan distribusi.'),
(35, '17', 'Tanaman Samber Lilin (Persian Shield)', 'tanaman', '318000', '1', '34', 'samber-lilin-510x456.jpg', 'Tanaman Hias Indoor Maupun Outdoor: Samber Lilin (Persian Shield) adalah tanaman hias yang serbaguna, cocok untuk ditanam di dalam ruangan atau di luar ruangan, tergantung pada preferensi dan kondisi iklim. \r\nPerawatannya relatif mudah, dan tanaman ini cenderung tumbuh subur jika diberikan sinar matahari cukup dan penyiraman yang tepat.\r\nTanaman Samber Lilin (Persian Shield) memberikan nilai dekoratif yang tinggi untuk taman, teras, atau ruangan di dalam rumah. Tampilan daunnya yang mencolok dan eksotis akan menambah keindahan dan gaya pada lingkungan sekitarnya.\r\nSetiap tanaman Samber Lilin (Persian Shield) akan dikemas dengan hati-hati untuk memastikan tiba di lokasi pelanggan dalam kondisi prima. Kemasan yang aman akan melindungi tanaman selama pengiriman dan distribusi.'),
(41, '11', 'Kompos Pupuk Murni Organik ', 'pupuk', '10000', '1', '30', 'pupuk kompos.jpg', 'Keunggulan Pupuk Kompos Organik: Bisa digunakan sebagai media tanam langsung Bisa digunakan sebagai campuran media lainnya Cocok digunakan untuk semua jenis tanaman Murni menggunakan pupuk kandang kohe halus Harga terjangkau dengan kualitas diatas rata-rata'),
(42, '11', 'Pupuk Kandang', 'pupuk', '5000', '1', '50', 'pupuk kandang.jpg', 'keunggulan pupuk kandang : Pupuk organik yang dapat memperbaiki struktur tanah dan meningkatkan kesuburan tanah. Ramah lingkungan. Meningkatkan struktur tanah. Cocok untuk berbagai jenis tanaman'),
(43, '11', 'Guano / Pupuk Organik Guano', 'pupuk guano', '25000', '1', '50', 'pupuk guano.jpg', 'Keunggulan Pupuk Guano / Pupuk Organik Guano: tipe pupuk yang Cepat diserap oleh tanaman. Meningkatkan kesuburan tanah. Ramah lingkungan'),
(44, '11', 'Pupuk organik/kompos murni 5kg', 'pupuk', '20000', '5', '29', 'pupuk kompos 2.jpg', 'Berikut adalah beberapa keunggulan pupuk kompos:  Meningkatkan kesuburan tanah. Ramah lingkungan. Meningkatkan struktur tanah'),
(45, '17', 'Adenium bunga tumpuk grafting', 'tanaman', '125000', '3', '29', 'adenium.jpg', 'Tanaman Adenium ini ditanam dengan menggunakan teknik grafting, di mana varietas unggul dari Adenium dipotong dan digabungkan dengan batang tanaman yang lebih tua. Hasilnya adalah bunga tumpuk yang indah dan estetis yang tidak ditemukan pada adenium biasa.\r\nAdenium Bunga Tumpuk Grafting dapat ditempatkan di dalam ruangan untuk memberikan dekorasi yang eksotis atau ditanam di luar ruangan sebagai hiasan taman yang menarik. Tanaman ini cocok untuk daerah dengan iklim hangat dan sinar matahari yang cukup.\r\nAdenium Bunga Tumpuk Grafting relatif mudah dalam perawatannya. Panduan perawatan yang lengkap akan disertakan untuk membantu pelanggan Anda merawat tanaman ini dengan baik.\r\nAdenium Bunga Tumpuk Grafting memberikan nilai dekoratif yang tinggi dengan bunga-bunga tumpuk yang mencolok dan unik.'),
(46, '17', 'Bonsai Ulmus', 'tanaman', '250000', '7', '8', 'bonsai humus.jpg', 'Bonsai Humus membantu meningkatkan struktur tanah dengan menambahkan bahan organik ke dalam media tanam.\r\nMemiliki kemampuan yang baik untuk menahan air, sehingga membantu menjaga kelembaban tanah yang tepat untuk tanaman bonsai. \r\nPengemasan Praktis Bonsai Humus akan dikemas dengan hati-hati untuk memastikan kualitasnya tetap terjaga selama pengiriman.\r\n'),
(47, '17', 'tanaman beringin', 'tanaman', '50000', '2', '10', 'bonsai.jpg', 'bonsai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, '   Pupuk'),
(16, ' Bibit'),
(17, '  Tanaman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idbeli` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `id` int(11) NOT NULL,
  `tanggalbeli` date NOT NULL,
  `totalbeli` text NOT NULL DEFAULT '\'\\\'belum bayar\\\'\'',
  `alamatpengiriman` text NOT NULL,
  `metodepembayaran` varchar(255) NOT NULL,
  `totalberat` varchar(255) NOT NULL,
  `kota` text NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `ekspedisi` varchar(200) NOT NULL,
  `layanan` varchar(200) NOT NULL,
  `ongkir` text NOT NULL,
  `statusbeli` text NOT NULL,
  `waktu` datetime NOT NULL,
  `snapkode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idbeli`, `notransaksi`, `id`, `tanggalbeli`, `totalbeli`, `alamatpengiriman`, `metodepembayaran`, `totalberat`, `kota`, `provinsi`, `ekspedisi`, `layanan`, `ongkir`, `statusbeli`, `waktu`, `snapkode`) VALUES
(3, 'TP20230721013615', 23, '2023-07-21', '100000', 'palembang', 'COD', '1', 'Jakarta Pusat', 'DKI Jakarta', 'GOSEND', 'Gosend', '0', 'Selesai', '2023-07-21 13:36:15', ''),
(5, 'TP20230726115651', 23, '2023-07-26', '250000', 'jl selatan', 'Virtual Account', '7', 'Cilegon', 'Banten', 'JNE', 'OKE 20,000 2-3', '20000', 'capture', '2023-07-26 11:56:51', '3fe51187-a3fc-492f-a080-3bb5c8c87e00'),
(6, 'TP20230726115929', 23, '2023-07-26', '250000', 'selatan', 'Virtual Account', '7', 'Asmat', 'Papua', 'JNE', 'REG 177,000 10+', '177000', 'capture', '2023-07-26 11:59:29', 'c24391a1-4cb5-43cf-a70b-6c2e9b7ec1d4'),
(7, 'TP20230727123612', 23, '2023-07-27', '125000', 'jl selatan', 'COD', '3', 'Bengkulu', 'Bengkulu', 'GRABSEND', 'Grabsend', '0', 'Selesai', '2023-07-27 00:36:12', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelianproduk`
--

CREATE TABLE `pembelianproduk` (
  `idbeli_produk` int(11) NOT NULL,
  `idbeli` text NOT NULL,
  `idproduk` text NOT NULL,
  `nama` text NOT NULL,
  `harga` text NOT NULL,
  `berat` text NOT NULL,
  `subberat` text NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelianproduk`
--

INSERT INTO `pembelianproduk` (`idbeli_produk`, `idbeli`, `idproduk`, `nama`, `harga`, `berat`, `subberat`, `subharga`, `jumlah`) VALUES
(1, '1', '35', 'Tanaman Samber Lilin (Persian Shield)', '318000', '1', '1', '318000', '1'),
(2, '1', '34', 'Tanaman Alpukat Hass', '230000', '2', '2', '230000', '1'),
(3, '2', '30', 'Benih Bibit Semangka Biji ', '60000', '1', '1', '60000', '1'),
(4, '2', '8', 'Pupuk SK Cote Precise 19-10-13+2.5MgO+TE  Merah Slow Release', '160000', '2', '2', '160000', '1'),
(5, '2', '28', 'Benih Bibit Bunga Zinnia ', '12000', '1', '1', '12000', '1'),
(6, '3', '29', 'Benih Bibit Bunga Larkspur', '100000', '1', '1', '100000', '1'),
(7, '4', '44', 'Pupuk organik/kompos murni 5kg', '20000', '5', '5', '20000', '1'),
(8, '5', '46', 'Bonsai Ulmus', '250000', '7', '7', '250000', '1'),
(9, '6', '46', 'Bonsai Ulmus', '250000', '7', '7', '250000', '1'),
(10, '7', '45', 'Adenium bunga tumpuk grafting', '125000', '3', '3', '125000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `fotoprofil` varchar(255) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '0812345678', 'Palembang', 'alfiah.jpg', 'Admin'),
(20, 'Asyfa', 'asyfaariliani@gmail.com', 'Asyfa', '082318296475', 'Riau', 'Untitled.png', 'Pelanggan'),
(23, 'Intan', 'intan@gmail.com', 'intan', '089418295812', 'Jl. Palembang', 'Untitled.png', 'Pelanggan'),
(24, 'alfiah', 'alfiah@gmail.com', 'alfiah', '89654242784', 'jl. selatan', 'Untitled.png', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idbeli`);

--
-- Indeks untuk tabel `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  ADD PRIMARY KEY (`idbeli_produk`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  MODIFY `idbeli_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
