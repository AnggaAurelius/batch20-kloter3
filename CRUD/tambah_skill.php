<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$nama   = $_POST['name'];
$user_id   = $_POST['user'];

$query = "INSERT INTO skill_tb (name, user_id) VALUES ('$nama','$user_id')";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data berhasil ditambah.');window.location='../dw/show.php?id=$user_id;'</script>";
}
