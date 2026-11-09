<?php
// Fungsi untuk menghitung diskon berdasarkan total belanja
function hitungDiskon($totalBelanja)
{
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.1 * $totalBelanja; // Diskon 10% untuk total belanja >= Rp 100.000
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja; // Diskon 5% untuk total belanja >= Rp 50.000 dan < Rp 100.000
    }

    return $diskon;
}

// Contoh penggunaan fungsi untuk menghitung diskon
$totalBelanja = 200000; // Total belanja sebesar Rp 120.000
$diskon = hitungDiskon($totalBelanja); // Memanggil fungsi untuk menghitung diskon

$br = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>";
echo "Total belanja: Rp. " . $totalBelanja . $br;
echo "Diskon: Rp. " . $diskon . $br;
echo "Total yang harus dibayar: Rp. " . ($totalBelanja - $diskon) . $br;
