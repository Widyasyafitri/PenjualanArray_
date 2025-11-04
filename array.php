<?php
// penjualanArray.php

// Daftar Produk
$produk = [
    ["kode" => "P001", "nama" => "Sprite", "harga" => 10000],
    ["kode" => "P002", "nama" => "CocaCola B", "harga" => 8000],
    ["kode" => "P003", "nama" => "Fanta", "harga" => 7000],
    ["kode" => "P004", "nama" => "Golda", "harga" => 4000],
    ["kode" => "P005", "nama" => "Aqua", "harga" => 5000],
];

// Cetak header (tebal dan besar)                                                                                                                                                                       
echo "<h2><b>--POLGAN MART--</b></h2>";
echo "Daftar Pembelian<br><br>";
?>

<?php
// Inisialisasi variabel
$beli = [];
$jumlah = [];

// Acak jumlah pembelian
for ($i = 0; $i < 5; $i++) {
    $randomProductIndex = rand(0, count($produk) - 1);
    $randomQuantity = rand(1, 10);
    
    $beli[] = $produk[$randomProductIndex]['kode'];
    $jumlah[] = $randomQuantity;
}
?>

