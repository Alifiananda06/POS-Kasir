<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('uploads/bg1.jpg'); /* Ganti dengan nama file latar belakang yang Anda inginkan */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column; /* Susun elemen secara vertikal */
            align-items: center;
            color: #333; /* Warna teks untuk judul */
        }

        h2 {
            margin-top: 20px; 
            color:white/* Jarak atas judul dari bagian atas halaman */
        }

        /* Tambahkan gaya untuk search bar */
        #searchInput {
            padding: 8px;
            width: 50%; /* Lebar 100% agar menyesuaikan dengan lebar halaman */
            box-sizing: border-box; /* Memastikan padding tidak menambah lebar elemen */
            margin-bottom: 10px; /* Jarak antara search bar dengan tabel */
        }

        /* Tambahkan style untuk tabel */
        table {
            width: 80%; /* Ukuran tabel diatur menjadi 80% dari lebar halaman */
            border-collapse: collapse;
            margin-bottom: 20px; /* Jarak antara tabel dengan tombol */
            background-color: rgba(255, 255, 255, 0.8); /* Latar belakang transparan */
            border-radius: 10px; /* Tambahkan border-radius agar ujung tabel menjadi melengkung */
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Tambahkan style untuk tombol Print dan Kembali ke Dashboard */
        .buttons {
            margin-top: 20px; /* Jarak atas tombol dari tabel */
        }

        .buttons button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #4CAF50; /* Warna hijau */
            color: white;
            border: none;
            cursor: pointer;
        }

        .buttons button:hover {
            background-color: #45a049; /* Warna hover untuk tombol */
        }
    </style>

</head>
<body>
    <h2>Riwayat Transaksi</h2>
    <!-- Tambahkan search bar -->
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari berdasarkan nama produk...">
    <table id="transaksiTable">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah Beli</th>
            <th>Total Harga</th>
            <th>Waktu Transaksi</th>
        </tr>
        <?php
        // 1. Include file koneksi.php untuk terhubung ke database
        include 'koneksi.php';

        // 2. Jalankan kueri SQL untuk mengambil data dari tabel histori_transaksi
        $query_transaksi = "SELECT * FROM riwayat_transaksi";
        $result_transaksi = mysqli_query($koneksi, $query_transaksi);

        // 3. Tampilkan data dalam tabel HTML
        while ($row = mysqli_fetch_assoc($result_transaksi)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_produk'] . "</td>";
            echo "<td>Rp " . number_format($row['harga_produk'], 0, ',', '.') . "</td>";
            echo "<td>" . $row['jumlah_beli'] . "</td>";
            echo "<td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>";
            echo "<td>" . $row['waktu_transaksi'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <button onclick="window.print()">Print</button>
    <button onclick="window.location.href='home.php'">Kembali ke Dashboard</button>

    <script>
        function searchTable() {
            // Deklarasi variabel
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("transaksiTable");
            tr = table.getElementsByTagName("tr");

            // Iterasi semua baris tabel, sembunyikan yang tidak sesuai dengan filter
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Kolom dengan nama produk
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
