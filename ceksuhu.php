<?php

//koneksi ke databse
    $konek = mysqli_connect("localhost", "root", "","dbmultisensor");

    //tabel sensor
    $sql = mysqli_query($konek, " select * from tb_sensor order by id 
            desc"); //data terakhir akan ada diatas


    //baca dari dpaling atas
    $data = mysqli_fetch_array($sql);
    $suhu = $data['suhu'];

    //if nilai suhu belum ada, suhu = 0
    if($suhu == "") $suhu = 0;

    //nilai suhu
    echo $suhu;


?>