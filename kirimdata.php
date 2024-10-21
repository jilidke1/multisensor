<?php

//Koneksi ke db
$konek = mysqli_connect("localhost", "root", "","dbmultisensor");

//Data yang dikirim ESP32
$suhu = $_GET['suhu'];
$kelembaban = $_GET['kelembaban'];
$ldr = $_GET['ldr'];

//Simpan ke tb_sensor

//A_I = 1 / ID Menjadi 1 bila dikosongkan
mysqli_query($konek, " ALTER TABLE tb_sensor AUTO_INCREMENT=1");
//Simpan Data sensor Ke tb_sensor"
$simpan = mysqli_query($konek, "insert into tb_sensor(suhu, kelembaban, ldr)values('$suhu','$kelembaban','$ldr')");


//Uji simpan untuk memberikan respon
if($simpan)
    echo "Berhasil dikirim";
else
    echo "Gagal Terkirim";


?>