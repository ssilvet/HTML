<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Harjutus</title>
</head>
<body>

    <h1>Harjutused 04</h1>
    <?php
        $p = 5;
        switch ($p) {
            case ($p > 10):
                echo"SUPER";
                # code...
                break;
            case ($p >=5 && $p <= 9):
                echo "TEHTUD!";
                 # code...
                break;
            case ($p <5 ):
                echo "KASIN!";
                 # code...
                break;
            
            default:
                echo "Punkte pole lisatud!";
                # code...
                break;
        }
    
    
    ?>



    <form action="" method="get">
        Lisa sünniaasta: <input type="number" name="synd"
        min="1900" max="2100" required>
        <input type="submit" value="Leia juubel"><br>

    </form>
    <?php
        if (!empty($_GET['synd'])) {
            $aasta = $_GET['synd'];
            $seeaasta = date('Y');
            $vanus = $seeaasta - $aasta;
            var_dump($aasta); //testimiseks

            if ($vanus % 5 == 0) {
                echo " Sul juubel!";
                
            }
            # code...
        }
    
    ?>
    <br>
    <?php
        $nr1 = 0;
        $nr2 = 2;
        
       
        // < > <= >= == |= True faLSH
        // OR VÕI || üks või teine õige
        // AND  NING  &&  mõlemad õiged
        if ($nr2 |= 0 || $nr1 |=0) {
            $tehe = $nr1 / $nr2;
            echo $tehe;
        } else {
            echo "Nulliga ei saa jagada";
        }

        
    
    
    ?>



    <h1>Harjutused 03</h1>
    <!-- 
        action fail kuhu saadetakse
        method kuidas saadetakse GET on vajalik, POST on peidetud
     -->
         <form action="#" method="GET"> 
            Toode1: <input type="number" name="toode1"><br>  
            Toode2: <input type="number" name="toode2"><br> 
            Toode3: <input type="number" name="toode3"><br> 
            <input type="submit" value="Arvuta"><br> 

         </form> 

        <?php

             if (!empty($t1 = $_GET['toode1']) && 
                 !empty($t2 = $_GET['toode2']) && 
                 !empty($t3 = $_GET['toode3'])) 
                {
                
            
        // get saatsin, get võtan
            $t1 = $_GET['toode1'];
            $t2 = $_GET['toode2'];
            $t3 = $_GET['toode3'];
            $kokku = $t1+$t2+$t3;

            echo "Toode1: $t1 tk<br>";
            echo "Toode2: $t2 tk<br>";
            echo "Toode3: $t3 tk<br>";
            echo "Kõik kokku: $kokku tk";
        }
        ?>
        
    <h1>Harjutused 02</h1>
    <?php
        $arv1 = 5;   //int
        $arv2 = 3.14; //  float
        $tehe = $arv1 / $arv2; //string
        $jaak = $arv1 % $arv2;  // jääk
        
        echo "Wastus: $tehe <br>" ;
        
        printf("Wastus: %d / %0.2f = %0.2f <br>", $arv1,$arv2, $tehe);

        echo $jaak;
    
    
    
    
    
    ?>

    <h1>Harjutussed 01</h1>
    <?php
        /* Harjutus 01
            mitmerelaine kommentaar

            */
        $enimi = "Mario";
        $pnimi = "Metshein";
        $v = 43;
        $pikkus = 1.8;
        // Üherealine kommentaar
        $hyydnimi = "THE BOSS";
        $lugu = 'Dr. Alban - "Its\'s My Life"';

        echo "<p>Tere $enimi \"$hyydnimi\" $pnimi!<br>";
        echo "Vanus: $v<br>Pikkus: $pikkus</p> ";
        echo '<p>Lemmik lugu on: '.$lugu.'<P>';
        

    ?>
</body>
</html>