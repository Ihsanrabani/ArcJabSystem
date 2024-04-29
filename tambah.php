<?php
    // koneksi ke DBMS
    require "functions.php";

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["tambah"]) ) {

        //cek apakah data berhasil ditambahkan atau tidak
        if ( tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data PT berhasil ditambahkan!')
                    document.location.href = 'index.php'
                </script>
            ";
        } else {echo "
            <script>
                alert('Data PT gagal ditambahkan!')
            </script>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
</head>
<body>
    <h1>Halaman tambah data</h1>

    <a href="index.php">Kembali ke daftar pt</a>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_pt">Nama PT :</label>
                <input type="text" name="nama_pt" id="nama_pt" required>
            </li>
            <li>
                <label for="alamat_pt">Alamat PT :</label>
                <input type="text" name="alamat_pt" id="alamat_pt" required>
            </li>
            <li>
                <label for="direktur">Direktur :</label>
                <input type="text" name="direktur" id="direktur" required>
            </li>
            <li>
                <label for="nomor_hp">Nomor HP :</label>
                <input type="number" name="no_hp" id="nomor_hp" required>
            </li>
            <li>
                <label for="bidang_usaha">Bidang Usaha :</label>
                <input type="text" name="bidang_usaha" id="bidang_usaha" required>
            </li>
            <li>
                <label for="pic_admin">PIC Admin :</label>
                <input type="text" name="pic_admin" id="pic_admin" required>
            </li>
            <li>
                <label for="waktu_pt">Waktu pembuatan PT :</label>
                <input type="date" name="waktu_pt" id="waktu_pt">
                <!-- <span style="color: #8d8d8d;">Format: Bulan/tanggal/tahun</span> -->
            </li>
            <li>
                <button type="submit" name="tambah">Tambah data</button>
            </li>
        </ul>
    </form>
</body>
</html>