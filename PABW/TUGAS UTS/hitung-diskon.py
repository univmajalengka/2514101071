# Fungsi untuk menghitung diskon berdasarkan total belanja


def hitung_diskon(total_belanja):
    diskon = 0

    if total_belanja >= 100000:
        diskon = 0.1 * total_belanja  # Diskon 10% untuk total belanja >= Rp 100.000
    elif total_belanja >= 50000:
        diskon = 0.05 * total_belanja  # Diskon 5% untuk total belanja >= Rp 50.000 dan < Rp 100.000

    return diskon


# Contoh penggunaan fungsi untuk menghitung diskon
total_belanja = 120000  # Total belanja sebesar Rp 120.000
diskon = hitung_diskon(total_belanja)  # Memanggil fungsi untuk menghitung diskon

print("Total belanja: Rp. " + str(total_belanja))
print("Diskon: Rp. " + str(int(diskon)))
print("Total yang harus dibayar: Rp. " + str(int(total_belanja - diskon)))
