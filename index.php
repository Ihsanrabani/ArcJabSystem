<?php
    require 'functions.php';

    $data = query("SELECT * FROM pt");

    //tombol cari diklik
    if (isset($_POST["cari"])) {
        $data = cari($_POST["keyword"]);
    }

    $query = mysqli_query($conn, "SELECT nama_pt FROM pt");
    $row = mysqli_fetch_assoc($query);
    $nama = $row['nama_pt'];

    //fitur sort
    if (isset($_POST["cariUrut"])) {
        $data = urutkan($_POST["urut"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASE JAB</title>
</head>
<body>
    <h1>Selamat datang di ArcJabSys👋</h1>

    <a href="tambah.php">Tambah data PT</a>

    <form action="" method="post">
        <input type="text" name="keyword" id="" placeholder="Masukkan keyword pencarian.." size="35" autofocus autocomplete="off"> 
        <button type="submit" name="cari">Cari</button>
    </form>


    <form action="" method="post">
        <label for="urut">Urutkan data berdasarkan</label>
        <select name="urut" id="urut">
            <option value="nama">nama</option>
            <option value="alamat">alamat</option>
            <option value="bidang_usaha">bidang usaha</option>
            <option value="waktu_pt">Tanggal pembuatan pt</option>
        </select>
        <button type="submit" name="cariUrut">Urutkan!</button>
    </form>

    <!-- <form action="" method="post">
        <label for="urut">Urutkan data berdasarkan :</label>
        <input type="text" name="urut" id="urut">
        <button type="submit" name="cariUrut">Urutkan!</button>
    </form>
    <span>di input urut masukkan nama / alamat (kecil semua)</span> -->

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama pt</th>
            <th>alamat pt</th>
            <th>direktur</th>
            <th>Nomor hp</th>
            <th>Bidang usaha<a/th>
            <th>PIC Admin</th>
            <th>Tanggal pembuatan pt</th>
        </tr>            
        <?php $i = 1;?>
        <?php foreach($data as $pt) :?>
        <tr>
            <td><?= $i?></td>
            <td>
                <a href="ubah.php?id=<?= $pt["id"];?>">Ubah</a>
                <a href="hapus.php?id=<?= $pt["id"];?>&?                                 B    ">Hapus</a>
            </td>
            <td><?= $pt["nama_pt"];?></td>
            <td><?= $pt["alamat_pt"];?></td>
            <td><?= $pt["direktur"];?></td>
            <td><?= $pt["no_hp"];?></td>
            <td><?= $pt["bidang_usaha"];?><a/td>
            <td><?= $pt["pic_admin"];?></td>
            <td><?= $pt["waktu_pt"];?></td>
        </tr>            
        <?php $i++;?>
        <?php endforeach;?>
    </table>
</body>
</html>