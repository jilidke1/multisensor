<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Multisensor ESP32</title>
   
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <!-- realtime -->
    <script type="Text/javascript">
      $(document).ready( function() {

        setInterval( function() {
            $("#ceksuhu").load("ceksuhu.php");
            $("#cekkelembaban").load("cekkelembaban.php");
            $("#cekldr").load("cekldr.php");
        }, 1000 );

      } );
    </script>

  </head>
  <body>

  <div class="container" style="text-align: center; margin-top: 250px">

      <h2>Monitoring Multisendor ESP32 <br> Secara Realtime </h2>  


      <!-- Card Suhu-kelembaban-LDR -->
        <div style="display: flex; ">

          <!-- Nilai Suhu -->
          <div class="card text-center" style="width: 33%">
            <div class="card-header" style="font-size: 30px; font-weight: bold; background-color:blue; color:white ">
              Suhu
            </div>
            <div class="card-body">
              <h1> <span id="ceksuhu"> 0 </span> </h1>
            </div>
          </div>


          <!-- Nilai Kelembaban -->
          <div class="card text-center" style="width: 33%">
            <div class="card-header" style="font-size: 30px; font-weight: bold; background-color:gray; color:white ">
              Kelembaban
            </div>
            <div class="card-body">
            <h1> <span id="cekkelembaban"> 0 </span> </h1>
            </div>
          </div>


          <!-- Nilai LDR -->
          <div class="card text-center" style="width: 33%">
            <div class="card-header" style="font-size: 30px; font-weight: bold; background-color:yellow">
              LDR
            </div>
            <div class="card-body">
            <h1> <span id="cekldr"> 0 </span> </h1>
            </div>
          </div>
      <!-- Akhir Card Suhu-kelembaban-LDR -->

        </div>
      <!-- Asset Image -->
      <div class="container" style="padding-top:20px">
          <img src="images/speedwicaksana.jpeg" >

      </div>


  </div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>