<?php
function hitungDiskon($bayar){
    if($bayar >= 500000){
        $diskon = 50;
    }elseif($bayar >= 100000){
        $diskon = 10;
    }elseif($bayar >= 50000){
        $diskon = 5;
    }else{
        $diskon = 0;
    }

    $totalDiskon = ($bayar * $diskon) / 100;
    $totalBayar = $bayar - $totalDiskon;
    
    

    echo "Total bayar: Rp " . number_format($bayar);
    echo "</br>";
    echo "Diskon: " . $diskon . "%</br>";
    echo "Total setelah diskon: Rp " . number_format($totalBayar);


}
$bayar = 200000;
return hitungDiskon($bayar);



?>