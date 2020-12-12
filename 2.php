<!DOCTYPE html>
<html>
    <body>
        <?php
        function cekHuruf(string $kalimat, string $huruf)
        {
            $muncul=0;
            $arr=str_split($kalimat,1);
            foreach ($arr as $abc) {
                if($abc==$huruf){
                    $muncul++;
                }
            }
            echo "$huruf muncul sebanyak $muncul kali";
        }
        cekHuruf("aku calon peserta bootcamp dumbways","a");
        ?>
    </body>
</html>
