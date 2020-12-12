<!DOCTYPE html>
<html>
    <body>
        <?php
        function cetakPola(int $no)
        {
            $spc = str_repeat('&nbsp;', 2);
            $p = str_repeat('&nbsp;', 27);
            $x=0;
            $y=$no;
            $b=-2;
            while($y<=$no){
                if($y==10){
                    echo "$p*";
                }
                if($x==6){
                    echo"DUMBWAYSID";
                }else{
                    for ($i = 0; $i < 10; $i++) {
                        if ($i < $y) {
                            echo "$spc ";
                        } else {
                            echo "* ";
                        }
                    }
                }
                $y = $y + $b;
                if($x==5){
                    $b=2;
                }
                $x++;
                echo "<br>";
            }   
        }
        cetakPola(10);
        ?>
    </body>
</html>
