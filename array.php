<?php
// penjualanArray.php
// Versi tampilan cantik (pink soft) dengan diskon otomatis 💖

// Daftar Produk
$produk = [
    ["kode" => "P001", "nama" => "Sprite", "harga" => 10000],
    ["kode" => "P002", "nama" => "CocaCola B", "harga" => 8000],
    ["kode" => "P003", "nama" => "Fanta", "harga" => 7000],
    ["kode" => "P004", "nama" => "Golda", "harga" => 4000],
    ["kode" => "P005", "nama" => "Aqua", "harga" => 5000],
];

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

// Inisialisasi total belanja
$grandtotal = 0; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Penjualan Array - Pink Style</title>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #ffeef5;
        color: #4b3b3f;
        text-align: center;
        margin: 30px;
    }
    h2 {
        color: #d63384;
        background-color: #fff0f6;
        padding: 10px;
        border-radius: 15px;
        display: inline-block;
        box-shadow: 0 0 10px rgba(255, 182, 193, 0.4);
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(255, 182, 193, 0.5);
        border-radius: 10px;
        overflow: hidden;
    }
    th {
        background-color: #f8cde0;
        color: #5a4a4a;
        padding: 10px;
    }
    td {
        padding: 10px;
        border-bottom: 1px solid #f4b6cc;
    }
    tr:nth-child(even) {
        background-color: #fff7fa;
    }
    tr:hover {
        background-color: #ffe0ec;
        transition: 0.2s;
    }
    .total-box {
        margin-top: 30px;
        display: inline-block;
        background-color: #fff0f6;
        padding: 20px 40px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(255, 182, 193, 0.4);
        text-align: left;
    }
    .total-box strong {
        color: #d63384;
        display: block;
        margin-bottom: 5px;
        font-size: 16px;
    }
    hr {
        border: none;
        height: 2px;
        background: #f8a1c4;
        width: 50%;
        margin: 20px auto;
        border-radius: 5px;
    }
</style>
</head>
<body>

    <h2>💖 POLGAN MART 💖</h2>
    <p>Daftar Pembelian Hari Ini</p>

    <table border="0">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total Harga</th>
        </tr>

        <?php
        // Tampilkan daftar pembelian
        for ($i = 0; $i < count($beli); $i++) {
            $productIndex = array_search($beli[$i], array_column($produk, 'kode'));
            $productCode = $produk[$productIndex]['kode'];
            $productName = $produk[$productIndex]['nama'];
            $productPrice = $produk[$productIndex]['harga'];
            $quantity = $jumlah[$i];
            
            $totalPrice = $productPrice * $quantity;
            $grandtotal += $totalPrice;

            echo "<tr>
                    <td>{$productCode}</td>
                    <td>{$productName}</td>
                    <td>Rp " . number_format($productPrice, 0, ',', '.') . "</td>
                    <td>{$quantity}</td>
                    <td><strong>Rp " . number_format($totalPrice, 0, ',', '.') . "</strong></td>
                  </tr>";
        }

        // Hitung diskon
        $diskonPersen = 0;
        if ($grandtotal <= 50000) {
            $diskonPersen = 5;
        } elseif ($grandtotal > 50000 && $grandtotal <= 100000) {
            $diskonPersen = 10;
        } else {
            $diskonPersen = 20;
        }

        $nilaiDiskon = ($grandtotal * $diskonPersen) / 100;
        $totalBayar = $grandtotal - $nilaiDiskon;
        ?>

    </table>

    <hr>

    <div class="total-box">
        <strong>Total Belanja: Rp <?= number_format($grandtotal, 0, ',', '.') ?></strong>
        <strong>Diskon: Rp <?= number_format($nilaiDiskon, 0, ',', '.') ?> (<?= $diskonPersen ?>%)</strong>
        <strong>Total Bayar Setelah Diskon: Rp <?= number_format($totalBayar, 0, ',', '.') ?></strong>
    </div>

</body>
</html>
