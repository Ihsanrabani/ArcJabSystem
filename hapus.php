<?php
    require 'functions.php';

    $id = $_GET["id"];

    if ( hapus($id) > 0 ) {
        echo "
        <script>
            alert('Data pt berhasil dihapus!')
            document.location.href = 'index.php'
        </script>
    ";
    } else {
        echo "
        <script>
            alert('Data pt gagal dihapus!')
            document.location.href = 'index.php'
        </script>
    ";
    }
?>