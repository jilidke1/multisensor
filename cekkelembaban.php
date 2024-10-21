<?php

//koneksi ke databse
    $konek = mysqli_connect("localhost", "root", "","dbmultisensor");

    //tabel sensor
    $sql = mysqli_query($konek, " select * from tb_sensor order by id 
            desc"); //data terakhir akan ada diatas


    //baca dari dpaling atas
    $data = mysqli_fetch_array($sql);
    $kelembaban = $data['kelembaban'];

    //if nilai ldr belum ada, kelembaban = 0
    if($kelembaban == "") $kelembaban = 0;

    //nilai kelembaban
    echo $kelembaban;


?>