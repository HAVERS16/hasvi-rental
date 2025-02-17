<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pembayaran</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
        }

        h2 {
            color: #081b29;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0056b3;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #003f7d;
        }
        .signature {
        text-align: right;
        margin-top: 1rem;
        display: block;
    }

    .signature p {
        font-size: 1em;
    }

    .signature img {
        display: block;
        margin-left: auto;
        width: 100px;
        height: auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Detail Pembayaran</h2>
        <?php
        include 'koneksi.php';

        if (isset($_GET['id_rental'])) {
            $id_rental = $_GET['id_rental'];
            $query = "SELECT * FROM rental WHERE id_rental = '$id_rental'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<table>";
                echo "<tr><th>Field</th><th>Value</th></tr>";
                echo "<tr><td>Nama Anda</td><td>" . $row['username'] . "</td></tr>";
                echo "<tr><td>Merek Mobil</td><td>" . $row['merek'] . "</td></tr>";
                echo "<tr><td>Harga</td><td>" . $row['harga'] . "</td></tr>";
                echo "<tr><td>Denda</td><td>" . $row['denda'] . "</td></tr>";
                echo "<tr><td>Tanggal Rental</td><td>" . $row['tgl_rental'] . "</td></tr>";
                echo "<tr><td>Tanggal Pengembalian</td><td>" . $row['tgl_pengembalian'] . "</td></tr>";
                echo "<tr><td>Total</td><td>" . $row['total'] . "</td></tr>";
                echo "<tr><td>Metode Pembayaran</td><td>" . $row['metode_pembayaran'] . "</td></tr>";
                echo "</table>";
            } else {
                echo "<p>pembayaran tidak ditemukan</p>";
            }
        } else {
            echo "";
        }

        mysqli_close($conn);
        ?>
        <?php
        include 'koneksi.php';

        if (isset($_GET['id'])) {
            $id_rental = $_GET['id']; // Mengambil parameter 'id' dari URL

            // Menggunakan prepared statement untuk mencegah SQL Injection
            $stmt = $conn->prepare("SELECT * FROM rental WHERE id_rental = ?");
            $stmt->bind_param("i", $id_rental);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<table>";
                echo "<tr><th>Field</th><th>Value</th></tr>";
                echo "<tr><td>Nama Anda</td><td>" . htmlspecialchars($row['username']) . "</td></tr>";
                echo "<tr><td>Merek Mobil</td><td>" . htmlspecialchars($row['merek']) . "</td></tr>";
                echo "<tr><td>Harga</td><td>" . htmlspecialchars($row['harga']) . "</td></tr>";
                echo "<tr><td>Denda</td><td>" . htmlspecialchars($row['denda']) . "</td></tr>";
                echo "<tr><td>Tanggal Rental</td><td>" . htmlspecialchars($row['tgl_rental']) . "</td></tr>";
                echo "<tr><td>Tanggal Pengembalian</td><td>" . htmlspecialchars($row['tgl_pengembalian']) . "</td></tr>";
                echo "<tr><td>Total</td><td>" . htmlspecialchars($row['total']) . "</td></tr>";
                echo "<tr><td>Metode Pembayaran</td><td>" . htmlspecialchars($row['metode_pembayaran']) . "</td></tr>";
                echo "</table>";

                echo "<div class='signature'>";
                echo "<p>Yang Mengetahui</p>";
                echo "<img src='/hasvirental/img/download.png' alt='Tanda Tangan Pemilik'>";
                echo "<p>(Hasvi Aryguna)</p>";
                echo "<p style='margin-right:2rem;'>Admin</p>";
                echo "</div>";
            } else {
                echo "<p>Pembayaran tidak ditemukan.</p>";
            }

            $stmt->close();
        } else {
            echo "<p></p>";
        }

        $conn->close();
        ?>

        <a href="javascript:window.print()" class="btn">Cetak Invoice</a>
    </div>
</body>

</html>