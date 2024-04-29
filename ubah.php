<?php
    // koneksi ke DBMS
    require "functions.php";

    $id = $_GET["id"];
    //query data mahasiswa berdasarkan id
    $pts = query("SELECT * FROM pt WHERE id = $id")[0];

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["ubah"]) ) {

        //cek apakah data berhasil diubah atau tidak
        if ( ubah($_POST) > 0) {
            echo "
                <script>
                    alert('Data PT berhasil diubah!')
                    document.location.href = 'index.php'
                </script>
            ";
        } else {echo "
            <script>
                alert('Data PT gagal diubah/tidak ada yg diubah!')
                document.location.href = 'index.php'
            </script>";
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data mahasiswa</title>
</head>
<body>
    <h1>Ubah data mahasiswa</h1>

    <a href="index.php" style="color:black;">Kembali ke halaman daftar siswa</a>
    <br>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pts["id"];?>">
        <ul>
            <li>
                <label for="nama_pt">Nama PT :</label>
                <input type="text" name="nama_pt" id="nama_pt" required value="<?= $pts["nama_pt"];?>">
            </li>
            <li>
                <label for="alamat_pt">Alamat PT :</label>
                <input type="text" name="alamat_pt" id="alamat_pt" required value="<?= $pts["alamat_pt"];?>">
            </li>
            <li>
                <label for="direktur">Direktur :</label>
                <input type="text" name="direktur" id="direktur" required value="<?= $pts["direktur"];?>">
            </li>
            <li>
                <label for="nomor_hp">Nomor HP :</label>
                <input type="number" name="no_hp" id="nomor_hp" required value="<?= $pts["no_hp"];?>">
            </li>
            <li>
                <label for="bidang_usaha">Bidang Usaha :</label>
                <input type="text" name="bidang_usaha" id="bidang_usaha" required value="<?= $pts["bidang_usaha"];?>">
            </li>
            <li>
                <label for="pic_admin">PIC_Admin :</label>
                <input type="text" name="pic_admin" id="pic_admin" required value="<?= $pts["pic_admin"];?>">
            </li>
            <li>
                <label for="waktu_pt">Waktu pembuatan PT :</label>
                <input type="date" name="waktu_pt" id="waktu_pt" required value="<?= $pts["waktu_pt"];?>">
                <!-- <span style="color: #8d8d8d;">Format: Bulan/tanggal/tahun</span> -->
            </li>
            <li>
                <button type="submit" name="ubah">Ubah data</button>
            </li>
        </ul>

    </form>

</body>
</html>