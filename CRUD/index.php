<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <ul class="navbar-nav ">
                <li class="nav-item  ">
                    DW Employee
                </li>
            </ul>
        </nav><br>
        <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama : </label>
                <input type="text" class="form-control" name="name" autofocus="" required="" />
            </div>
            <div class="form-group">
                <label>Gambar Produk : </label>
                <input type="file" name="img" required="" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

        <div class=" row">
            <div class="card">
                <?php
                $query = "SELECT * FROM user_tb ";
                $result = mysqli_query($koneksi, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card-body">
                        <div class=" col-sm-3  ">
                            <a class="" href="produk/show.php?id=<?php echo $row['id']; ?>"></a>
                            <img src="gambar/<?php echo $row['photo']; ?>" class="img-fluid" alt="Card image">

                            <?php
                            $ok = $row['id'];
                            $query2 = "SELECT * FROM skill_tb WHERE user_id = $ok ";
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

                            <a class="" href=" show.php?id=<?php echo $row['id']; ?>">
                                <h4 class=""><?php echo $row["name"] ?></h4>
                            </a>
                            <a class="none" href=" show.php?id=<?php echo $row['id']; ?>" >
                                <button type="button" class="btn btn-primary" style="margin:0 0 15px 0;">edit</button>
                            </a>

                            <a class="none" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                <button type="button" class="btn btn-primary" style="margin:0 0 15px 0;">hapus</button>
                            </a>
                        </div>
                    </div>
                <?php
                    $no++;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
