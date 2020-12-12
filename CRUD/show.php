<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query =
        "SELECT * FROM user_tb WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='../index.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm ">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="none" href="index.php"><button type="button" class="btn btn-primary" style="margin:0 5px 5px 0;">Home</button></a>
                </li>
            </ul>
        </nav>

        <div class="row">

            <div class="col-sm-3">
                <img src=" gambar/<?php echo $data['photo']; ?>" class="img-fluid">
            </div>
            <div class="col-sm-9">
                <h1>Nama: <?php echo $data['name']; ?></h1>
                <?php

                $query2 = "SELECT * FROM skill_tb WHERE user_id = $id ";
                $result2 = mysqli_query($koneksi, $query2);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }
                $no2 = 1;

                while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                    <h4 class=""><?php echo $row2["name"] ?></h4>
                <?php
                    $no2++;
                }
                ?>
            </div>
        </div>
        <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
            <input name="id" value="<?php echo $data['id']; ?>" hidden />
            <div class="form-group">
                <label>Nama : </label>
                <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" autofocus="" required="" />
            </div>
            <div class="form-group">
                <label>Gambar Produk :</label>

                <input type="file" name="img" />
                <p><i style="float: left;font-size: 11px;color: red;">Abaikan jika tidak merubah gambar produk</i></p>
            </div><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
        <h1 class="text-center">Skill</h1>
        <form method="POST" action="tambah_skill.php" enctype="multipart/form-data">
            <input name="user" value="<?php echo $data['id']; ?>" hidden />
            <div class="form-group">
                <label>Nama skill : </label>
                <input type="text" class="form-control" name="name" value="" autofocus="" required="" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
        <form method="POST" action="edit_skill.php" enctype="multipart/form-data">
            <input name="user" value="<?php echo $data['id']; ?>" hidden />
            <?php
            $no3 = 1;
            $query2 = "SELECT * FROM skill_tb WHERE user_id = $id ";
            $result2 = mysqli_query($koneksi, $query2);
            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi) .
                    " - " . mysqli_error($koneksi));
            }

            while ($row2 = mysqli_fetch_assoc($result2)) {
            ?>
                <input name="id" value="<?php echo $row2['id']; ?>" hidden />
                <div class="form-group">
                    <label>Nama skill : </label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row2['name']; ?>" autofocus="" required="" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a class="none" href="hapus_skill.php?id=<?php echo $row2['id']; ?>&user=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                        <button type="button" class="btn btn-primary" style="margin:0 5px 0 0;">hapus</button>
                    </a>
                </div>
            <?php
                $no3++;
            }
            ?>
        </form>

    </div>
</body>

</html>