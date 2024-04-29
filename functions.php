<?php
    $conn = mysqli_connect("localhost", "root", "", "arcjab");
    
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $conn;
        $nama_pt = htmlspecialchars($data["nama_pt"]);
        $alamat_pt = htmlspecialchars($data["alamat_pt"]);
        $direktur = htmlspecialchars($data["direktur"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $bidang_usaha= htmlspecialchars($data["bidang_usaha"]);
        $pic_admin= htmlspecialchars($data["pic_admin"]);
        $waktu_pt= htmlspecialchars($data["waktu_pt"]);

        $query = "INSERT INTO pt
            VALUES
            ('', '$nama_pt', '$alamat_pt', '$direktur', '$no_hp', '$bidang_usaha', '$pic_admin', '$waktu_pt')";
        //query insert data atau init dari insert data
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($id) {
        global $conn;

        mysqli_query($conn, "DELETE FROM pt WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nama_pt = htmlspecialchars($data["nama_pt"]);
        $alamat_pt = htmlspecialchars($data["alamat_pt"]);
        $direktur = htmlspecialchars($data["direktur"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $bidang_usaha= htmlspecialchars($data["bidang_usaha"]);
        $pic_admin= htmlspecialchars($data["pic_admin"]);
        $waktu_pt= htmlspecialchars($data["waktu_pt"]);

        $query = "UPDATE pt SET
                    nama_pt = '$nama_pt',
                    alamat_pt = '$alamat_pt',
                    direktur = '$direktur',
                    no_hp = '$no_hp',
                    bidang_usaha = '$bidang_usaha',
                    pic_admin = '$pic_admin',
                    waktu_pt = '$waktu_pt'
                    WHERE id = $id
                    ";
        //query insert data atau init dari insert data
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        $query = "SELECT * FROM pt
                    WHERE
                nama_pt LIKE '%$keyword%'OR
                alamat_pt LIKE '%$keyword%'OR 
                direktur LIKE '%$keyword%'OR
                no_hp LIKE '%$keyword%'OR
                bidang_usaha LIKE '%$keyword%'OR
                pic_admin LIKE '%$keyword%'OR
                waktu_pt LIKE '%$keyword%'
                ";
        return query($query);
    }

    function urutkan($berdasarkan) {
        global $conn;
        if ($berdasarkan == "nama") {
            $urutNama = mysqli_query($conn, "SELECT * FROM pt ORDER BY nama_pt ASC;");
            return $urutNama; 
        }
        elseif ($berdasarkan == "alamat") {
            $urutAlamat = mysqli_query($conn, "SELECT * FROM pt ORDER BY alamat_pt ASC;");
            return $urutAlamat;
        }
        elseif ($berdasarkan == "bidang_usaha") {
            $urutBidang_usaha = mysqli_query($conn, "SELECT * FROM pt ORDER BY Bidang_usaha ASC;");
            return $urutBidang_usaha;
        }
        elseif ($berdasarkan == "waktu_pt") {
            $urutWaktu = mysqli_query($conn, "SELECT * FROM pt ORDER BY waktu_pt DESC;");
            return $urutWaktu;
        }
        
    }

?>
