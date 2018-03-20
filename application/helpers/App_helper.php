
<?php

function sumTime($date1 = null, $date2 = null){
    $awal  = strtotime($date1);
    $akhir = strtotime($date2);
    $diff  = $akhir - $awal;

    //$jam   = floor($diff / (60 * 60));
    //$menit = $diff - $jam * (60 * 60);
   // echo 'Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

    $detik = floor($diff );
    return $detik;
}

function secToJam($detik = null){
    $jam   = floor($detik / (60 * 60));
    $menit = $detik - $jam * (60 * 60);

    echo $jam.'Jam, '.floor($menit/60). ' menit' ;
}