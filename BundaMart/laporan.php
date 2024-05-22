<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Laporan</title>
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
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: white;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button-container a {
            margin: 0 10px;
            padding: 10px 20px;
            text-decoration: none;
            background-color: blue;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard Laporan</h1>
        <div class="button-container">
            <a href="laporan_penjualan.php">Laporan Penjualan</a>
            <a href="laporan_barang.php">Laporan Barang</a>
        </div>
        <div class="button-container">
            <a href="home.php">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
