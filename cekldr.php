<?php

//koneksi ke databse
    $konek = mysqli_connect("localhost", "root", "","dbmultisensor");

    //tabel sensor
    $sql = mysqli_query($konek, " select * from tb_sensor order by id 
            desc"); //data terakhir akan ada diatas


    //baca dari dpaling atas
    $data = mysqli_fetch_array($sql);
    $LDR = $data['ldr'];

    //if nilai ldr belum ada, ldr = 0
    if($LDR == "") $LDR = 0;

    //nilai ldr
    echo $LDR;


?>