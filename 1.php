<!DOCTYPE html>
<html>
    <body>
        <?php
        function hitungDenda(int $hari)
        {
            $plj=1000;
            $nov=2000;
            $cpn=1500;
            $late=$hari-10;
            $tXplj=$late*$plj;
            $tXcpn=$late*$cpn;
            $tXnov=$late*$nov;
            $ttl=$tXcpn+$tXnov+$tXplj;

            echo "Meminjam selama $hari hari<br>";
            echo "Telat menembalikan $late hari<br>";
            echo "Denda buku pelajaran: Rp $tXplj<br>";
            echo "Denda buku novel: Rp $tXnov<br>";
            echo "Denda buku cerpen: Rp $tXcpn<br>";
            echo "Total denda: Rp $ttl";
        }
        hitungDenda(14);
        ?>
    </body>
</html>
