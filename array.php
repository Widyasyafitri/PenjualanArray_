<?php
// penjualanArray.php
// menambahkan code barang

// Daftar Produk
$produk = [
    ["kode" => "P001", "nama" => "Sprite", "harga" => 10000],
    ["kode" => "P002", "nama" => "CocaCola B", "harga" => 8000],
    ["kode" => "P003", "nama" => "Fanta", "harga" => 7000],
    ["kode" => "P004", "nama" => "Golda", "harga" => 4000],
    ["kode" => "P005", "nama" => "Aqua", "harga" => 5000],
];

// Cetak header
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

<?php
// Inisialisasi total belanja
$grandtotal = 0; 

// Tampilkan daftar pembelian
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Total Harga</th>
      </tr>";

for ($i = 0; $i < count($beli); $i++) {
    $productIndex = array_search($beli[$i], array_column($produk, 'kode'));
    $productCode = $produk[$productIndex]['kode'];
    $productName = $produk[$productIndex]['nama'];
    $productPrice = $produk[$productIndex]['harga'];
    $quantity = $jumlah[$i];
    
    $totalPrice = $productPrice * $quantity;
    $grandtotal += $totalPrice;
    
    echo "<tr>";
    echo "<td>{$productCode}</td>";
    echo "<td>{$productName}</td>";
    echo "<td>Rp " . number_format($productPrice, 0, ',', '.') . "</td>";
    echo "<td>{$quantity}</td>";
    echo "<td>Rp " . number_format($totalPrice, 0, ',', '.') . "</td>";
    echo "</tr>";
}

echo "</table><br>";
?>

<?php
// Tampilkan total harga
echo "===================<br>";
echo "<strong>Total Belanja: Rp " . number_format($grandtotal, 0, ',', '.') . "</strong><br>";
?>
